<?php

session_start();
if(isset($_SESSION['userId']) == false) {
    header('Location: ../views/login.php');
}

$title = 'Manage Users';
include '../views/header.php';
include '../views/navbar.php';
include 'adminnav.php';

require '../scripts/db.php';
$db = new DB();

$result = $db->query("SELECT * FROM users");

// Set up an empty array
$users = [];

while($row = $result->fetch_assoc()) {
    $users[] = $row;
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
    <form id="addBtn" action="../scripts/add-user.php" method="post">
        <button class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus"></span> Add User</button>
    </form>
    <div class="container">
        <div style="width:100%;margin:auto;float:none;" class="row col-md-6 col-md-offset-2 custyle">
            <table class="table table-striped custab">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <?php foreach ($users as $user) { ?>
                <tr>
                    <td><?php echo $user["id"] ?></td>
                    <td><?php echo $user["first_name"] .' '.$user["last_name"]; ?></td>
                    <td><?php echo $user["username"];?></td>
                    <td class="text-center">
                        <form id="modBtn" action="../scripts/add-user.php?id=<?php echo $user["id"] ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $user["id"] ?>">
                            <button class='btn btn-info btn-md' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                        </form>
                        <form id="modBtn" action="../scripts/delete-user.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $user["id"] ?>">
                            <button class="btn btn-danger btn-md" onclick="return confirm('Confirm user deletion?');"><span class="glyphicon glyphicon-remove"></span> Delete</button>
                        </form>
                    </td>
                </tr>
         <?php  } ?>

            </table>
        </div>
    </div>

<?php

include '../views/footer.php';