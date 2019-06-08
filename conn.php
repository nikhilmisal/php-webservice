<?php
  $username = "username";
  $password = "password";
  $hostname = "localhost";
  $database = "dbname";
  
  //connection to the database
  $dbhandle = mysqli_connect($hostname, $username, $password, $database) 
  or die("Unable to connect to MySQL Database"); 
?>
