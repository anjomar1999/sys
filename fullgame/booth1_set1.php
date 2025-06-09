<?php
session_start();

// Make sure name and crossword score are set
if (!isset($_SESSION['username'])) {
    header('Location: crossword.php');
    exit();
}
if (!isset($_SESSION['crossword'])) {
    $_SESSION['crossword'] = 0; // Default to 0 if not already set
}

// Handle points submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['set1'] = (int)$_POST['points'];
    header('Location: booth1_set2.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Color Game – Set 1</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
  <h2>CYBERSECURITY/DATA PRIVACY</h2>
    <h2>Game 2: Color Game</h2>
    <h2>Set 1</h2>
    <form method="post">
      <button type="submit" name="points" value="0"  class="btn">+0 Points</button>
      <button type="submit" name="points" value="5"  class="btn">+5 Points</button>
      <button type="submit" name="points" value="10" class="btn">+10 Points</button>
      <button type="submit" name="points" value="15" class="btn">+15 Points</button>
    </form>
  </div>
</body>
</html>
