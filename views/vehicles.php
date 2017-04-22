<?php
  $title = 'Vehicle Inventory';
  include 'header.php';
  include 'navbar.php';

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
    <h1 style="text-align: center;">Vehicle Inventory</h1>
<hr>
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
                    <th class="text-center">Action</th>
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
                            <form action="vehicle.php?id=<?php echo $vehicle["vehicle_id"] ?>" method="post">
                                <input type="hidden" name="id" value="<?php echo $vehicle["vehicle_id"] ?>">
                                <input type="hidden" name="year" value="<?php echo $vehicle["year"] ?>">
                                <input type="hidden" name="make" value="<?php echo $vehicle["make"] ?>">
                                <input type="hidden" name="model" value="<?php echo $vehicle["model"] ?>">
                                <input type="hidden" name="class" value="<?php echo $vehicle["class"] ?>">
                                <input type="hidden" name="color" value="<?php echo $vehicle["color"] ?>">
                                <input type="hidden" name="cost" value="<?php echo '$'.number_format($vehicle["cost"], 2)?>">
                                <input type="hidden" name="status" value="<?php if (!($vehicle["sale_date"])) {
                                    echo 'For Sale';
                                } else {
                                    echo "Sold on $vehicle[sale_date]";
                                } ?>">

                                <button class='btn btn-info btn-md'><span class="glyphicon glyphicon-eye-open"></span> View</button>
                            </form>
                        </td>

                    </tr>
            <?php  } ?>

        </table>
    </div>
</div>
<?php
  include 'footer.php';
 ?>
