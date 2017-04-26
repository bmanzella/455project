<?php
session_start();
if(isset($_SESSION['userId']) == false) {
    header('Location: ../views/login.php');
}
  $title = 'Vehicle Management';
  include '../views/header.php';
  include '../views/navbar.php';
  include 'adminnav.php';
  require '../scripts/db.php';
  $db = new DB();

$result = $db->query(
    "SELECT v.vehicle_id, t.make, t.model, t.class, v.color, v.cost, v.year, s.sale_date
          FROM (vehicles v, vehicle_type t)
          LEFT JOIN sales s ON (v.vehicle_id = s.vehicle_id)
          WHERE t.type_id = v.type_id 
          GROUP BY v.vehicle_id"
);

$vehicles = [];
$status = [];
while($row = $result->fetch_assoc()) {
    $vehicles[] = $row;
}
?>
  <style>
    .custab{
      border: 1px solid #ccc;
      padding: 5px;
      margin: 5% 0;
      box-shadow: 3px 3px 2px #ccc;
      transition: 0.5s;
    }
    .custab:hover{
      box-shadow: 3px 3px 0px transparent;
      transition: 0.5s;
    }
  </style>
  <form id="addBtn" action="../scripts/add-vehicle.php" method="post">
    <button class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus"></span> Add Vehicle</button>
  </form>
  <div class="container">
    <div style="width:100%;margin:auto;float:none" class="row col-md-6 col-md-offset-2 custyle">
      <table class="table table-striped custab">
        <thead>
        <tr>
          <th>ID</th>
          <th>Model Year</th>
          <th>Make</th>
          <th>Model</th>
          <th>Class</th>
          <th>Color</th>
          <th>Cost</th>
          <th>Status</th>
          <th class="text-center">Actions</th>
        </tr>
        </thead>
          <?php foreach ($vehicles as $vehicle) { ?>
            <tr>
              <td><?php echo 'V' . sprintf('%07d', $vehicle["vehicle_id"]) ?></td>
              <td><?php echo $vehicle["year"] ?></td>
              <td><?php echo $vehicle["make"] ?></td>
              <td><?php echo $vehicle["model"]?></td>
              <td><?php echo $vehicle["class"]?></td>
              <td><?php echo $vehicle["color"]?></td>
              <td><?php echo '$'.number_format($vehicle["cost"], 2)?></td>
              <td><?php if (!($vehicle["sale_date"])) {
                      echo 'For Sale';
                  } else {
                      echo "Sold on $vehicle[sale_date]";
                  } ?></td>
              <td class="text-center">
                  <form id="modBtn" action="../scripts/update-vehicle.php?id=<?php echo $vehicle["vehicle_id"] ?>" method="post">
                  <input type="hidden" name="id" value="<?php echo $vehicle["vehicle_id"] ?>">
                  <button class='btn btn-info btn-md'><span class="glyphicon glyphicon-edit"></span> Edit</button>
                </form>
                <form id="modBtn" action="../scripts/delete-vehicle.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $vehicle["vehicle_id"] ?>">
                  <input type="hidden" name="cost" value="<?php echo $vehicle["cost"] ?>">
                  <button class="btn btn-danger btn-md" onclick="return confirm('Confirm vehicle deletion?');"><span class="glyphicon glyphicon-remove"></span> Delete</button>
                </form>
              </td>
            </tr>
          <?php  } ?>

      </table>
    </div>
  </div>

<?php include '../views/footer.php'; ?>