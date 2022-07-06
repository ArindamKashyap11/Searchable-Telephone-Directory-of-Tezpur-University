<?php
//otp generation using rand function
  $otp = rand(145672, 999999);
  $_SESSION['otp']=$otp;
 
  //MAIL SENDING PROCESS STARTS
  /* global $to, $headers;
  $message="Your One time password is:";
  $message.=$otp;
  try{
    $retval = mail($to,$subject,$message,$headers);
  if($retval=="TRUE")
     {
       $msg="OTP has been sent successfully";
      // echo "\nCheck 6";
       header('location: otpVerify.php?error='.$msg);
     }
  else
    {
      $msg="There is a problem with the connection!";
      header('location: otpVerify.php?error='.$msg);
    }
   }
  catch(Exception $e)
  {
    $msg=$e->getMessage();
   // echo "\nCheck 7";
    header('location: otpVerify.php?error='.$msg);
  } */
  $msg="OTP has been sent successfully";
  header('location:otpVerify.php?error='.$msg);

  ?>