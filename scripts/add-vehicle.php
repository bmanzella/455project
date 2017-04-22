<?php

session_start();
if(isset($_SESSION['userId']) == false) {
    header('Location: login.php');
}

$title = 'Add Vehicle';
include '../views/header.php';
include '../views/navbar.php';
include '../admin/adminnav.php';

require 'db.php';
$db = new DB();

/**
 * Get the make of the vehicles from the DB
 */
$vehicleMake = $db->query("SELECT DISTINCT make FROM vehicle_type");
$makes = [];
while ($row = $vehicleMake->fetch_assoc()) {
    $makes[] = $row;
}

/**
 * Get the model of the vehicles from the DB
 */
$vehicleModel = $db->query("SELECT DISTINCT model FROM vehicle_type");
$models = [];
while($row = $vehicleModel->fetch_assoc()) {
    $models[] = $row;
}

/**
 * Get the distinct class(es) from DB
 */
$vehicleClass = $db->query("SELECT DISTINCT class FROM vehicle_type");
$classes = [];
while($row = $vehicleClass->fetch_assoc()) {
    $classes[] = $row;
}

// Modify the form action based on action
$formAction = 'create-vehicle.php';

?>

<form id="login" action="<?php echo $formAction ?>" method="POST">
    <label for="year">Model Year: </label>
    <input type="number" name="year" id="year" value="<?php echo $modelYear ?>"/>
    <br><br>
    <label for="make">Make: </label>
    <select name="make" id="make">
        <?php
            foreach ($makes as $make) { ?>
                <option id="make" value="<?php echo $make["make"] ?>"><?php echo $make["make"] ?></option>
        <?php }
        ?>
    </select>
    <br>
    <label for="model">Model: </label>
    <select name="model" id="model">
        <?php
            foreach($models as $model) { ?>
                <option name="model" id="model" value="<?php echo $model["model"] ?>"><?php echo $model["model"] ?></option>
      <?php } ?>
    </select>
    <br>
    <label for="class">Class:</label>
    <select name="class" id="class">
        <?php
            foreach ($classes as $class) { ?>
                <option name="class" id="class" value="<?php echo $class["class"] ?>"><?php echo $class["class"] ?></option>
            <?php }
        ?>
    </select>
    <br>
    <label for="color">Color:</label>
    <input type="text" name="color" id="color"/>
    <br><br>
    <label for="cost">Cost:</label>
    <input type="number" name="cost" id="cost"/>
    <br><br>
    <input type="hidden" name="id" value="<?php echo $userId ?>">
    <button class="btn btn-primary" id="register-btn" type="submit">Save</button>
</form>
