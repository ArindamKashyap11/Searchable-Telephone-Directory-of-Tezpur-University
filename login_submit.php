<?php

require("includes/common.php");

$email = $_POST['e-mail'];
$email = mysqli_real_escape_string($con, $email);
$login = $_POST['login'];

/* //variables for mail sending
$to=$email;
$subject="OTP FOR ONLINE TELEPHONE DIRECTORY";
$headers  = 'From: luciferallen9@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=utf-8'; */

if($login=="admin")
{
    $query = "SELECT adminmail FROM admin WHERE adminmail='" . $_POST['e-mail']. "'";
    $result = mysqli_query($con, $query)or die($mysqli_error($con));
    $num = mysqli_num_rows($result);

 // If the email and password are not present in the database, the mysqli_num_rows returns 0, it is assigned to $num.
  if ($num == 0) {
  $error = "<span class='red'>Please enter correct E-mail id</span>";
  header('location: login.php?error=' . $error);
      } 
  else {  
  //  echo "\nCheck 3";
  $row = mysqli_fetch_array($result);                    
  $_SESSION['userType']= "admin";
  $_SESSION['email']=$_POST['e-mail'];
  include 'includes/includeOTP.php';
 }
}
else
  {
    $query = "SELECT mailid FROM emailid WHERE mailid='" . $_POST['e-mail'] . "'";
    $result = mysqli_query($con, $query)or die($mysqli_error($con));
    $num = mysqli_num_rows($result);
      // If the email and password are not present in the database, the mysqli_num_rows returns 0, it is assigned to $num.
if ($num == 0) {
  $error = "<span class='red'>Please enter correct E-mail id </span>";
  header('location: login.php?error=' . $error);
} else {  
  $row = mysqli_fetch_array($result);                    
  $_SESSION['userType']= "user";
  $_SESSION['email']=$_POST['e-mail'];
  include 'includes/includeOTP.php';
  }
}

?>