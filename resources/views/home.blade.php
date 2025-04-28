@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<!-- Inject CSRF token into a JS variable BEFORE loading home.js -->
<script>
    window.csrfToken = "{{ csrf_token() }}";
</script>

<!-- Add your JavaScript file link here -->
<script src="{{ asset('js/home.js') }}"></script>

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


    <!-- Todo List Container -->
    <div class="todo-wrapper">
        <button class="toggle-button" onclick="toggleList()">ToDo List</button>
        <div class="todo-container" id="todoContainer" style="display: none;">
            <i class="fas fa-history history-icon"></i>
            <div class="title-container">
                <div class="todo-title">TO-DO LIST</div>
            </div>

            <div style="display: flex; gap: 10px; margin-bottom: 10px;">
                <button class="toggle-button" onclick="toggleList()">Hide List</button>
                <button class="history-button" onclick="toggleHistory()">History</button>
            </div>

            <!-- Todo List Items -->
            <ul class="todo-list" id="todoList">
                <!-- Items will be dynamically added here -->
            </ul>
        </div>
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
    style="border-radius: 12px; position: fixed; bottom: 20px; left: 20px; width: 380px; height: 120px; border: none; z-index: 100;"
    src="https://open.spotify.com/embed/playlist/0J6Ghsh3mEuNgGh2wRFgHw?utm_source=generator&theme=0"
    allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
    loading="lazy">
</iframe>
<div class= "rank-container">
<div class="points-box">
    <p>Welcome, {{ $user->first_name }}</p>
</div>
<div class="points-box">
    <p>Points: {{ $user->points }}</p>
</div>
</div>
    </div>
</div>
</div>
@endsection


@push('scripts')
<script>

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

</script>
@endpush
    