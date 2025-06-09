<?php
session_start();

// Retrieve scores from the session
$quizScore   = $_SESSION['quiz_score'] ?? 0;
$set1        = $_SESSION['set1'] ?? 0;
$set2        = $_SESSION['set2'] ?? 0;
$set3        = $_SESSION['set3'] ?? 0;
$set4        = $_SESSION['set4'] ?? 0;
$crossword   = $_SESSION['crossword_score'] ?? 0;  // Updated to match crossword session key

// Calculate total score
$total = $quizScore + $set1 + $set2 + $set3 + $set4 + $crossword;

// Get username
$name = $_SESSION['username'] ?? 'Player';

// Append to leaderboard
file_put_contents(
    'leaderboard.txt',
    urlencode($name) . '|' . $total . "\n",
    FILE_APPEND
);

// Save values temporarily before clearing session
$savedScores = [
    'name' => $name,
    'quiz' => $quizScore,
    'set1' => $set1,
    'set2' => $set2,
    'set3' => $set3,
    'set4' => $set4,
    'crossword' => $crossword,
    'total' => $total
];

// 🧹 Clear session
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Result</title>
  <meta http-equiv="refresh" content="8;url=leaderboard.php?name=<?= urlencode($savedScores['name']) ?>&score=<?= $savedScores['total'] ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <style>
    .container {
      max-width: 400px;
      margin: auto;
      background: rgba(0,0,0,0.8);
      color: #00ff00;
      padding: 20px;
      margin-top: 50px;
      border-radius: 10px;
      font-family: monospace;
    }
    h1, h2 {
      text-align: center;
    }
    ul {
      list-style: none;
      padding: 0;
      font-size: 18px;
    }
    li {
      margin: 8px 0;
    }
    .total {
      font-size: 22px;
      margin-top: 15px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Results for <?= htmlspecialchars($savedScores['name']) ?></h1>
    <ul>
      <li>Crossword Score: <?= $savedScores['crossword'] ?> Pts</li>
      <li>Color Game Set 1: <?= $savedScores['set1'] ?> Pts</li>
      <li>Color Game Set 2: <?= $savedScores['set2'] ?> Pts</li>
      <li>Color Game Set 3: <?= $savedScores['set3'] ?> Pts</li>
      <li>Color Game Set 4: <?= $savedScores['set4'] ?> Pts</li>
      <li>Quiz Score: <?= $savedScores['quiz'] ?> Pts</li>
    </ul>
    <div class="total">Total Score: <?= $savedScores['total'] ?> Pts</div>
    <p style="text-align:center; margin-top: 20px;">Redirecting to leaderboard...</p>
  </div>
</body>
</html>