<!DOCTYPE html>
<html>
<head>
    <title>Thanks for Your Order</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .tick {
            width: 100px;
            height: 100px;
            border: 2px solid #4caf50;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: scaleTick 0.5s ease-in-out forwards;
            opacity: 0;
        }

        .tick::before {
            content: '';
            width: 60px;
            height: 30px;
            border-width: 0 0 3px 3px;
            border-style: solid;
            transform: rotate(-45deg);
            border-color: #4caf50;
            opacity: 0;
            animation: drawTick 0.5s ease-in-out 0.5s forwards;
        }

        @keyframes scaleTick {
            to {
                transform: scale(1.2);
                opacity: 1;
            }
        }

        @keyframes drawTick {
            to {
                width: 60px;
                height: 30px;
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="tick"></div>
    <script>
        setTimeout(function() {
            var audio = new Audio('swoosh-transition-with-metal-overtones-142375.mp3');
            audio.play(); // Play the tick sound

            setTimeout(function() {
                window.location.href = '/admin/dashboard'; // Redirect to the admin dashboard after a delay
            }, 1000); // Delay before redirecting (in milliseconds)
        }, 5000); // 2000 milliseconds = 2 seconds
    </script>
</body>
</html>
