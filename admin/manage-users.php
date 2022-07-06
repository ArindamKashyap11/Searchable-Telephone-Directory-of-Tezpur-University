<?php

//error_reporting(0);
include('../includes/common.php');
if (!$_SESSION['set']) {
     header('location:../index.php');
 } 
else
{
    if (isset($_GET['uid']) && $_GET['action'] == 'del') {
        $userid = $_GET['uid'];
        $query = mysqli_query($con, "DELETE FROM employee WHERE eid='$userid'");
        $query1 = mysqli_query($con, "DELETE FROM emailid WHERE eid='$userid'");
        $query2 = mysqli_query($con, "DELETE FROM callerid WHERE eid='$userid'");
        header('location:manage-users.php');
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin| Manage Users</title>
        <!-- <link type="text/css" href="include/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="include/bootstrap-responsive.min.css" rel="stylesheet"> -->
        <link type="text/css" href="include/theme.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.min.css">
    </head>

    <body>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <?php include('include/sidebar.php'); ?>
                    <div class="span9">
                        <div class="content">

                            <div class="module">
                                <div class="module-body table">
                                    <!--<table cellpadding="0" cellspacing="0" border="0" class="datatable-2 table table-bordered table-striped	 display" width="100%">-->
                                    <table class="table table-striped">
                                       <?php

                                        $query = "SELECT * FROM employee ";

                                        $result = mysqli_query($con, $query) or die(mysqli_errno($con));
                                        if (mysqli_num_rows($result) > 0) {


                                        ?>
                                            <thead>
                                                <tr>
                                                    <th>SL.NO</th>
                                                    <th>FIRST NAME</th>
                                                    <th>LAST NAME</th>
                                                    <th>DESIGNATION</th>
                                                    <th>DEPARTMENTS</th>
                                                    <th>OFFICIAL EMAIL</th>
                                                    <th>OFFICIAL PHONE</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                while ($row = mysqli_fetch_array($result)) {
                                                    //query for echoing the official mail and  official phone number and departments corresponding to the employee 
                                                    $queryOM = "SELECT mailid FROM emailid WHERE eid='" . $row['eid'] . "'";
                                                    $resultOM = mysqli_query($con, $queryOM) or die(mysqli_errno($con));
                                                    $rowOM = mysqli_fetch_array($resultOM);
                                                    $queryOP = "SELECT phone FROM callerid WHERE eid='" . $row['eid'] . "'";
                                                    $resultOP = mysqli_query($con, $queryOP) or die(mysqli_errno($con));
                                                    $rowOP = mysqli_fetch_array($resultOP);
                                                    $queryD = "SELECT description FROM location WHERE lid='" . $row['lid'] . "'";
                                                    $resultD = mysqli_query($con, $queryD) or die(mysqli_errno($con));
                                                    $rowD = mysqli_fetch_array($resultD);
                                                    // $_SESSION['eeid'] = $row["eid"];
                                                    // //echo $_SESSION['eeid'];
                                                    printf("
                                                    <tr>
                                                    <td>" . "#" . $row["eid"] . "</td>
                                                    <td>" . $row["fname"] . "</td>
                                                    <td>" . $row["lname"] . "</td>
                                                    <td> " . $row["designation"] . "</td>
                                                    <td>" . $rowD["description"] . "</td>
                                                    <td>" . $rowOM["mailid"] . "</td>
                                                    <td>" . $rowOP["phone"] . "</td>
                                                    
                                                        <td>
                                                        <a href='editUsersDummy.php?uid=$row[eid] & fn=$row[fname] & ln=$row[lname] & desig=$row[designation] & des = $rowD[description] & em=$rowOM[mailid] & phn=$rowOP[phone]'>
                                                            <button type='button' class='btn btn-info'>Edit</button></a>

                                                            <a href='manage-users.php?uid=$row[eid] & action=del' title='Delete'>
															<button type='button' class='btn btn-danger'>Delete</button></a>

                                                    </td>
                                                    </tr>");
                                                }
                                                ?>

                                            </tbody>
                                        <?php

                                        } else {
                                            print "<br>";
                                            echo "\nPLEASE ENTER THE DETAILS FIRST!";
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>



                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->

    </body>
<?php } ?>

    </html>

    <!-- <td>

        <a href="edit-users.php?eid=<?php echo htmlentities($row['eid']);
                                    echo htmlentities($row['fname']); ?>&&action=redirect" title="Edit" onClick="return confirm('Do you really want to edit ?')">
            <button type="button" class="btn btn-info">Edit</button></a>
    </td> -->