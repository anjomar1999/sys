<?php
include 'includes/header.php';
if (!isset($_SESSION['booth1_set4'])) {
    header('Location: booth1_set4.php');
    exit();
}
$game1_total = $_SESSION['booth1_set1'] + $_SESSION['booth1_set2'] + $_SESSION['booth1_set3'] + $_SESSION['booth1_set4'];
$_SESSION['game1_total'] = $game1_total;
?>

<h1>Game 1 Complete!</h1>
<p><?= htmlspecialchars($_SESSION['player_name']) ?>, you scored <strong><?= $game1_total ?></strong> points in Booth 1.</p>
<a href="index.php" class="btn">Proceed to Quiz</a>

<?php include 'includes/footer.php'; ?>
