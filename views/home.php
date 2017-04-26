<?php
$title = "Home";
include 'header.php';
include 'navbar.php';

require '../scripts/db.php';
$db = new DB();

$result = $db->query("
    SELECT v.vehicle_id, t.make, t.model, t.class, v.color, v.cost, v.year, s.sale_date, v.homepage_status
          FROM (vehicles v, vehicle_type t)
          LEFT JOIN sales s ON (v.vehicle_id = s.vehicle_id)
          WHERE t.type_id = v.type_id
          AND v.homepage_status = 1
          GROUP BY v.vehicle_id
");
$homePageVehicles = [];

while($row = $result->fetch_assoc()) {
    $homePageVehicles[] = $row;
}

?>


<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
  <div class="container">
    <div class="row">
      <div id="col-centered" class="col-md-6">
        <img src="../img/logo.png" alt="Logo">
      </div>
    </div>
  </div>
</div>

<div class="container">
<!-- Example row of columns -->
<h1>Hottest Deals</h1>
<hr>
<div class="row">
    <?php
      foreach ($homePageVehicles as $vehicle) { ?>
          <div class="col-md-4">
              <h2><?php echo $vehicle["year"] . ' ' . $vehicle["make"] . ' ' . $vehicle["model"] ?></h2>
              <h4>Color: <?php echo $vehicle["color"] ?></h4>
              <h4>Class: <?php echo $vehicle["class"] ?></h4>
              <h4>Cost: <?php echo '$'.number_format($vehicle["cost"], 2) ?></h4>
              <form action="vehicle.php?id=<?php echo $vehicle["vehicle_id"] ?>" method="post">
                  <input type="hidden" name="id" value="<?php echo $vehicle["vehicle_id"] ?>">
                  <input type="hidden" name="year" value="<?php echo $vehicle["year"] ?>">
                  <input type="hidden" name="make" value="<?php echo $vehicle["make"] ?>">
                  <input type="hidden" name="model" value="<?php echo $vehicle["model"] ?>">
                  <input type="hidden" name="class" value="<?php echo $vehicle["class"] ?>">
                  <input type="hidden" name="color" value="<?php echo $vehicle["color"] ?>">
                  <input type="hidden" name="cost" value="<?php echo '$'.number_format($vehicle["cost"], 2) ?>">
                  <input type="hidden" name="status" value="<?php if (!($vehicle["sale_date"])) {
                      echo 'For Sale';
                  } else {
                      echo "Sold on $vehicle[sale_date]";
                  } ?>">
                  <button class="btn btn-default" role="button">View details &raquo;</button>
              </form>
          </div>
      <?php }

      if (mysqli_num_rows($result) == false) {
          echo '<center><h1>No Hot Deals</h1></center>';
          echo '<center><h3>Check back later for new Arrivals!</h3></center>';
      }
    ?>
</div>

<?php include 'footer.php'; ?>
