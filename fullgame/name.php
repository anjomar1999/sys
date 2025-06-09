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
<html>
<head>
    <title>Enter Name</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
<style>
    
    h1 {
      text-shadow: 0 0 8px #00ff00;
      margin-bottom: 0rem;
      font-size: 2rem;
      font-weight: bold;
    }
    </style>
</head>

<body>
<h1 style="background-color:darkgreen">TOYOTA OTIS</h1>

<div class="container">
    <h2>Welcome to</h2>
    <h1>DIGITAL SAFETY ONLINE GAMES</h1>
    <br/>
    <h2>Enter Your Name</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Enter your name" required>
        <button type="submit" class="btn">START GAME!</button>
    </form>

    
</div>
<h2 style="background-color:darkgreen">MIS DEPARTMENT</h2>

</body>
</html>
