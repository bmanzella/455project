<?php
/**
 * scripts/update-vehicle.php
 * Called when the user wants to update a vehicle
 * Here's what it does. We only want to update
 * the vehicle cost and status so there is no sense
 * in tearing apart the other form to get the job
 * done.
 */

$title = 'Update Vehicle';
include '../views/header.php';
include '../views/navbar.php';
include '../admin/adminnav.php';
require 'db.php';
$db = new DB();

$id = $_POST["id"];

$result = $db->query("
    SELECT v.vehicle_id, v.homepage_status , t.make, t.model, t.class, v.color, v.cost, v.year, s.sale_date, s.customer_id
    FROM (vehicles v, vehicle_type t)
    LEFT JOIN sales s ON (v.vehicle_id = s.vehicle_id)
    WHERE t.type_id = v.type_id
    AND v.vehicle_id = '$_POST[id]'
    GROUP BY v.vehicle_id");

$vehicles = [];

while($row = $result->fetch_assoc()) {
    $vehicles[] = $row;
}


?>

<form id="login" action="edit-vehicle.php" method="post">
    <label for="id">Vehicle ID: </label>
    <p id="id"><?php echo $id ?></p>
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <?php
        foreach ($vehicles as $vehicle) { ?>
            <label for="cost">Cost: </label>
            <input id="cost" type="number" name="cost" value="<?php echo $vehicle["cost"] ?>">
            <br><br>
            <label for="status">Sale Date: </label>
            <input type="text" id="status" name="status" placeholder="YYYY-MM-DD" value="<?php echo $vehicle["sale_date"] ?>">
            <br><br>
            <label for="custId">Customer ID: </label>
            <input type="text" id="custId" name="custId" value="<?php echo $vehicle["customer_id"] ?>">
        <?php   }
    ?>
    <br><br>
    <center><button class="btn btn-primary btn-md">Save</button></center>
</form>
    <br><br>
<?php include '../views/footer.php'; ?>