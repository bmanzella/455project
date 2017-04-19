<?php
session_start();
if(isset($_SESSION['userId']) == false) {
    header('Location: ../views/login.php');
}
  $title = 'Admin Home';
  include '../views/header.php';
  include '../views/navbar.php';
  include 'adminnav.php';


  include '../views/footer.php';
 ?>
