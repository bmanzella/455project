<?php
session_start();
if(isset($_SESSION['userId']) == false) {
    header('Location: signin.php');
}
$title = 'Statistics';
include '../views/header.php';
include '../views/navbar.php';


include '../views/footer.php';


?>