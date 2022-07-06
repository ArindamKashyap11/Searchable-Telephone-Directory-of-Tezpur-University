<?php
require("includes/common.php");
// Redirects the user to products page if logged in.
if (isset($_SESSION['email'])) {

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

        <title>Login|ONLINE TELEPHONE DIRECTORY </title>

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
        <?php include 'includes/header.php'; ?>
        <div id="content">
            <div class="container-fluid decor_bg" id="login-panel">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h4>LOGIN</h4>
                            </div>
                            <div class="panel-body">
                                <form action="login_submit.php" method="POST">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="login" id="Admin" value="admin">
                                    <label class="form-check-label" for="admin">ADMIN</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="login" id="user" value="user" checked>
                                    <label class="form-check-label" for="user">USER</label>
                                </div>
                                <div class="form-group">
                                        <input type="email" class="form-control"  placeholder="Email" name="e-mail" required = "true">
                                 </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Login</button><br><br>
                                    <?php printf($_GET['error']) ; ?>
                                </form><br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
