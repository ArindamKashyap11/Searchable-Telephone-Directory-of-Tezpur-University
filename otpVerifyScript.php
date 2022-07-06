<?php
    require("includes/common.php");
    if(isset($_POST['resend']))
       {
       /*  $to=$_SESSION['email'];
        $subject="OTP FOR ONLINE TELEPHONE DIRECTORY";
        $headers  = 'From: luciferallen9@gmail.com' . "\r\n" .
                    'MIME-Version: 1.0' . "\r\n" .
                    'Content-type: text/html; charset=utf-8';
         */
           include 'includes/includeOTP.php';
       }
elseif(isset($_POST['submit']))
  {
   $otpbyuser = $_POST['otpbyuser'];
   if($otpbyuser==$_SESSION['otp'])
      {
        unset($_SESSION['otp']);
        if($_SESSION['userType']=='admin')
        {
            $_SESSION['email'] = $row['adminmail'];
            $_SESSION['user_id'] = $row['adminmail'];
            $_SESSION['set']='set';
            header('location: admin/manage-users.php');
        }
        if($_SESSION['userType']=='user')
        {
            unset($_SESSION['otp']);
            $_SESSION['email'] = $row['adminmail'];
            $_SESSION['user_id'] = $row['adminmail'];
            $_SESSION['set']='set';
            header('location: user/userProfile.php');
        }
      }
    else
      {
        $error='Please enter the valid OTP';
        header('location: otpVerify.php?error=' . $error);
      }
  }
?>