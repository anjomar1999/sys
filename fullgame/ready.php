<?php
session_start();

// Prevent direct access unless booth1_set4 is complete
if (!isset($_SESSION['set4'])) {
    header('Location: booth1_set4.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ready to Take the Exam</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>CYBERSECURITY/DATA PRIVACY</h2>
    <h2>Game 3: Quiz</h2>
    <h3>You’ve completed Color Game.</h3>
    <h3>Are you ready for the next game?</h3>
    <br>
    <form action="quiz.php?question=0" method="get">
      <button type="submit" class="btn">START GAME!</button>
    </form>
  </div>
</body>
</html>
