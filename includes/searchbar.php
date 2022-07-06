<div class="row" style="padding-top:20px;">
                <div class="col-xs-12">
                    <form class="form-inline" action="searchResults.php" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="fname" id="fname" placeholder="First name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="lname" id="lname" placeholder="Last name">
                        </div>
                        <div class="form-group">
                             <select class="form-control" name="designation">
                                     <option selected>Designation</option>
                                     <option value="hod">HOD</option>
                                     <option value="professor">Professor</option>
                                     <option value="associate professor">Associate Professor</option>
                                     <option value="assistant professor">Assistant Professor</option>
                             </select>
                        </div>
                        <div class="form-group">
                            <!--  <select class="form-control" name="lid">
                                     <option selected>Departments</option>
                                     <option value="CSE">Computer Science and Engineering</option>
                                     <option value="EE">Electrical Engineering</option>
                                     <option value="CE">Civil Engineering</option>
                                     <option value="FET">Food Engineering and Technology</option>
                             </select> -->
                             <select name="lid" id="lid" class="form-control">
                                                <?php
                                                $queryLo = "SELECT * FROM location";
                                                $resultLo = mysqli_query($con, $queryLo) or die(mysqli_errno($con));
                                                printf("<option selected >Departments</option>");
                                                while ($rowLo = mysqli_fetch_array($resultLo)) {
                                               
                                                printf("<option value=".$rowLo["lid"].">".$rowLo["description"]."</option>");
                                                }
                                                ?>
                                        </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block form-control">Search</button>
                    </form>
                </div>
            </div>