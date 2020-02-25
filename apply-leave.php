<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['emplogin'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_POST['apply']))
{
$empid=$_SESSION['eid'];
 $leavetype=$_POST['leavetype'];
$fromdate=$_POST['fromdate'];  
$todate=$_POST['todate'];
$status=0;
$isread=0;
if($fromdate > $todate){
                $error=" ToDate should be greater than FromDate ";
           }
$sql="INSERT INTO tblleaves(LeaveType,FromDate,ToDate,Status,IsRead,empid) VALUES(:leavetype,:fromdate,:todate,:status,:isread,:empid)";

$query = $dbh->prepare($sql);
$query->bindParam(':leavetype',$leavetype,PDO::PARAM_STR);
$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query->bindParam(':todate',$todate,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->bindParam(':empid',$empid,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Leave applied successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}

    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Employee | Apply Leave</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet"> 
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
  <style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
body {
                background-color: white;
                background-size: 1500px;
            }
        </style>
 <script>
    

 </script>

    </head>
    <body>
  <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>
   <main class="mn-inner">
    <img style="height: 300px; width: 300px; right: 30px; position: absolute; bottom: 5px; opacity: 50%;" src="pup.png">   
                <div class="row">
                    <div class="col s12">
                        <div class="page-title"></div>
                    </div>
                    <div class="col s12 m12 l8">
                        <div style="background-color: transparent; border: gray 5px solid;" class="card">
                            <div class="card-content">
                                <form id="example-form" method="post" name="addemp">
                                    <div>
                                        <h3 style="color: black;">Apply For Leave</h3>
                                        <section>
                                            <div class="wizard-content">
                                                <div class="row">
                                                    <div class="col m12">
                                                        <div class="row">
     <?php if($error){?><div class="errorWrap"><strong>ERROR </strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>


 <div style="color: black;" class="input-field col  s12">
    <div style="color: black;">Type of Leave</div>
<select style="color: black;" name="leavetype" autocomplete="off">
<option style="color: black;" value="">Select leave type...</option>
<?php $sql = "SELECT  LeaveType from tblleavetype";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>                                            
<option value="<?php echo htmlentities($result->LeaveType);?>"><?php echo htmlentities($result->LeaveType);?></option>
<?php }} ?>
</select>
</div>

<div style="color: black;" class="input-field col m6 s12">
<label style="margin-top: -30px; color: black;" for="fromdate">From Date</label>
<input placeholder="" id="mask1" name="fromdate" class="validate" type="date" data-inputmask="'alias': 'date'" required> 

</div>
<div style="color: black;" class="input-field col m6 s12">
<label style="margin-top: -30px; color: black;" for="todate">To Date</label>
<input placeholder="" id="mask2" name="todate" class="validate" type="date" data-inputmask="'alias': 'date'" required>
</div>
<!--<div class="col-md">
                      <label for="Shift">Shift Time:</label>
                         <select class="form-control input-sm" name="SHIFTTIME" id="Shift" readonly>
                          <?php if ($SL->SHIFTTIME == 'All Day') {
                          echo '  <option value="All Day" selected>All Day</option>
                                  <option value="AM">AM</option>
                                  <option value="PM">PM</option>
                          ';
                          }elseif ($SL->SHIFTTIME == 'AM') {
                             echo '  <option value="All Day" >All Day</option>
                                  <option value="AM" selected>AM</option>
                                  <option value="PM">PM</option>
                          ';
                          } elseif ($SL->SHIFTTIME == 'PM') {
                           echo '  <option value="All Day" >All Day</option>
                                  <option value="AM">AM</option>
                                  <option value="PM" selected>PM</option>
                          ';
                          }
                           ?>
                       
                                                  
                        </select> 
                       
                      </div> -->
<div class="input-field col m12 s12">   
<div style="color: black;">Where Leave will be spent?</div>
<select  name="gender" autocomplete="off">
<option value="">In case of vacation leave...</option>
<option value="ph">Within the Philippines</option>
<option value="ab">Abroad (Specify)</option>                                          
</select>
<select  name="gender" autocomplete="off">
<option value="">In case of sick leave...</option>
<option value="hosp">In Hospital (Specify)</option>
<option value="outp">Out Patient (Specify)</option>                                          
</select>

<div style="color: black;">Commutation</div>
<select  name="gender" autocomplete="off">
<option value="hosp">Requested</option>
<option value="outp">Not Requested</option>                                          
</select>
</div>
<div style="height:10px;"></div>                    
                        <div class="form-group input-group">
                            <span class="input-group-addon"  >Add image:</span>
                            <input type="file"   class="form-control" name="image">
                        </div>
                        <div style="height:10px;"></div>
</div>
</div>
</div>
</div>
      <button type="submit" name="apply" id="apply" class="waves-effect waves-light btn indigo m-b-xs">Apply</button>                                             

                                                </div>
                                            </div>
                                        </section>
                                     
                                    
                                        </section>
                                    </div>
                                </form>
                            </div>
                        </div>
                            </div>
                            
                    <div class="col s12 m12 l4">
                        <div style="background-color: transparent; border: gray 3px solid; width: 175px; height: 195px; right: 200px; top: 80px; position: absolute;" class="card stats-card">
                            <div class="card-content">
                                <span style="color: black; font-size: 15px;" class="card-title">Available Sick Leave Credits:</span>
                                    <?php
                                    if($query->rowCount() > 0)
    
$sql = "SELECT sick_credits from  empcredits where empid = ".$_SESSION['eid'];
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $result)
{
?>   
<br><span style="color: black;" class="stats-counter"><span class="counter"><?php echo htmlentities($result->sick_credits);?></span></span> 

 <?php } ?>
                      
                            </div>
                    </div>
                </div>
                 <div class="col s12 m12 l4">
                        <div style="background-color: transparent; border: gray 3px solid; width: 175px; height: 195px; right: 20px; top: 80px; position: absolute;" class="card stats-card">
                            <div class="card-content">
                                <span style="color: black; font-size: 15px;" class="card-title">Available Vacation Leave Credits:</span>
                                    <?php
                                    if($query->rowCount() > 0)
    
    
$sql = "SELECT vacation_credits from  empcredits where empid = ".$_SESSION['eid'];
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $result)

{
?>   
<span style="color: black;" class="stats-counter"><span class="counter"><?php echo htmlentities($result->vacation_credits);?></span></span> 
 <?php } ?>
                      
                            </div>
                    </div>
                </div>
            </main>
        </div>
        <div class="left-sidebar-hover"></div>
        
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        <!-- <script src="assets/js/pages/form_elements.js"></script> -->
          <script src="assets/js/pages/form-input-mask.js"></script>
                <script src="assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
        
    </body>
</html>
<?php } ?> 