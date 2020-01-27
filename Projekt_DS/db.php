<?php
//host, username, password, database
$con = mysqli_connect("localhost","root","","register");
if (mysqli_connect_errno())
  {
  echo "Logowanie błędne: " . mysqli_connect_error();
  }
?>
