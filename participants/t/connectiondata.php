<?php 
$con = new mysqli("localhost","root","","salle");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }
  ?>