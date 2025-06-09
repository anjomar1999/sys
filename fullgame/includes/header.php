<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CyberSec Game</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="matrix-background"></div>
  <div class="container">
