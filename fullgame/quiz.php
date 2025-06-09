<?php
session_start();
include 'questions.php';

if (!isset($questions) || empty($questions)) {
    die("Questions array is not properly defined.");
}

if (!isset($_SESSION['quiz_questions'])) {
    shuffle($questions);
    $_SESSION['quiz_questions'] = array_slice($questions, 0, 5); // 5 questions only
    $_SESSION['quiz_score'] = 0;
}

$selected = $_SESSION['quiz_questions'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = $_SESSION['quiz_score'] ?? 0;
    $current_question = $_POST['current_question'];

    if (isset($selected[$current_question])) {
        if (isset($_POST['answer']) && $_POST['answer'] === $selected[$current_question]['answer']) {
            $score += 20; // 20 points per correct answer
        }
    }

    $_SESSION['quiz_score'] = $score;

    if ($current_question < count($selected) - 1) {
        $next_question = $current_question + 1;
        header("Location: quiz.php?question=$next_question");
        exit();
    } else {
        header("Location: result.php");
        exit();
    }
} else {
    $current_question = isset($_GET['question']) ? intval($_GET['question']) : 0;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cybersecurity Quiz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <script>
    let timeLeft = 100; // 60 seconds
    function startTimer() {
        const timer = document.getElementById('timer');
        const timeoutForm = document.getElementById('timeoutForm');
        const countdown = setInterval(() => {
            if (timeLeft <= 0) {
                clearInterval(countdown);
                timeoutForm.submit(); // Submit blank/timeout answer
            } else {
                timer.textContent = timeLeft + 's';
                timeLeft--;
            }
        }, 1000);
    }
    window.onload = startTimer;
    </script>
</head>
<body>
<div class="container">
    <h1>Cybersecurity Quiz</h1>


    <?php if (!isset($selected[$current_question])): ?>
        <p>Invalid question index. Please try again.</p>
    <?php else: ?>
        <form method="post" id="quizForm">
            <div class="question">
                <p><?= $selected[$current_question]['question'] ?></p>
                <?php foreach ($selected[$current_question]['options'] as $opt): ?>
                    <button type="submit" name="answer" value="<?= substr($opt, 0, 1) ?>" class="choice-btn">
                        <?= $opt ?>
                    </button><br>
                <?php endforeach; ?>
                <input type="hidden" name="current_question" value="<?= $current_question ?>">
            </div>
            <h1><strong>Time Left:</strong> <span id="timer">100s</span></h1>
        </form>

        <!-- Timeout fallback form (no answer = 0 point) -->
        <form method="post" id="timeoutForm" style="display:none;">
            <input type="hidden" name="current_question" value="<?= $current_question ?>">
        </form>
    <?php endif; ?>
</div>
</body>
</html>
