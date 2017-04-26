<?php
// scripts/edit-vehicle.php

require 'db.php';
$db = new DB();

$id = $_POST["id"];
$cost = $_POST["cost"];
$status = $_POST["status"];
$custId = $_POST["custId"];

$result = $db->query("
    SELECT * FROM sales
    WHERE vehicle_id = '$_POST[id]'
  ");

if (mysqli_num_rows($result) == 0) {
    $insertSale = $db->query("
        INSERT INTO sales(customer_id, vehicle_id, sale_amount, sale_date)
        VALUES($custId, $id, $cost, '$_POST[status]')
        WHERE vehicle_id = $id");
} else {
    $updateSale = $db->query("
        UPDATE sales s, vehicles v
        SET s.customer_id = '$_POST[custId]', s.vehicle_id = '$_POST[id]', s.sale_amount = '$_POST[cost]', s.sale_date = '$_POST[status]', v.cost = '$_POST[cost]', v.customer_id = '$_POST[custId]'
        WHERE s.customer_id = '$_POST[custId]'
        AND s.vehicle_id = '$_POST[id]'
        AND v.vehicle_id = '$_POST[id]'
    ");
}

if ($updateSale || $insertSale) {
    header('Location: ../admin/vehiclemgt.php');
} else {
    die('Error updating vehicle: ' . $db->conn->error);
}