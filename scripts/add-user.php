<?php
// admin/adduser.php
session_start();
if(isset($_SESSION['userId']) == false) {
    header('Location: login.php');
}
$title = 'Register User';

include '../views/header.php';
include '../views/navbar.php';
include '../admin/adminnav.php';
require 'db.php';
$db = new DB();
$formAction = 'register-user.php';

if(isset($_GET['id'])) {
    $userId = $_GET['id'];

    $statement = $db->conn->prepare("SELECT * FROM users WHERE id = ?");
    if (!$statement) die('Prepare failed: ' . $db->conn->error);
    $bind = $statement->bind_param("i", $userId);
    if (!$bind) die('Bind Failed: ' . $db->conn->error);
    $execute = $statement->execute();
    if (!$execute) die('Execute Failed: ' . $db->conn->error);
    $bindResult = $statement->bind_result($userId, $firstName, $lastName, $username, $password);
    if (!$bindResult) die('Bind Result Failed: ' . $db->conn->error);
    $fetch = $statement->fetch();
    $formAction = 'edit-user.php';
}

?>
<form id="login" action="<?php echo $formAction ?>" method="POST">
    <label for="firstName">First Name: </label>
    <input type="text" name="first_name" id="firstName" value="<?php echo $firstName ?>"/>
    <br><br>
    <label for="email">Last Name: </label>
    <input type="text" name="last_name" id="lastName" value="<?php echo $lastName ?>"/>
    <br><br>
    <label for="username">Username: </label>
    <input type="text" name="username" id="username" value="<?php echo $username ?>"/>
    <br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password"/>
    <br><br>
    <input type="hidden" name="id" value="<?php echo $userId ?>">
    <button class="btn btn-primary" id="register-btn" type="submit">Save</button>
</form>

<?php include '../views/footer.php'; ?>