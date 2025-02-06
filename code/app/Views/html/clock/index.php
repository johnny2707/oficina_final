<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clock | johhny</title>

    <style>
        @font-face {
            font-family: 'futura';
            src: url('../../../../../assets/fonts/futuraMediumBt.ttf');
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'futura';
        }

        body {
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .main {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
        }

        .button-group {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            width: 25%;
        }

        button, a {
            padding: 1vh 2vw;
            background-color: #2F2F2F;
            color: #FAFAFA;
            border: none;
            border-radius: 25px;
            text-decoration: none;
        }

        span {
            font-size: 80pt;
        }
    </style>
</head>
<body onload="resetClock()">
    
    <div class="main">
        <span id="clock"></span>

        <div class="button-group">
            <button id="start" onclick="startClock()">start</button>
            <button id="stop" onclick="stopClock()">stop</button>
            <button id="reset" onclick="resetClock()">reset</button>
        </div>

        <a href="<?= base_url() ?>">go back</a>
    </div>
    
    <script>
        var startButton = document.getElementById('start');
        var stopButton = document.getElementById('stop');
        var resetButton = document.getElementById('reset');
        var clock = document.getElementById('clock');

        var m;
        var s;

        var clockDisplay;
        var countdown;

        function countdownFunction() {
            if(m < 10) {
                md = '0'+m;
            }
            else {
                md = m;
            }
            if(s < 10) {
                sd = '0'+s;
            }
            else {
                sd = s;
            }

            clockDisplay = md + ' : ' + sd;
            clock.innerHTML = clockDisplay;

            if(m == 0 && s == 0) {
                resetClock();
            }
            else {
                if(s == 0) {
                    m = m - 1;
                    s = 59;
                }
                else {
                    s = s - 1;
                }
            }
        }

        function resetClock() {
            clearInterval(countdown);
            m = 15;
            s = 0;

            clockDisplay = '15 : 00';
            clock.innerHTML = clockDisplay;
        }

        function startClock() {
            countdown = setInterval(countdownFunction, 1000);
            countdownFunction();
        }

        function stopClock() {
            clearInterval(countdown);
        }
    </script>
    
</body>
</html>