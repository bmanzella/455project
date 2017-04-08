<?php
// admin/adduser.php
session_start();
if(isset($_SESSION['userId']) == false) {
    header('Location: ../views/login.php');
}

$title = 'Register User';

include '../views/header.php';
include '../views/navbar.php';
include 'adminnav.php';

?>
<form id="signup" action="../scripts/register-user.php" method="POST">
    <label for="firstName">First Name: :</label>
    <input type="text" name="first_name" id="firstName"/>
    <br>
    <label for="email">Last Name: </label>
    <input type="text" name="last_name" id="lastName"/>
    <br>
    <label for="username">Username: </label>
    <input type="text" name="username" id="username"/>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password"/>
    <br>
    <button id="register">Register</button>
</form>

<?php include '../views/footer.php'; ?>