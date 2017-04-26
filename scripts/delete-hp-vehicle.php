<?php

require 'db.php';
$db = new DB();

$id = $_POST["id"];

$statement = $db->conn->prepare("
    UPDATE vehicles
    SET homepage_status = 0
    WHERE vehicle_id = ?
");

if (!$statement) die('Prepare Failed: ' . $db->conn->error);
$bind = $statement->bind_param("i", $id);
if (!$bind) die('Bind Failed: ' . $db->conn->error);
$execute = $statement->execute();
if (!$execute) die('Execute Failed: ' . $db->conn->error);

if ($execute) {
    header('Location: ../admin/dealmgt.php');
} else {
    die('Failed to remove home page item: ' . $db->conn->error);
}