<?php
session_start();

$users = [
    'admin' => 'password',
    'totadmin' => 'totadmin',
    'vsm' => '#totvsm@8504#',
    'group1' => 'password',
    'group2' => 'password',
    'group3' => 'password',
    'group4' => 'password',
    'group5' => 'password',
    'group6' => 'password',
    'group7' => 'password',
    'group8' => 'password',
    'group9' => 'password'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Check if user exists and password is correct
    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION['username'] = $username;
        header("Location: {$username}"); // Redirect to user-specific page
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" type="x-icon" href="FATS.jpg">
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.2/js/dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.2/js/dataTables.bootstrap4.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
<title>FATS | LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<nav class="navbar navbar-light justify-content-center fs-1 text-light mb-4" align="center" style="background-color: #c91019;">
<h1><strong>FINANCING APPLICATION TRACKING SYSTEM</strong></h1></nav>
<form action="login" method="POST">
<h2 align="center"><strong>WELCOME</strong></h2>
    <?php if (isset($error)): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>
        <label for="username"><strong>Username</strong></label>
        <input type="text" name="username" required placeholder=" Enter your Username">
        <br>
        <label for="password"><strong>Password</strong></label>
        <input type="password" name="password" required placeholder=" Enter your Password">
        <br>
        
        <button type="submit" >LOGIN</button>

        <br />
        <h6 class="text-light" align="left">Developed By. Anjomar Bernardo</h6>
        </form>
    
</body>
</html>
