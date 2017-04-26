<?php
session_start();
if(isset($_SESSION['userId']) == false) {
    header('Location: ../views/login.php');
}
  $title = 'Home Page Management';
  include '../views/header.php';
  include '../views/navbar.php';
  include 'adminnav.php';

  require '../scripts/db.php';
  $db = new DB();

  $result = $db->query("
    SELECT * FROM vehicles WHERE homepage_status = 1;
  ");

  $vehicles = [];

  while($row = $result->fetch_assoc()) {
      $vehicles[] = $row;
  }

 ?>
    <style>
        .custab{
            border: 1px solid #ccc;
            padding: 5px;
            margin: auto;
            float: none;
            box-shadow: 3px 3px 2px #ccc;
            transition: 0.5s;
            width: 50%;
        }
        .custab:hover{
            box-shadow: 3px 3px 0px transparent;
            transition: 0.5s;
        }
    </style>
    <form id="addBtn" action="../scripts/add-homepage-vehicle.php" method="post">
        <button class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus"></span> Add Vehicle</button>
    </form>
    <br>
    <div class="container">
        <div style="width:100%;margin:auto;float:none" class="row col-md-6 col-md-offset-2 custyle">
            <table class="table table-striped custab">
                <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <?php foreach ($vehicles as $vehicle) { ?>
                    <tr>
                        <td class="text-center"><?php echo 'V' . sprintf('%07d', $vehicle["vehicle_id"]); ?> </td>
                        <td class="text-center">
                            <form id="modBtn" action="../scripts/delete-hp-vehicle.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $vehicle["vehicle_id"] ?>">
                                <input type="hidden" name="cost" value="<?php echo $vehicle["cost"] ?>">
                                <button class="btn btn-danger btn-md" onclick="return confirm('Confirm home page removal?');"><span class="glyphicon glyphicon-remove"></span> Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php  } ?>
            </table>
        </div>
    </div>

<?php include '../views/footer.php'; ?>