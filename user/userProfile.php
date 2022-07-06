<?php
//error_reporting(0);
include('../includes/common.php');
if (!$_SESSION['set']) {
    header('location:../index.php');
}
$successmsg='';
$errormsg='';

// echo $_SESSION['eeid'];
?>
<?php
if (isset($_POST['submit'])) {
    $idupdate = $_GET['uid'];
    //echo $idupdate;
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $desig = $_POST['desig'];
    $phone = $_POST['phone'];
    $mailid = $_POST['mailid'];
    $query = mysqli_query($con, "UPDATE employee SET fname = '$fname', lname = '$lname ', designation = '$desig' WHERE eid = '$idupdate'");
    $query1 = mysqli_query($con, "UPDATE emailid SET mailid= '$mailid' WHERE eid='$idupdate'");
    $query2 = mysqli_query($con, "UPDATE callerid SET phone= '$phone' WHERE eid='$idupdate'");
    if ($query) {
        //echo "UPDATE employee SET fname = '$fname', lname = '$lname ', designation = '$desig' WHERE eid = '$eids'";
        $successmsg = "Update Successfully !!";
    } else {
        $errormsg = "Profile not updated !!";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link type="text/css" href="include/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="include/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="include/theme.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
       <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.min.css">
   
 -->
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <?php include("../includes/header.php"); ?>
                <div class="span9">
                    <div class="content">
                        <div class="module">
                            <?php if ($successmsg) { ?>
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b>Well done!</b> <?php printf(htmlentities($successmsg)); ?>
                                </div>
                            <?php } ?>

                            <?php if ($errormsg) { ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b>ERROR!</b> </b> <?php printf(htmlentities($errormsg)); ?>
                                </div>
                            <?php } ?>
                            <div class="module-head">
                                <h3><i class="fa fa-angle-right"></i> Profile info</h3>
                            </div>
                            <?php
                            $query3= mysqli_query($con, "SELECT eid from emailid where mailid= '".$_SESSION['email']."'");
                            $row3 =mysqli_fetch_array($query3);
                            $query4= mysqli_query($con, "SELECT * from employee where eid= '".$row3['eid']."'");
                            $row4 =mysqli_fetch_array($query3);
                            ?>
                            <div class="module-body">
                                <h4 class="mb"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php printf( $row4['fname']); ?>'s Profile</h4>
                                <form class="form-horizontal row-fluid" method="POST" name="profile">
                                    <div class="control-group">
                                        <label class="control-label"><b>First Name</b></label>
                                        <div class="controls">
                                            <input type="text" name="fname" required="required" value="<?php printf( $row4['fname']); ?>" class="span8 tip" disabled>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput"><b>Last Name</b> </label>
                                        <div class="controls">
                                            <input type="text" name="lname" required="required" value="<?php printf( $row4['lname']); ?>" class="span8 tip" disabled>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Department </label>
                                        <div class="controls">
                                                <?php
                                                $queryLo = "SELECT description FROM location where lid=".$row4['lid']."";
                                                $resultLo = mysqli_query($con, $queryLo) or die(mysqli_errno($con));
                                                $rowLo = mysqli_fetch_array($resultLo);
                                                $queryOM="SELECT mailid FROM emailid WHERE email='" . $_SESSION['email'] . "'";
                                $resultOM= mysqli_query($con,$queryOM) or die(mysqli_errno($con));
                                $rowOM = mysqli_fetch_array($resultOM);
                                $queryOP="SELECT phone FROM callerid WHERE eid='" . $row3['eid'] . "'";
                                $resultOP= mysqli_query($con,$queryOP) or die(mysqli_errno($con));
                                $rowOP = mysqli_fetch_array($resultOP);
                                                ?>
                                        <input type="text" name="lname" required="required" value="<?php printf( $rowLo['description']); ?>" class="span8 tip" disabled>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Designation </label>
                                        <div class="controls">
                                        <input type="text" name="lname" required="required" value="<?php printf( $row4['designation']); ?>" class="span8 tip" disabled>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Official Email </label>
                                        <div class="controls">
                                            <input type="text" name="mailid" required="required" value="<?php printf($rowOM['mailid']); ?>" class="span8 tip" disabled>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Official Phone No</label>
                                        <div class="controls">
                                            <input type="text" name="phone" required="required" value="<?php printf($rowOP['phone']); ?>" class="span8 tip" disabled>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Official Phone No</label>
                                        <div class="controls">
                                            <input type="text" name="phone" required="required" value="<?php printf($rowOP['phone']); ?>" class="span8 tip" disabled>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Official Phone No</label>
                                        <div class="controls">
                                            <input type="text" name="phone" required="required" value="<?php printf($rowOP['phone']); ?>" class="span8 tip" disabled>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="submit" class="btn btn-success">Edit Details</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>

<?php //} 
?>