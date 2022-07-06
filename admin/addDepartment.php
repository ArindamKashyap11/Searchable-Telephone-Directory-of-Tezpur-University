<?php
require('../includes/common.php');
if (!$_SESSION['set']) {
    header('location:../index.php');
}
$msg =' ';
if (isset($_POST['submit'])) {
    $dname = $_POST['dname'];
    $ddes = $_POST['ddes'];
    $query3 = "INSERT INTO location(lid,description) VALUES('" . $dname . "','" . $ddes . "')";
    $result2 = mysqli_query($con, $query3) or die(mysqli_errno($con));
    $msg = "Added successfully.";
}
?>
<!DOCTYPE html>

<head>
    <title>Admin| Add Department</title>
     <link type="text/css" href="include/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="include/bootstrap-responsive.min.css" rel="stylesheet">

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
                            <div class="module-body">

                                <?php if ($msg) {
                                    printf(htmlentities($msg));
                                } ?>

                                <br />

                                <form class="form-horizontal row-fluid" method="post">

                                    <div class="control-group">
                                        <label class="control-label"><b>Department Code</b> </label>
                                        <div class="controls">
                                            <input type="text" placeholder="Enter Department code" name="dname" class="span8 tip" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label"><b>Department name</b> </label>
                                        <div class="controls">
                                            <input type="text" placeholder="Enter Department Name" name="ddes" class="span8 tip" required>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</body>

</html>