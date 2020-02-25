  <aside style="background-color: #990000;" id="slide-out" class="side-nav fixed">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                           <center> <img src="assets/images/profile-image.png" class="circle" alt=""  style="width: 100px; height: 100px;"></center>
                        </div>
                        <div class="sidebar-profile-info">
                    <?php
$eid=$_SESSION['eid'];
$sql = "SELECT FirstName,LastName,EmpId, id, EmpImage from  tblemployees where id=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
                      <div class="sidebar-profile-image">
                           <center> <img src="Profile/<?php echo htmlentities($result->EmpImage)?>" class="circle" alt=""  style="width: 100px; height: 100px;"></center>
                        </div>
                              <center>  <p style="color: white;"><?php echo htmlentities($result->FirstName." ".$result->LastName);?></p></center>
                             <center><span style="color: white;"><?php echo htmlentities($result->EmpId)?></span></center>
                             <center><span style="color: white;"><?php echo htmlentities($result->id)?></span></center>
                         <?php }} ?>
                        </div>
                    </div>

                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
<li class="no-padding">
                        <a style="color: white;" class="collapsible-header waves-effect waves-grey"><i style="color: white;" class="material-icons">apps</i>Leaves<i style="color: white;" class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="apply-leave.php">Apply Leave</a></li>
                                <li><a href="leavehistory.php">Leave History</a></li>
                            </ul>
                        </div>
                    </li>
  <li class="no-padding"><a style="color: white;" class="waves-effect waves-grey" href="myprofile.php"><i style="color: white;" class="material-icons">account_box</i>My Profiles</a></li>
  <li class="no-padding"><a style="color: white;" class="waves-effect waves-grey" href="emp-changepassword.php"><i style="color: white;" class="material-icons">settings_input_svideo</i>Change Password</a></li>
                    



                  <li class="no-padding">
                                <a style="color: white;" class="waves-effect waves-grey" href="logout.php"><i style="color: white;" class="material-icons">exit_to_app</i>Sign Out</a>
                            </li>


                </ul>
                <div class="footer">
                    <p style="color: white;" class="copyright">Contact Us<br><a href="https://hris.pup.edu.ph/">PUP HRIS </a></p>

                </div>
                </div>
            </aside>
