<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container">
<div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <?php
  function activePageMain ($pageName = '', $currentPage = '') {
        if($pageName == $currentPage) {
          echo 'active';
        }
    }
  if (
    $title == 'Admin Home' ||
    $title == 'Vehicle Management' ||
    $title == 'Deal Management'
  ) {
    ?>
    <a class="navbar-brand" href="../views/home.php">AutoMatic - Dealership Management</a>
    <?php
  } else {
    ?><a class="navbar-brand" href="home.php">AutoMatic - Dealership Management</a><?php
  }?>
</div>
<div id="navbar" class="navbar-collapse collapse">
  <ul class="nav navbar-nav">
    <?php // TODO: Links for development only. Remove for release
    if (
      $title == 'Admin Home' ||
      $title == 'Vehicle Management' ||
      $title == 'Deal Management'
    ) {
      ?>
      <li class=""><a href="../views/home.php">Home</a></li>
      <li class=""><a href="../views/about.php">About</a></li>
      <li><a href="../views/vehicles.php">Vehicle Inventory</a></li>
      <li><a href="../views/contact.php">Contact</a></li>
      <?php
    } else {
      ?>
      <li class="<?php activePageMain('Home', $title) ?>"><a href="home.php">Home</a></li>
      <li class="<?php echo isset($title) && $title == 'About' ? 'active' : '' ?>"><a href="about.php">About</a></li>
      <li class="<?php echo isset($title) && $title == 'Vehicle Inventory' ? 'active' : '' ?>"><a href="vehicles.php">Vehicle Inventory</a></li>
      <li class="<?php echo isset($title) && $title == 'Contact Us' ? 'active' : '' ?>"><a href="contact.php">Contact</a></li>
  <?php  }
    ?>
  </ul>
  <form class="navbar-form navbar-right" role="form">
      <button type="submit" formaction="../admin/index.php"class="btn btn-success">Login</button>
  </form>
</div><!--/.navbar-collapse -->
</div>
</nav>
