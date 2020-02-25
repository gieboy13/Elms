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
$sql="INSERT INTO tblleaves(LeaveType,ToDate,FromDate,Status,IsRead,empid) VALUES(:leavetype,:fromdate,:todate,:status,:isread,:empid)";
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
        <link href="assets/bootstrap-datepicker-1.9.0-dist/css/bootstrap-datepicker.css">
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


   <main class="mn-inner"> 
                <div class="row">
                    <div class="col s12">
                        <div class="page-title"></div>
                    </div>
                    <div class="col s12 m12 l8">
                        <div style="background-color: transparent; border: gray 5px solid; width: 1055px;" class="card">
                            <div class="card-content">
                                <form id="example-form" method="post" name="addemp">
                                    <div>
                                        <center><h3 style="color: black; background-color: transparent; border: gray 5px solid; font-size: 20px; width: 1054px; left: -4px; top: -25px; position: absolute;">APPLICATION FOR LEAVE <br> Polytechnic University of the Philippines <br> Sta. Mesa, Manila</h3></center>
                                        
                                  <p style="color: black; background-color: transparent; border: gray 5px solid; width: 160px; height: 74px; top: -4px; position: absolute; right: -4px; color: black; font-size: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CS Form No. 6 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Revised 1981</p>
                                        <section>
                                            <div class="wizard-content">
                                                <div class="row">
                                                    <div class="col m12">
                                                        <div class="row">
     <?php if($error){?><div class="errorWrap"><strong>ERROR </strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
<br><br>
<div style="color: black; background-color: transparent; border: gray 2px solid; width: 280px; height: 60px; top: 55px; position: absolute; left: -4px; color: black; font-size: 20px;" class="input-field col m6 s12">
<label for="Department">1. Office/Department/College</label>
<div class="input-field col m6 s12">
<select  name="department" autocomplete="off">
<option value="<?php echo htmlentities($result->Department);?>"><?php echo htmlentities($result->Department);?></option>
<?php $sql = "SELECT DepartmentName from tbldepartments";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $resultt)
{   ?>                                            
<option value="<?php echo htmlentities($resultt->DepartmentName);?>"><?php echo htmlentities($resultt->DepartmentName);?></option>
<?php }} ?>
</select>
</div>
</div>

<div style="color: black; background-color: transparent; border: gray 2px solid; width: 773px; height: 60px; top: 55px; position: absolute; left: 273px; color: black; font-size: 20px;" class="input-field col m6 s12">
<td><a > 2. Name  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Melody Acdog
                                                <?php echo htmlentities($result->FirstName." ".$result->LastName);?></a></td>
</div>

<div style="color: black; background-color: transparent; border: gray 2px solid; width: 280px; height: 55px; top: 114px; position: absolute; left: -4px; color: black; font-size: 20px;" class="input-field col m6 s12">
<td style="font-size:16px;"><b>3. Date of Filing <br>October 4, 2019</b></td>
                                           <td><?php echo htmlentities($result->PostingDate);?></td>
</div>

<div style="color: black; background-color: transparent; border: gray 2px solid; width: 500px; height: 55px; top: 114px; position: absolute; left: 273px; color: black; font-size: 20px;" class="input-field col m6 s12">
<td style="font-size:16px;"><b>4. Position &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supervisor</b></td>
                                              <td><?php echo htmlentities($result->Position);?></td>
</div>   

<div style="color: black; background-color: transparent; border: gray 2px solid; width: 275px; height: 55px; top: 114px; position: absolute; left: 771px; color: black; font-size: 20px;" class="input-field col m6 s12">
<td style="font-size:16px;"><b>5. Salary &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Php25,000.00</b></td>
                                              <td><?php echo htmlentities($result->Salary);?></td>
</div>   

<div style="color: black; background-color: transparent; border: gray 1px solid; width: 1050px; height: 30px; top: 166px; position: absolute; left: -4px; color: black; font-size: 20px;" class="input-field col m6 s12">
<td style="font-size:16px;"><center><b>6. DETAILS OF APPLICATION</b></center></td>
                                              <td><?php echo htmlentities($result->Salary);?></td>
