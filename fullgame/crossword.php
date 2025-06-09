<?php
session_start();
if (empty($_SESSION['username'])) {
    header('Location: name.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cybersecurity Word Search</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    * { margin:0; padding:0; box-sizing:border-box; }
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
      padding: 1rem;
      width: 95%; max-width: 700px;
      text-align: center;
      font-weight: bold;
    }
    h1 {
      text-shadow: 0 0 8px #00ff00;
      margin-bottom: 0.5rem;
      font-size: 2rem;
      font-weight: bold;
    }
    #score, #timer {
      display:inline-block;
      margin:0.3rem 0.5rem;
      font-size:2rem;
      font-weight: bold;
    }
    table {
      width:100%;
      border-collapse: collapse;
      table-layout: fixed;
      margin:1rem 0;
    }
    td {
      width:7.14%;
      height: 50px;
      border:1px solid #00ff00;
      position:relative;
      cursor:pointer;
      user-select:none;
    }
    td span {
      position:absolute;
      top:50%; left:50%;
      transform:translate(-50%,-50%);
      font-size:2rem;
      color:#00ff00;
      z-index:2;
    }
    td.selected { background:#00ff00; }
    td.selected span { color:black; }

    td.correct { background:#009900; }
    td.correct span { color:black; }

    .controls {
      margin-top:1rem; font-weight: bold;
    }
    .controls button {
      margin:0.3rem;
      padding:0.5rem 1rem;
      background:transparent;
      border:2px solid #00ff00;
      color:#00ff00;
      border-radius:4px;
      cursor:pointer;
      transition:background 0.2s,color 0.2s;
    }
    .controls button:hover {
      background:#00ff00; color:black;
    }
    #nextBtn { display:none; }

    @media (max-width:480px) {
      h1 { font-size:1.2rem; }
      td span { font-size:1.5rem;}
      .controls button { width:100%; max-width:300px; font-size:0.9rem; }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>🧩 CYBERSECURITY/DATA PRIVACY 🧩</h1>
    <h1 align="center">Game 1: Crossword</h1>
    <h1>Click the SUBMIT WORD button once you've found a word</h1>
    <h3>10 Pts Each Correct Answer</h3>
    <br/>
    <h3>Find this words</h3>
    <h3>"DATAPRIVACY","SCAM"</h3>
    <h3>"PHISHING","PROTECT"</h3>
    <br/>
    <h1><div id="score">Score: 0</div>
    <div id="timer">Time Left: 60s</div></h1>
    <table id="word-grid">
      <?php
      $grid = [
        ['J','D','P','R','O','T','E','C','T','B','A'],
        ['O','A','D','E','R','I','C','I','H','G','N'],
        ['N','T','J','O','V','E','N','O','I','I','J'],
        ['G','A','A','H','Z','A','B','C','O','L','O'],
        ['B','P','S','S','C','A','M','Z','G','O','M'],
        ['J','R','L','M','R','O','P','Q','A','R','A'],
        ['A','I','V','I','Y','I','S','A','G','Q','R'],
        ['Y','V','D','E','F','G','V','I','O','A','P'],
        ['S','A','E','M','C','E','E','A','K','V','O'],
        ['O','C','R','S','T','U','V','U','A','H','G'],
        ['N','Y','P','H','I','S','H','I','N','G','I'],
      ];
      foreach ($grid as $r => $row) {
        echo "<tr>";
        foreach ($row as $c => $ltr) {
          echo "<td data-r='$r' data-c='$c'><span>$ltr</span></td>";
        }
        echo "</tr>";
      }
      ?>
    </table>

    <div class="controls">
      <button id="submitBtn">SUBMIT WORD</button>
      <button id="clearBtn">CLEAR SELECTION</button>
      <button id="nextBtn">CONTINUE</button>
    </div>
  </div>

  <script>
    const words = ["SCAM","PHISHING","PROTECT","DATAPRIVACY","ANTIVIRUS"];
    const cells = Array.from(document.querySelectorAll('#word-grid td'));
    let selection = [], found = [], score = 0, gameOver = false;
    const scoreDiv = document.getElementById('score');
    const timerDiv = document.getElementById('timer');
    const submitBtn = document.getElementById('submitBtn');
    const clearBtn = document.getElementById('clearBtn');
    const nextBtn = document.getElementById('nextBtn');

    cells.forEach(cell => {
      cell.addEventListener('click', () => {
        if (gameOver || cell.classList.contains('correct')) return;
        cell.classList.toggle('selected');
        if (cell.classList.contains('selected')) {
          selection.push(cell);
        } else {
          selection = selection.filter(c => c !== cell);
        }
      });
    });

    clearBtn.addEventListener('click', () => {
      selection.forEach(c => c.classList.remove('selected'));
      selection = [];
    });

    function isStraight(coords) {
      if (coords.length < 2) return true;
      const dr = coords[1].r - coords[0].r, dc = coords[1].c - coords[0].c;
      const sr = Math.sign(dr), sc = Math.sign(dc);
      return coords.every((p,i) => {
        if (i===0) return true;
        const prev = coords[i-1];
        return (p.r-prev.r)===sr && (p.c-prev.c)===sc;
      });
    }

    submitBtn.addEventListener('click', () => {
      if (gameOver || !selection.length) return;
      const coords = selection.map(c=>({r:+c.dataset.r,c:+c.dataset.c}));
      if (!isStraight(coords)) {
        alert('Selections must form a straight line.');
        clearBtn.click();
        return;
      }
      const text = selection.map(c=>c.textContent).join('');
      const rev = text.split('').reverse().join('');
      const match = words.find(w=>w===text||w===rev);
      if (match && !found.includes(match)) {
        selection.forEach(c=>{
          c.classList.remove('selected');
          c.classList.add('correct');
        });
        found.push(match);
        score += 10;
        scoreDiv.textContent = 'Score: ' + score;
      } else {
        alert('Incorrect or already found.');
        clearBtn.click();
      }
      if (found.length===words.length) {
        gameOver = true;
        alert('All words found!');
        nextBtn.style.display='inline-block';
      }
      selection = [];
    });

    nextBtn.addEventListener('click', () => {
  fetch('save_crossword_score.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: 'score=' + score
  })
  .then(response => response.text())
  .then(data => {
    console.log('Score save response:', data);
    setTimeout(() => {
      window.location.href = 'pause.php';
    }, 300); // Slight delay to ensure session is saved
  })
  .catch(error => {
    console.error('Error saving score:', error);
    alert('Failed to save score. Please try again.');
  });
});



    let time = 60;
    const timerId = setInterval(() => {
      time--;
      timerDiv.textContent = 'Time Left: ' + time + 's';
      if (time <= 0) {
        clearInterval(timerId);
        gameOver = true;
        alert("Time's up!");
        nextBtn.style.display = 'inline-block';
      }
    }, 1000);
  </script>
</body>
</html>