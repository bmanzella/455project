<?php
// scripts/add-homepage-vehicle.php
session_start();
if(isset($_SESSION['userId']) == false) {
    header('Location: ../views/login.php');
}
$title = 'Home Page Management';
include '../views/header.php';
include '../views/navbar.php';
require 'db.php';
$db = new DB();

$result = $db->query("
    SELECT * FROM vehicles WHERE homepage_status = 0
");
$vehicles = [];
while($row = $result->fetch_assoc()) {
    $vehicles[] = $row;
}

?>

<h2 style="text-align:center;">Add Home Page Item</h2>
<div class="form-group">
    <form id="login" action="create-hp-item.php" method="post">
    <label for="vehicle">Vehicle ID: </label>
    <select style="width: 50%;text-align: center" class="form-control" name="vehicle" id="vehicle">
        <?php
            foreach ($vehicles as $vehicle) { ?>
                <option value="<?php echo $vehicle["vehicle_id"]?>">
                    <?php echo 'V' . sprintf('%07d', $vehicle["vehicle_id"])?>
                </option>
      <?php } ?>
    </select>
    <br><br>
    <center><button type="submit" class="btn btn-success btn-md">Add</button></center>
</form>

</div>
<?php include '../views/footer.php'; ?>