<?php
$title = 'Login';
include 'header.php';
include 'navbar.php';
require '../scripts/db.php';
$db = new DB();
// views/login.php
?>

<div class="page-header">
    <h1>Sign In</h1>
</div>
    <form id="login" action="../scripts/check-login.php" method="post">
        <label for="username">Username: </label>
        <input type="text" id="username" name="username">
        <br><br>
        <label for="password">Password: </label>
        <input type="password" id="password" name="password">
        <br><br>
        <center><button id="loginBtn" class="btn btn-success">Sign In</button></center>
    </form>
<?php include 'footer.php'; ?>