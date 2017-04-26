<?php

// scripts/edit-user.php

require 'db.php';
$db = new DB();

$id = $_POST["id"];
$firstName = $_POST["first_name"];
$lastName = $_POST["last_name"];
$userName = $_POST["username"];
$password = md5($_POST["password"]);

$statement = $db->conn->prepare("
    UPDATE users
    SET first_name = ?, last_name = ?, username = ?, password = ?
    WHERE id = ?
");
if (!$statement) die('Prepare Failed: ' . $db->conn->error);

$bind = $statement->bind_param("ssssi", $firstName, $lastName, $userName, $password, $id);
if (!$bind) die('Bind Failed: ' . $db->conn->error);

$execute = $statement->execute();
if (!$execute) die('Execute Failed: ' . $db->conn->error);

if ($execute) {
    header('Location: ../admin/usermgt.php');
} else {
    die('Could not update user: ' . $db->conn->error);
}