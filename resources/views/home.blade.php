@extends('layouts.app')

@section('content')

<div id="study-container" class="study-container">
    <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>   
    
    <div id="quote-container" class="quote-container"></div>

    <button id="bg-toggle-btn" class="bg-change-btn">
        <i class="fas fa-image"></i>
    </button>

    <div id="bg-selector" class="bg-selector-panel">
        @foreach($backgrounds as $background)
        <div class="bg-option" data-bg="{{ asset($background->image_path) }}">
            <img src="{{ asset($background->image_path) }}" alt="{{ $background->image_name }}">
            <span>{{ $background->image_name }}</span>
        </div>
        @endforeach
    </div>

    <div class="pomodoro-container">
        <div class="timer-wrapper">
            <h1>Pomodoro Timer</h1>
            <p>This is your timer page!</p>

            <div style="margin-top: 20px;">
                <button onclick="setTimer('focus')" class="btn btn-primary">Focus</button>
                <button onclick="setTimer('shortBreak')" class="btn btn-secondary">Short Break</button>
                <button onclick="setTimer('longBreak')" class="btn btn-warning">Long Break</button>
            </div>

            <div id="timer" style="font-size: 48px; margin-top: 20px;">00:30</div>

            <div style="margin-top: 20px;">
                <button onclick="startPauseTimer()" id="start-stop" class="btn btn-success">Start</button>
                <button onclick="resetTimer()" class="btn btn-danger">Reset</button>
            </div>
        </div>
    </div>
    <iframe
    style="border-radius: 12px; position: fixed; bottom: 10px; left: 20px; width: 380px; height: 120px; border: none; z-index: 100;"
    src="https://open.spotify.com/embed/playlist/0J6Ghsh3mEuNgGh2wRFgHw?utm_source=generator&theme=0"
    allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
    loading="lazy">
</iframe>


</div>
@endsection

@push('styles')
<style>
/* Reset default margin and padding */
body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    overflow: hidden;
}

/* Main Background Container */
.study-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-image: url('{{ asset('backgrounds/default.jpg') }}'); /* Your background image */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    transition: background-image 0.5s ease;
    z-index: 1;
    image-rendering: optimizeQuality;
    -webkit-image-rendering: optimize-contrast;
}

/* Quote Container */
.quote-container {
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    width: 80%;
    max-width: 600px;
    position: fixed;
    top: 10%;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    margin-bottom: 20px;
    z-index: 2;
}

.quote-text {
  font-size: 18px;
  line-height: 1.5;
  color: #333;
}

.quote-author {
  font-size: 14px;
  color: #666;
  margin-top: 10px;
  text-align: right;
}

/* Background Change Button */
.bg-change-btn {
    position: fixed;
    right: 20px;
    bottom: 20px;
    width: 50px;
    height: 50px;
    border-radius: 10px;
    background-color: #F08080;
    border: none;
    color: white;
    cursor: pointer;
    z-index: 3;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
}

/* Background Selector Panel */
.bg-selector-panel {
    display: none;
    position: fixed;
    right: 90px;
    bottom: 20px;
    background: white;
    border-radius: 8px;
    padding: 15px;
    width: 200px;
    max-height: 70vh;
    overflow-y: auto;
    z-index: 4;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.bg-option {
    margin-bottom: 10px;
    cursor: pointer;
}

.bg-option img {
    width: 100%;
    height: 80px;
    object-fit: cover;
    border-radius: 4px;
    border: 1px solid #eee;
}

.bg-option span {
    display: block;
    text-align: center;
    margin-top: 5px;
    font-size: 12px;
}

/* Pomodoro Timer Container */
.pomodoro-container {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 5;
    background-color: rgba(255, 255, 255, 0.8);
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.timer-wrapper {
    /* Optional max-width if needed */
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const btn = document.getElementById('bg-toggle-btn');
    const panel = document.getElementById('bg-selector');
    const container = document.getElementById('study-container');
    const quoteContainer = document.getElementById('quote-container');
    let currentQuoteIndex = 0;
    let intervalId;
    const quotes = @json($quotes ?? []);

    function displayQuote() {
        if (quotes.length > 0 && quoteContainer) {
            const quote = quotes[currentQuoteIndex];
            quoteContainer.innerHTML = `
                <p class="quote-text">${quote.text}</p>
                <p class="quote-author">- ${quote.author}</p>
            `;
            currentQuoteIndex = (currentQuoteIndex + 1) % quotes.length;
        }
    }

    if (quotes.length > 0 && quoteContainer) {
        displayQuote();
        intervalId = setInterval(displayQuote, 5000);
    }

    if (btn && panel && container) {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            panel.style.display = panel.style.display === 'block' ? 'none' : 'block';
        });

        document.addEventListener('click', function() {
            panel.style.display = 'none';
        });

        panel.addEventListener('click', function(e) {
            e.stopPropagation();
        });

        document.querySelectorAll('.bg-option').forEach(option => {
            option.addEventListener('click', function() {
                const bgUrl = this.dataset.bg;
                container.style.backgroundImage = `url('${bgUrl}')`;

                fetch('/update-background', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ background: bgUrl })
                });
            });
        });
    } else {
        console.error("Missing elements (button, panel, or container)!");
    }

    window.addEventListener('beforeunload', function() {
        if (intervalId) {
            clearInterval(intervalId);
        }
    });
});

let timerInterval;
let isRunning = false;
let timeLeft = 0.5 * 60; // 30 seconds for testing
let sessionType = 'focus'; // 'focus', 'shortBreak', 'longBreak'

// Format time as MM:SS
function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = seconds % 60;
    return `${minutes.toString().padStart(2, '0')}:${remainingSeconds.toString().padStart(2, '0')}`;
}

// Start/Pause Timer
function startPauseTimer() {
    if (isRunning) {
        clearInterval(timerInterval);
        document.getElementById("start-stop").innerText = "Start";
    } else {
        timerInterval = setInterval(() => {
            timeLeft--;
            document.getElementById("timer").innerText = formatTime(timeLeft);

            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                document.getElementById("start-stop").innerText = "Start";
                new Audio('/sounds/session-completed.wav').play();
                alert(sessionType.charAt(0).toUpperCase() + sessionType.slice(1) + " session complete!");

                if (sessionType === 'focus') {
                    fetch('/complete-session', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({})
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('🎉 Points updated! Total: ' + data.points);
                        }
                    });
                }
            }
        }, 1000);
        document.getElementById("start-stop").innerText = "Pause";
    }
    isRunning = !isRunning;
}

// Reset Timer
function resetTimer() {
    clearInterval(timerInterval);
    setTimer(sessionType);
    document.getElementById("start-stop").innerText = "Start";
    isRunning = false;
}

// Set Timer
function setTimer(type) {
    sessionType = type;
    switch (type) {
        case 'focus':
            timeLeft = 0.5 * 60;
            break;
        case 'shortBreak':
            timeLeft = 5 * 60;
            break;
        case 'longBreak':
            timeLeft = 15 * 60;
            break;
    }
    document.getElementById("timer").innerText = formatTime(timeLeft);
    if (isRunning) {
        startPauseTimer(); // pause if already running
    }
}
</script>
@endpush
    