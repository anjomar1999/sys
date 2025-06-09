<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['username'] = $_POST['username'];

    // 🔁 Reset all scores
    $_SESSION['quiz_score'] = 0;
    $_SESSION['set1'] = 0;
    $_SESSION['set2'] = 0;
    $_SESSION['set3'] = 0;
    $_SESSION['set4'] = 0;

    // Redirect to crossword page
    header('Location: crossword.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enter Name - Cybersecurity Game</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            background: black url('matrix.gif') repeat;
            background-size: cover;
            font-family: 'Courier New', monospace;
            color: #00ff00;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background: rgba(0, 0, 0, 0.85);
            border: 2px solid #00ff00;
            border-radius: 8px;
            padding: 2rem;
            width: 95%;
            max-width: 500px;
            text-align: center;
        }
        h1 {
            font-size: 2rem;
            color: #00ff00;
            margin-bottom: 1rem;
            text-shadow: 0 0 8px #00ff00;
        }
        h2 {
            font-size: 1.25rem;
            color: #00ff00;
            margin-bottom: 1rem;
        }
        input[type="text"] {
            width: 80%;
            padding: 0.8rem;
            margin: 0.5rem 0;
            border: 2px solid #00ff00;
            border-radius: 4px;
            background: transparent;
            color: #00ff00;
            font-size: 1rem;
        }
        button {
            width: 80%;
            padding: 0.8rem;
            background: transparent;
            border: 2px solid #00ff00;
            color: #00ff00;
            font-size: 1rem;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s, color 0.3s;
        }
        button:hover {
            background: #00ff00;
            color: black;
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.5rem;
            }
            input[type="text"], button {
                width: 100%;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Cybersecurity Game</h1>
        <h2>Please Enter Your Name to Start</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Enter your name" required>
            <button type="submit" class="btn">Start Game</button>
        </form>
    </div>
</body>
</html>
