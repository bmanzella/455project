<?php

$title = 'Register User';
include '../views/header.php';
include '../views/navbar.php';
include 'adminnav.php';

require '../scripts/db.php';
$db = new DB();
$user = $db->authenticateUser($_POST["username"], md5($_POST["password"]));

if ($user == false) {
    $pw = md5($_POST["password"]);
    
}


include '../views/footer.php';