<?php
$menu = '';
if (isset($_GET['menu'])) {
    $menu = $_GET['menu'];
}
switch ($menu) {
    case 'copy':
        include 'copy.php';
        break;
    case 'move':
        include 'move.php';
        break;
        
    default:
        include 'home.php';
        break;
}
?>