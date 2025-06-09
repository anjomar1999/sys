<?php
session_start();

// Ensure crossword score is set
$score = isset($_SESSION['crossword_score']) ? $_SESSION['crossword_score'] : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pause - Word Search Game</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      background: black url('matrix.gif') repeat;
      background-size: cover;
      font-family: 'Courier New', monospace;
      color: #00ff00;
      display: flex; align-items: center; justify-content: center;
      min-height: 100vh;
    }
    .container {
      background: rgba(0,0,0,0.85);
      border: 2px solid #00ff00;
      border-radius: 8px;
      padding: 2rem;
      width: 90%; max-width: 600px;
      text-align: center;
    }
    h1 {
      font-size: 2rem;
      font-weight: bold; 
      text-shadow: 0 0 10px #00ff00;
      margin-bottom: 1rem;
    }
    p {
      font-size: 2rem;
      text-shadow: 0 0 10px #00ff00;
      font-weight: bold;
      margin: 1rem 0;
      color: #00ff00;
    }
    a {
      display: inline-block;
      background: #00ff00;
      padding: 1rem 2rem;
      border-radius: 4px;
      color: black;
      text-decoration: none;
      font-weight: bold;
      margin-top: 1rem;
      transition: background-color 0.3s;
      font-size: 1.5rem;
      
    }
    a:hover {
      background: #009900;
    }
    #score {
      font-size: 1.5rem;
      margin-bottom: 1rem;
      text-shadow: 0 0 8px #00ff00;
    }
    @media (max-width: 480px) {
      .container {
        padding: 1rem;
        width: 95%;
      }
      h1 { font-size: 1.5rem; 
        text-shadow: 0 0 10px #00ff00;
      }
      p { font-size: 1rem;
        text-shadow: 0 0 10px #00ff00;
        font-weight: bold; 
      }
      
      a {
        font-size: 1.5rem;
        text-shadow: 0 0 10px #00ff00;
        padding: 0.9rem 1.5rem;
        font-weight: bold;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>You've Completed the Crossword Game</h1>
    <p>Your score so far:</p>
    
    <strong><div id="score"><?php echo htmlspecialchars($score); ?> Points</div></strong>
    <h1>Are you ready for the next game?</h1>
    <a href="booth1_set1.php">START GAME!</a>
  </div>
</body>
</html>
