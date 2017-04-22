<?php

// scripts/delete-vehicle.php

$vehicleToDelete = $_POST["id"];

require 'db.php';
$db = new DB();

$result = $db->query("DELETE FROM vehicles WHERE vehicle_id = '$vehicleToDelete'");

// Check for success
if ($result == true) {
    header('Location: ../admin/vehiclemgt.php');
} else {
    die("Error deleting user: " . $db->conn->error);
}
