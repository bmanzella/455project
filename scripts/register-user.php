<?php
require '../scripts/db.php';
$db = new DB();
$user = $db->registerUser("SELECT * FROM users WHERE username = '$_POST[username]'");

if ($user == false) {
    $pw = md5($_POST["password"]);
    $db->query("
        INSERT INTO users(first_name, last_name, username, password)
        VALUES ('$_POST[first_name]', '$_POST[last_name]', '$_POST[username]', '$pw');
    
    ");
    header('Location: ../views/login.php');
} else {
    header('Location: reguser.php');
}


include '../views/footer.php';