<?php
$title = '404 Error';
include 'views/header.php';
include 'views/navbar.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Page Not Found</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<br>
<body>
    <div class="row">
     <div class="container">
      <div class="alert alert-warning">
        <div class="row">
          <div class="col-md-2">
            <img src="img/yoda.jpg" style="width:100%">
          </div>
          <div class="col-md-10">
            <h2>Lost a page I have.</h2>
            <br>
            How embarassing. Find it I could not. Make a mistake did you?
          </div>
         </div>
        </div>
      </div>
    </div>

<!-- IE needs 512+ bytes: http://blogs.msdn.com/b/ieinternals/archive/2010/08/19/http-error-pages-in-internet-explorer.aspx -->
<?php include 'views/footer.php'; ?>
