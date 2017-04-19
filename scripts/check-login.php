<?php

require 'db.php';

$db = new DB();

$user = $db->getUser("SELECT * FROM users WHERE username = '$_POST[username]'");

if ($user == false) {
    header('Location: ../views/login.php');
} else if($user["password"] != md5($_POST["password"])) {
    header('Location: ../views/login.php');
} else {
    session_start();
    $_SESSION['userId'] = $user['id'];
    $_SESSION['first_name'] = $user['first_name'];
    $_SESSION['last_name'] = $user['last_name'];
    header('Location: ../admin/index.php');
}