<?php
// admin/adduser.php
session_start();
if(isset($_SESSION['userId']) == false) {
    header('Location: signin.php');
}

$title = 'Register User';

include '../views/header.php';
include '../views/navbar.php';
include '../admin/adminnav.php';

?>
<form id="login" action="register-user.php" method="POST">
    <label for="firstName">First Name: </label>
    <input type="text" name="first_name" id="firstName"/>
    <br><br>
    <label for="email">Last Name: </label>
    <input type="text" name="last_name" id="lastName"/>
    <br><br>
    <label for="username">Username: </label>
    <input type="text" name="username" id="username"/>
    <br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password"/>
    <br><br>
    <button class="btn btn-primary" id="register-btn">Register</button>
</form>

<?php include '../views/footer.php'; ?>