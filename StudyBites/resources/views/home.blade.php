@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Pomodoro Timer</h1>
    <p>This is your timer page!</p>

    <!-- Under Construction -->
    <div id="timer" style="font-size: 48px; margin-top: 20px;">00:30</div> 
    <button onclick="startTimer()">Start</button>

    <script>
        let timerInterval;
        let timeLeft = 30; // 25 minutes in seconds

        function startTimer() {
            clearInterval(timerInterval);
            timerInterval = setInterval(() => {
                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;
                document.getElementById("timer").innerText =
                    `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

                if (timeLeft === 0) {
                    clearInterval(timerInterval);
                    alert("Session complete!");
                } else {
                    timeLeft--;
                }
            }, 1000);
        }
    </script>
</div>
@endsection
