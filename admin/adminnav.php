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
      <li role="presentation" class="<?php activePage('Admin Home', $title) ?>"><a href="index.php">Admin Home</a></li>
      <li role="presentation" class="<?php echo isset($title) && $title == 'Vehicle Management' ? 'active' : '' ?>"><a href="vehiclemgt.php">Vehicle Management</a></li>
      <li role="presentation" class="<?php echo isset($title) && $title == 'Home Page Management' ? 'active' : '' ?>"><a href="dealmgt.php">Home Page Management</a></li>
      <li class="disabled" role="presentation" class="<?php echo isset($title) && $title == 'Statistics' ? 'active' : '' ?>"><a href="statistics.php">Statistics</a></li>
    </ul>
    <hr>
  </div>
    <?php echo '<h1>'.$title.'</h1>'; ?>
<style media="screen">
  h1{
    text-align:center;
  }
</style>
