<?php
  $title = "Change Log";
  include 'header.php';
  include 'navbar.php';

  $file = file_get_contents('https://api.github.com/repos/bmanzella/455project/commits');
  $json_a = json_decode($file, true);

  foreach ($json_a as $commit => $commit_a) {
    echo $commit_a['commit'];
  }
  include 'footer.php';
 ?>
