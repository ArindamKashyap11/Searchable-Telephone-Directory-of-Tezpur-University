<?php
require('includes/common.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HOME| ONLINE TELEPHONE DIRECTORY</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>-->
         <link href="css/style.css" rel="stylesheet"> 
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.min.css">
    
    </head>
    <body style="padding-top: 50px;">
      <div class="container">
        <?php
        include 'includes/header.php';
        include 'includes/searchbar.php'
        ?>
            <div class="row decor_bg">
                <div style="padding-top: 50px;">
                    <table class="table table-striped">
                        <?php
                           // define the list of fields
                            $fields = array('fname', 'lname', 'designation', 'lid');
                            $i=0;
                            $len=count($fields);
                          //  $conditions = array();
                          $query = "SELECT * FROM employee WHERE ";
                          // loop through the defined fields
                          foreach($fields as $field){

                             if($i == $len -1)
                               {
                                if(isset($_POST[$field]) && $_POST[$field] != '') {
                                    // create a new condition while escaping the value inputed by the user (SQL Injection)
                                //    $conditions[] = "`$field` LIKE '%" . mysqli_real_escape_string($con,$_POST[$field]) . "%'";
                                    $query .= "`$field` LIKE '%" . mysqli_real_escape_string($con,$_POST[$field]) . "%'";
                                }
                               }
                               elseif($i==2)
                                 {
                                    if(isset($_POST[$field]) && $_POST[$field] != '') {
                                        // create a new condition while escaping the value inputed by the user (SQL Injection)
                                    //    $conditions[] = "`$field` LIKE '%" . mysqli_real_escape_string($con,$_POST[$field]) . "%'";
                                        $query .= "`$field`  ='" . mysqli_real_escape_string($con,$_POST[$field]) . "' OR ";
                                    }
                                 }
                               else {
                                if(isset($_POST[$field]) && $_POST[$field] != '') {
                                    // create a new condition while escaping the value inputed by the user (SQL Injection)
                                //    $conditions[] = "`$field` LIKE '%" . mysqli_real_escape_string($con,$_POST[$field]) . "%'";
                                    $query .= "`$field` LIKE '%" . mysqli_real_escape_string($con,$_POST[$field]) . "%' OR ";
                                }
                               }
                              // if the field is set and not empty
                             $i++;
                          }

                           // builds the query
                        //  $query = "SELECT * FROM employee";
                          // if there are conditions defined
                         // if(count($conditions) > 0) {
                              // append the conditions
                           //   $query .= " WHERE " . implode (' OR ', $conditions); // we can change it to 'AND' if we need a result combining all the search fields necessarily
                          //}   
                         /*  if (isset($_POST['fname']) && $_POST['fname'] =='')
                               {
                                    $_POST['fname']=" ";
                               }
                          if (isset($_POST['lname']) && $_POST['lname'] =='')
                               {
                                    $_POST['lname']=" ";
                               }
                          if (isset($_POST['designation']) && $_POST['designation'] =='')
                               {
                                    $_POST['designation']=" ";
                               }
                          if (isset($_POST['departments']) && $_POST['departments'] =='')
                               {
                                    $_POST['departments']=" ";
                               }
                          $query ="SELECT * FROM employee WHERE `fname` LIKE '%" . $_POST['fname']. "%' OR `lname` LIKE '%" . $_POST['lname']. "%' OR `designation` LIKE '%" . $_POST['designation']. "%' OR `lid` LIKE '%" . $_POST['lid']. "%'";
                         */ echo $query;
                           $result = mysqli_query($con,$query) or die(mysqli_errno($con));
                        if (mysqli_num_rows($result) >= 1) {
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter =1;
                                while ($row = mysqli_fetch_array($result)) {
                                //query for echoing the official mail and  official phone number and departments corresponding to the employee 
                                $queryOM="SELECT mailid FROM emailid WHERE eid='" . $row['eid'] . "'";
                                $resultOM= mysqli_query($con,$queryOM) or die(mysqli_errno($con));
                                $rowOM = mysqli_fetch_array($resultOM);
                                $queryOP="SELECT phone FROM callerid WHERE eid='" . $row['eid'] . "'";
                                $resultOP= mysqli_query($con,$queryOP) or die(mysqli_errno($con));
                                $rowOP = mysqli_fetch_array($resultOP);
                                $queryD="SELECT description FROM location WHERE lid='" . $row['lid'] . "'";
                                $resultD= mysqli_query($con,$queryD) or die(mysqli_errno($con));
                                $rowD = mysqli_fetch_array($resultD);

                                    printf( "<tr><td>" . "#" . $counter . "</td>
                                    <td>" . $row["fname"] . "</td><td>" . $row["lname"] . "</td><td> " . $row["designation"] . "</td>
                                    <td>" . $rowD["description"] . "</td><td>" . $rowOM["mailid"] . "</td><td>" . $rowOP["phone"] . "</td></tr>");
                                   $counter++;
                                }
                                ?>
                            </tbody>
                            <?php

                        } 
                        else 
                        {
                            printf ("<br>");
                            printf( "\nNO DETAILS FOUND!");
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>

      </div>    
    </body> 
</html>