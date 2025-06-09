<?php
session_start();

// Must come from set3
if (!isset($_SESSION['set3'])) {
    header('Location: booth1_set3.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['set4'] = (int)$_POST['points'];
    // All booths done → go to ready or quiz directly
    header('Location: ready.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Color Game – Set 4</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
  <h2>CYBERSECURITY/DATA PRIVACY</h2>
    <h2>Game 2: Color Game</h2>
    <h2>Set 4</h2>
    <form method="post">
      <button type="submit" name="points" value="0"  class="btn">+0 Points</button>
      <button type="submit" name="points" value="5"  class="btn">+5 Points</button>
      <button type="submit" name="points" value="10" class="btn">+10 Points</button>
      <button type="submit" name="points" value="15" class="btn">+15 Points</button>
    </form>
  </div>
</body>
</html>
