<?php

  $con = mysqli_connect("localhost","root","","ecommerce");

  // Check connection
  if (mysqli_connect_errno()) {
    echo "The connecttion was not extablished: " . mysqli_connect_error();
  }

  // Check connection
  if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
  }

  echo mysqli_error($con);

?>
