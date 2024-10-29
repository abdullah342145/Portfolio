<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Thank you for contacting Spark Web Studio. We will get back to you soon. Return to the home page for more details about our services.">
    <meta name="keywords" content="thank you, contact, Spark Web Studio, web development, home page">
    <meta name="author" content="Spark Web Studio">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.5.1.3.css">
    <title>Thank You - Spark Web Studio</title>
</head>
<style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f8ff;
            font-family: Arial, sans-serif;
            overflow: hidden;
        }
        .container {
            text-align: center;
            z-index: 1;
        }
        .message {
            font-size: 2em;
            color: #4caf50;
            margin-bottom: 20px;
        }
        .confetti {
            position: absolute;
            top: 0;
            left: 50%;
            width: 10px;
            height: 10px;
            background-color: red;
            opacity: 0.8;
            transform: translateX(-50%);
            animation: fall 5s linear infinite;
        }
        @keyframes fall {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }
    </style>
<body>
<div class="container">
        <div class="message">THANK YOU!
            <P>Thanks for contacting us, we will get back to you soon</P> 
        <strong><P>Back to the HOME PAGE </strong>
            <a href="index.php" class="nav-link">HOME</a>
        </P></div>
    </div>
    <script>
        function createConfetti() {
            const confettiColors = ['#FF0A0A', '#FF5722', '#FF9800', '#FFC107', '#FFEB3B', '#CDDC39', '#8BC34A', '#00BCD4', '#03A9F4', '#3F51B5', '#673AB7', '#9C27B0'];
            for (let i = 0; i < 100; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.backgroundColor = confettiColors[Math.floor(Math.random() * confettiColors.length)];
                confetti.style.left = `${Math.random() * 100}vw`;
                confetti.style.animationDelay = `${Math.random() * 5}s`;
                confetti.style.animationDuration = `${Math.random() * 3 + 2}s`;
                document.body.appendChild(confetti);
            }
        }
        window.onload = createConfetti;
    </script>
</body>
</html>