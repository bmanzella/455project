<?php
$title = "Vehicle For Sale";
include 'header.php';
include 'navbar.php';


$id = $_POST["id"];
$year = $_POST["year"];
$make = $_POST["make"];
$model = $_POST["model"];
$class = $_POST["class"];
$color = $_POST["color"];
$cost = $_POST["cost"];
$status = $_POST["status"];

?>
<div class="container">
    <br>
    <h1 id="vehicleTitle"><?php echo $year . ' ' . $make . ' ' . $model?></h1>
    <br>
    <ul class="list-group" id="indvVehicle">
        <li class="list-group-item" id="indvVehicleElement">
            <h4>Year: </h4><?php echo $year ?>
        </li>
        <li class="list-group-item" id="indvVehicleElement">
            <h4>Make: </h4><?php echo $make ?>
        </li>
        <li class="list-group-item" id="indvVehicleElement">
            <h4>Model: </h4><?php echo $model ?>
        </li>
        <li class="list-group-item" id="indvVehicleElement">
            <h4>Class: </h4><?php echo $class ?>
        </li>
        <li class="list-group-item" id="indvVehicleElement">
            <h4>Color: </h4><?php echo $color ?>
        </li>
    </ul>
    <ul class="list-group" id="indvVehicleRight">
        <li class="list-group-item" id="indvVehicleElement">
            <h4>Vehicle ID Number: </h4><?php echo 'V' . sprintf('%07d', $id)?>
        </li>
        <li class="list-group-item" id="indvVehicleElement">
            <h4>Cost: <?php echo $cost ?></h4>
        </li>
        <li class="list-group-item" id="indvVehicleElement">
            <h4>Status: </h4><?php echo $status ?>
        </li>
        <li class="list-group-item" id="indvVehicleElement">
            <form action="../scripts/make-offer.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="hidden" name="year" value="<?php echo $year ?>">
                <input type="hidden" name="make" value="<?php echo $make ?>">
                <input type="hidden" name="model" value="<?php echo $model ?>">
                <input type="hidden" name="class" value="<?php echo $class ?>">
                <input type="hidden" name="cost" value="<?php echo $cost ?>">
                <button class="btn btn-primary btn-md">Make an Offer</button>
            </form>
        </li>
    </ul>

</div>


<?php include 'footer.php'; ?>