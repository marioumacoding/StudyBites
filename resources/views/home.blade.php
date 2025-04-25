@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>Pomodoro Timer</h1>
        <p>This is your timer page!</p>

        <!-- Focus, Short Break, Long Break Buttons -->
        <div style="margin-top: 20px;">
            <button onclick="setTimer('focus')" class="btn btn-primary">Focus</button>
            <button onclick="setTimer('shortBreak')" class="btn btn-secondary">Short Break</button>
            <button onclick="setTimer('longBreak')" class="btn btn-warning">Long Break</button>
        </div>

        <!-- Timer Display -->
        <div id="timer" style="font-size: 48px; margin-top: 20px;">00:30</div> 

        <!-- Start/Pause and Reset Buttons -->
        <div style="margin-top: 20px;">
            <button onclick="startPauseTimer()" id="start-stop" class="btn btn-success">Start</button>
            <button onclick="resetTimer()" class="btn btn-danger">Reset</button>
        </div>

        <script>
        let timerInterval;
        let isRunning = false;
        let timeLeft = 0.5 * 60; // for testing: 30 seconds
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
                        // Play sound
                        new Audio('/sounds/session-completed.wav').play();
                        alert(sessionType.charAt(0).toUpperCase() + sessionType.slice(1) + " session complete!");
                        
                        // Only update points if it's a focus session
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

    </div>
@endsection

@section('styles')
    <style>
        body {
            background-image: url('{{ Auth::user()->background ? asset(Auth::user()->background->image_path) : asset('images/backgrounds/default_background.jpg') }}');
            background-size: cover;
        }
    </style>
@endsection