</div>   

<div style="color: black; background-color: transparent; border: gray 1px solid; width: 525px; height: 100px; top: 191px; position: absolute; left: -4px; color: black; font-size: 20px;" class="input-field col m6 s12">
<td style="font-size:16px;"><b>6.a Type of Leave: <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sick Leave</b></td>
                                           <td><?php echo htmlentities($result->LeaveType);?></td>
</div>     

<div style="color: black; background-color: transparent; border: gray 2px solid; width: 525px; height: 100px; top: 193px; position: absolute; right: -1px; color: black; font-size: 20px;" class="input-field col m6 s12">
<td style="font-size:16px;"><b>6.b Where Leave will be spent: Outpatient</b></td>
                                           <td><?php echo htmlentities($result->LeaveType);?></td>
</div> 

<div style="color: black; background-color: transparent; border: gray 2px solid; width: 1050px; height: 30px; top: 290px; position: absolute; left: -4px; color: black; font-size: 20px;" class="input-field col m6 s12">
<td style="font-size:16px;"><center><b>7. DETAILS OF ACTION ON APPLICATION</b></center></td>
                                              <td><?php echo htmlentities($result->Salary);?></td>
</div>  

<div style="color: black; background-color: transparent; border: gray 2px solid; width: 525px; height: 200px; bottom: -264px; position: absolute; left: -4px; color: black; font-size: 20px;" class="input-field col m6 s12">
<td style="font-size:16px;"><b>7.a Certificate of Leave Credits</b><br>
<b>as of </b> <br><br><center><b>RUPERTO D. CARPIO</b></center><center>__________________________________</center><center><b>Human Resource Management Officer</b></center></td>
                                           <td><?php echo htmlentities($result->LeaveType);?></td>
</div>     


<div style="color: black; background-color: transparent; border: gray 2px solid; width: 525px; height: 200px; bottom: -264px; position: absolute; right: -1px; color: black; font-size: 20px;" class="input-field col m6 s12">
    <td style="font-size:16px;"><b>7.b Recommendation</b><br>
        <br><form>
            <input type="checkbox" name="option1" value="Approval"> [&nbsp;&nbsp;] Approval<br>
            <input type="checkbox" name="option2" value="Dispproval">[&nbsp;&nbsp;] Dispproval<br>
        </form>
            <center><b>
            __________________________________</b></center>
            <center><b>Authorized Official</b></center>
    </td>
    <td><?php echo htmlentities($result->LeaveType);?></td>
</div>       

<div style="color: black; background-color: transparent; border: gray 2px solid; width: 1050px; height: 200px; bottom: -460px; position: absolute; right: -1px; color: black; font-size: 20px;" class="input-field col m6 s12">
<td style="font-size:16px;"><b>7.c Approval for: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 7.d Disapproval for: <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_______________________________<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_______________________________ </b><br><br><center><b>__________________________________</b></center><center><b>Authorized Official</b></center></td>
                                           <td><?php echo htmlentities($result->LeaveType);?></td>
</div>                                  
 
 <button style="bottom: -620px; right: -444px;" type="submit" name="apply" id="apply" class="waves-effect waves-light btn indigo m-b-xs">PRINT</button>
 

</div>
</div>
</div>
                                                  

                                                </div>
                                            </div>
                                        </section>
                                     
                                    
                                        </section>
                                    </div>
                                </form>
                            </div>
                        </div>
                            </div>
                            
                  
            </main>
        </div>
        
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        <!-- <script src="assets/js/pages/form_elements.js"></script> -->
          <script src="assets/js/pages/form-input-mask.js"></script>
                <script src="assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
                <script src="assets/bootstrap-datepicker-1.9.0-dist/js/bootstrap-datepicker.js"></script>
    </body>
</html>
<?php } ?> 