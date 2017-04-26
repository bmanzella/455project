<?php
session_start();
if(isset($_SESSION['userId']) == false) {
    header('Location: ../views/login.php');
}
  $title = 'Admin Home';
  include '../views/header.php';
  include '../views/navbar.php';
  include 'adminnav.php';


 ?>

<h1>Welcome, <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?></h1>

<?php include '../views/footer.php'; ?>