<style>
    .navbar-login
    {
        width: 305px;
        padding: 10px;
        padding-bottom: 0px;
    }

    .navbar-login-session
    {
        padding: 10px;
        padding-bottom: 0px;
        padding-top: 0px;
    }

    .icon-size
    {
        font-size: 87px;
    }
</style>
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
    <span class="icon-bar"></span>0
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
    $title == 'Home Page Management' ||
    $title == 'Manage Users'
  ) {
    ?>
    <a class="navbar-brand" href="../views/home.php">AutoMatic</a>
    <?php
  } else {
    ?><a class="navbar-brand" href="home.php">AutoMatic </a><?php
  }?>
</div>
<div id="navbar" class="navbar-collapse collapse">
  <ul class="nav navbar-nav">
    <?php // TODO: Links for development only. Remove for release
    if (
      $title == 'Admin Home' ||
      $title == 'Vehicle Management' ||
      $title == 'Home Page Management' ||
      $title == 'Manage Users'
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
    <?php
        if (isset($_SESSION["userId"]) == false) { ?>
            <form class="navbar-form navbar-right" role="form">
                <button type="submit" formaction="login.php"class="btn btn-success">Login</button>
            </form>
       <?php } else { ?>
            <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="glyphicon glyphicon-user"></span> 
                <strong><?php echo $_SESSION["first_name"] . ' ' .$_SESSION["last_name"] ?></strong>
                <span class="glyphicon glyphicon-chevron-down"></span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <div class="navbar-login">
                        <div class="row">
                            <div class="col-lg-4">
                                <p class="text-center">
                                    <span class="glyphicon glyphicon-user icon-size"></span>
                                </p>
                            </div>
                            <div class="col-lg-8">
                                <p class="text-left"><strong><?php echo $_SESSION["first_name"] . ' ' .$_SESSION["last_name"] ?></strong></p>
                                <p class="text-left">
                                    <a href="../admin/index.php" class="btn btn-primary btn-block btn-sm">Admin Home</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="divider"></li>
                <li>
                    <div class="navbar-login navbar-login-session">
                        <div class="row">
                            <div class="col-lg-12">
                                <p>
                                    <a href="../scripts/logout.php" class="btn btn-danger btn-block">Logout</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
      <?php  }
    ?>



</div><!--/.navbar-collapse -->
</div>
</nav>
