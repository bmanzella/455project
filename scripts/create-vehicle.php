<?php
require 'db.php';
$db = new DB();

$result = $db->query("
      SELECT t.type_id, s.supplier_id
      FROM vehicle_type t, suppliers s
      WHERE '$_POST[make]' = s.name AND 
      '$_POST[model]' = t.model");

$typeId = [];
while ($row = $result->fetch_assoc()) {
    $typeId[] = $row;
}

foreach ($typeId as $id) {
    $supplierId = $id["supplier_id"];
    $finalTypeId = $id['type_id'];

}
$color = $_POST['color'];
$cost = $_POST['cost'];
$year = $_POST['year'];

$insertVehicle = $db->query("
  INSERT INTO vehicles(supplier_id, type_id, color, cost, year)
  VALUES (('$supplierId'), ('$finalTypeId'), ('$color'), ($cost), ($year))
  ");

if ($insertVehicle) {
    header('Location: ../admin/vehiclemgt.php');
} else {
    die('Error adding vehicle: ' . $db->conn->error);
}