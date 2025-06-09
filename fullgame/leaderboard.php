<?php
session_start();

$entries = file('leaderboard.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$leaderboard = array_map(fn($line) => [
    'name'  => urldecode(explode('|', $line)[0]),
    'score' => (int)explode('|', $line)[1]
], $entries);

usort($leaderboard, fn($a,$b) => $b['score'] - $a['score']);
$leaderboard = array_slice($leaderboard, 0, 20);

$name  = $_GET['name']  ?? null;
$score = $_GET['score'] ?? null;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Leaderboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
  <h1>TOYOTA OTIS</h1>
  <h1>MIS</h1>
    <h1>🏆 Leaderboard 🏆</h1>

    <?php if($name && $score): ?>
      <p class="highlight">You: <?= htmlspecialchars($name) ?> – <?= $score ?> points</p>
    <?php endif; ?>

    <table class="leaderboard-table">
      <thead>
        <tr>
          <th>Rank</th>
          <th>Name</th>
          <th>Score</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($leaderboard as $i => $row): ?>
          <tr class="<?= ($row['name']===$name && $row['score']==$score) ? 'user-row' : '' ?>">
            <td><?= $i+1 ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= $row['score'] ?> pts</td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
<br/>
<br/>
    <a href="name.php" class="btn-home">Return to Home</a>
  </div>
</body>
</html>
