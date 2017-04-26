<?php

// scripts/delete-user.php

$userToDelete = $_POST["id"];

require 'db.php';
$db = new DB();

$result = $db->query("DELETE FROM users WHERE id = $userToDelete");

// Check for success
if ($result == true) {
    header('Location: ../admin/usermgt.php');
} else {
    die("Error deleting user: " . $db->conn->error);
}
