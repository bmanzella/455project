<?php

session_start();
if(isset($_SESSION['userId']) == false) {
    header('Location: signin.php');
}

$title = 'Manage Users';
include '../views/header.php';
include '../views/navbar.php';



include '../views/footer.php';