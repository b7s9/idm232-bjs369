<?php
  $checkHost = $_SERVER['HTTP_HOST'];
  if($checkHost == 'localhost:8080'){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "idm232";
  }else{
    $dbhost = "localhost";
    $dbuser = "***REMOVED***";
    $dbpass = "***REMOVED***";
    $dbname = "***REMOVED***";
  }
  
  
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  if (mysqli_connect_errno()) {
      die("Database connection failed: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno() . ")"
      );
  }

  mysqli_query($connection, "SET NAMES 'utf8'");

?>