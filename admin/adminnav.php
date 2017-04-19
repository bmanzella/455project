<br>
<?php
    function activePage ($pageName = '', $currentPage = '') {
        if($pageName == $currentPage) {
            echo 'active';
        }
    }



?>



<div class="tabbable">
    <ul style="padding:5px" class="nav nav-pills">
     <?php    if ($title == 'Register User') { ?>
         <li role="presentation" class="<?php activePage('Admin Home', $title) ?>"><a href="../admin/index.php">Admin Home</a></li>
         <li role="presentation" class="<?php echo isset($title) && $title == 'Vehicle Management' ? 'active' : '' ?>"><a href="../admin/vehiclemgt.php">Vehicle Management</a></li>
         <li role="presentation" class="<?php echo isset($title) && $title == 'Home Page Management' ? 'active' : '' ?>"><a href="../admin/dealmgt.php">Home Page Management</a></li>
         <li role="presentation" class="<?php echo isset($title) && $title == 'Manage Users' ? 'active' : '' ?>"><a href="../admin/usermgt.php">Manage Users</a></li>
         <li disabled="true" role="presentation" class="disabled"><a href="">Statistics</a></li>
   <?php     } else { ?>
         <li role="presentation" class="<?php activePage('Admin Home', $title) ?>"><a href="index.php">Admin Home</a></li>
         <li role="presentation" class="<?php echo isset($title) && $title == 'Vehicle Management' ? 'active' : '' ?>"><a href="vehiclemgt.php">Vehicle Management</a></li>
         <li role="presentation" class="<?php echo isset($title) && $title == 'Home Page Management' ? 'active' : '' ?>"><a href="dealmgt.php">Home Page Management</a></li>
         <li role="presentation" class="<?php echo isset($title) && $title == 'Manage Users' ? 'active' : '' ?>"><a href="usermgt.php">Manage Users</a></li>
         <li disabled="true" role="presentation" class="disabled"><a href="">Statistics</a></li>
  <?php   } ?>

    </ul>
    <hr>
  </div>
    <?php echo '<h1>'.$title.'</h1>'; ?>
<style media="screen">
  h1{
    text-align:center;
  }
</style>
