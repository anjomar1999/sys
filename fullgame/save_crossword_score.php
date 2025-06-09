<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['score'])) {
    $_SESSION['crossword_score'] = intval($_POST['score']);
    echo 'Score saved';
} else {
    echo 'Invalid request';
}
?>
