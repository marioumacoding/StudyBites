@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Pomodoro Timer</h1>
    <p>This is your timer page!</p>

    <!-- Timer Display -->
    <div id="timer" style="font-size: 48px; margin-top: 20px;">25:00</div> 

    <!-- Focus, Short Break, Long Break Buttons -->
    <div style="margin-top: 20px;">
        <button onclick="setTimer('focus')" class="btn btn-primary">Focus</button>
        <button onclick="setTimer('shortBreak')" class="btn btn-secondary">Short Break</button>
        <button onclick="setTimer('longBreak')" class="btn btn-warning">Long Break</button>
    </div>

    <!-- Start/Pause and Reset Buttons -->
    <div style="margin-top: 20px;">
        <button onclick="startPauseTimer()" id="start-stop" class="btn btn-success">Start</button>
        <button onclick="resetTimer()" class="btn btn-danger">Reset</button>
    </div>

    <script>
        let timerInterval;
        let isRunning = false;
        let timeLeft = 25 * 60; // 25 minutes in seconds
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

                    // Check if the timer is finished
                    if (timeLeft <= 0) {
                        clearInterval(timerInterval);
                        document.getElementById("start-stop").innerText = "Start";
                        alert(sessionType.charAt(0).toUpperCase() + sessionType.slice(1) + " session complete!");
                    }
                }, 1000);
                document.getElementById("start-stop").innerText = "Pause";
            }
            isRunning = !isRunning;
        }

        // Reset Timer
        function resetTimer() {
            clearInterval(timerInterval);
            setTimer(sessionType); // Reset to the current session type
            document.getElementById("start-stop").innerText = "Start";
            isRunning = false;
        }

        // Set Timer based on session type
        function setTimer(type) {
            sessionType = type;
            switch (type) {
                case 'focus':
                    timeLeft = 25 * 60; // 25 minutes for focus session
                    break;
                case 'shortBreak':
                    timeLeft = 5 * 60; // 5 minutes for short break
                    break;
                case 'longBreak':
                    timeLeft = 15 * 60; // 15 minutes for long break
                    break;
            }
            document.getElementById("timer").innerText = formatTime(timeLeft);
            if (isRunning) {
                startPauseTimer(); // Automatically start if the timer is running
            }
        }
    </script>
</div>
@endsection
