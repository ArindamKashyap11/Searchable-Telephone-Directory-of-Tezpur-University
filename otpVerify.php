<?php
require("includes/common.php");
if (isset($_SESSION['email']) && isset($_SESSION['set']) ) {

    if($_SESSION['userType']=='admin')
       {header('location: admin/manage-users.php');}
   if($_SESSION['userType']=='user')
       {header('location: userProfile.php');}
}

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ENTER OTP|ONLINE TELEPHONE DIRECTORY </title>

        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script> -->
        <link href="css/style.css" rel="stylesheet"> 
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.min.css">
    
    </head>

    <body>
        <?php include 'includes/header.php'; 
        printf('<div id="content">');
            printf("<i>OTP is ".$_SESSION['otp']);
            ?>
            <div class="container-fluid decor_bg" id="login-panel">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h4>ENTER OTP</h4>
                                <?php printf("OTP is sent to ".$_SESSION['email']); ?>
                            </div>
                            <div class="panel-body">
                            <p class="text-warning"><i>Check your email for the OTP</i><p>
                                <form action="otpVerifyScript.php" method="POST">
                                <div class="form-group">
                                        <input type="text" class="form-control"  placeholder="ENTER THE OTP" name="otpbyuser">
                                 </div>
                                    <button type="submit" name="resend" class="btn btn-primary">Resend OTP</button>
                                    <button type="submit" name="submit" class="btn btn-primary">VERIFY OTP</button><br><br>
                                    <?php printf( $_GET['error']); ?>
                                </form><br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
