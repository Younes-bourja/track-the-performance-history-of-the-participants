<?php $con = new mysqli("localhost","root","","ec");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }
  ?>