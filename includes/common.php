<?php
/* $con = mysqli_connect("localhost", "root", "", "telephone")or die($mysqli_error($con));
if(!isset($_SESSION))
{
    session_start();
} */
?>

<?php
  $servername="192.168.125.5";
  $username = "teledir";
  $pwd="teledir123";
  $database="telephone";

  ini_set('display_error',1);
  error_reporting(-1);

  /*for create connection*/
  $con= mysqli_connect($servername,$username,$pwd);
  if(!$con)
      {
        die("\nCould not connect".$mysqli->connect_error);
     }

  /*for selecting the database*/
   $DB_selected=mysqli_select_db($con,$database);
  if(!$DB_selected)
    {
     die("\nProblem in database selection");
    }
    session_start(); 
?>