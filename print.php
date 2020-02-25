<?php
session_start();
error_reporting(0);

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
                                        <center><h3 style="color: black; background-color: transparent; border: gray 5px solid; font-size: 20px; width: 1054px; left: -4px; top: -25px; position: absolute; height: 1650px;">APPLICATION FOR LEAVE <br> Polytechnic University of the Philippines <br> Sta. Mesa, Manila</h3></center>
                                        
                                  <p style="color: black; background-color: transparent; border: gray 5px solid; width: 160px; height: 74px; top: -4px; position: absolute; right: -4px; color: black; font-size: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CS Form No. 6 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Revised 1981</p>
                                        <section>
                                            <div class="wizard-content">
                                                <div class="row">
                                                    <div class="col m12">
                                                        <div class="row">
     <?php if($error){?><div class="errorWrap"><strong>ERROR </strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
<br><br>

<div class="input-field col m6 s12">
<?php
include('conn2.php');
$leaveid = $_GET['id'];
    $query=mysqli_query($conn2,"select * from tblleaves l 
                                join tblemployees e 
                                on e.id = l.empid join empcredits c on c.empid = e.id 
                               
                            where l.id = $leaveid");

 $rowl = mysqli_fetch_array($query);
 $emid = $rowl['empid'];
 
?>
</div>
</div>

<div style="color: black; background-color: transparent; border: gray 2px solid; width: 420px; height: 60px; top: 55px; position: absolute; left: -4px; color: black; font-size: 15px;" class="input-field col m6 s12">
<td for="Department">1. Office/Department/College: </td>
<?php echo $rowl['Department']; ?>
</div>

<div style="color: black; background-color: transparent; border: gray 2px solid; width: 633px; height: 60px; top: 55px; position: absolute; left: 415px; color: black; font-size: 20px;" class="input-field col m6 s12">
<td>2. Name:   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 
    <?php echo $rowl['LastName']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php echo $rowl['FirstName']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php echo $rowl['MiddleName']; ?>



</td>
</div>

<div style="color: black; background-color: transparent; border: gray 2px solid; width: 280px; height: 60px; top: 114px; position: absolute; left: -4px; color: black; font-size: 20px;" class="input-field col m6 s12">
<td style="font-size:16px;"><b>3. Date of Filing <br>
<?php echo $rowl['PostingDate']; ?>

</b></td>
                                           <td><?php echo htmlentities($result->PostingDate);?></td>
</div>

<div style="color: black; background-color: transparent; border: gray 2px solid; width: 500px; height: 60px; top: 114px; position: absolute; left: 273px; color: black; font-size: 20px;" class="input-field col m6 s12">
<td style="font-size:16px;"><b>4. Position &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
 <?php echo $rowl['Position']; ?>                                             
</div>   

<div style="color: black; background-color: transparent; border: gray 2px solid; width: 275px; height: 60px; top: 114px; position: absolute; left: 771px; color: black; font-size: 20px;" class="input-field col m6 s12">
<td style="font-size:16px;"><b>5. Salary &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>

<?php  
 $query2=mysqli_query($conn2,"select *  from tblemployees e 
                                join tblsalarygrade s on s.salarygrade = e.salary
                            where e.id = $emid"); $rowl2 = mysqli_fetch_array($query2);?>

                                              <td><?php echo $rowl2['salary'];?></td>
</div>   

<div style="color: black; background-color: transparent; border: transparent; 1px solid; width: 1050px; height: 10px; top: 174px; position: absolute; left: -24px; color: black; font-size: 20px;" class="input-field col m6 s12">
<td style="font-size:16px;"><center><b>6. DETAILS OF APPLICATION</b></center></td>
                                              <td><?php echo htmlentities($result->Salary);?></td>
</div>   

<div style="color: black; background-color: transparent; border: gray 1px solid; width: 525px; height: 600px; top: 208px; position: absolute; left: -4px; color: black; font-size: 20px;" class="input-field col m6 s12">
<td style="font-size:16px;"><b>6.a Type of Leave: <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowl['LeaveType']; 


echo "<pre>";
$startDate = $rowl['FromDate'];
$endDate = $rowl['ToDate'];

$startDatetime = new DateTime("$startDate 00:00:00");

$endDatetime = new DateTime("$endDate 00:00:00");

$datetimeCounter = $startDatetime;
$allDateCounter = 0;
$weekendCounter = 0;
print_r('Inclusive Dates: <br>');
print_r($startDatetime->format('M/d/Y-D') . " to ");
print_r($endDatetime->format('M/d/-D')."</br>");
while($datetimeCounter->format('M/d/Y-D') <= $endDatetime->format('M/d/Y-D')){
    
    $allDateCounter++;
  //  print_r($datetimeCounter->format('m-d-Y-D') . "<br/>");

    if($datetimeCounter->format('w') == 0 || $datetimeCounter->format('w') == 6){
        $weekendCounter++;
    }

    $datetimeCounter->modify('+1 day'); // increment ng date
}

$inclusiveDateCounter = $allDateCounter - $weekendCounter;
print_r('Number of Working Days Applied For: ');
print_r($inclusiveDateCounter);


?></b></td>
                                           
</div>     

<div style="color: black; background-color: transparent; border: gray 2px solid; width: 525px; height: 600px; top: 208px; position: absolute; right: -1px; color: black; font-size: 20px;" class="input-field col m6 s12">
<td style="font-size:16px;"><b>6.b Where Leave will be spent: </b></td>
<?php echo $rowl['PostingDate']; ?>
                                           <td><?php echo htmlentities($result->LeaveType);?></td>
</div> 


<div style="color: black; background-color: transparent; border: gray 2px solid; width: 1050px; height: 30px; top: 805px; position: absolute; left: -4px; color: black; font-size: 20px;" class="input-field col m6 s12">
<td style="font-size:16px;"><center><b>7. DETAILS OF ACTION ON APPLICATION</b></center></td>
                                              <td><?php echo htmlentities($result->Salary);?></td>
</div>  

<div style="color: black; background-color: transparent; border: gray 2px solid; width: 525px; height: 399px; bottom: -964px; position: absolute; left: -4px; color: black; font-size: 20px;" class="input-field col m6 s12">
<td style="font-size:16px;"><b>7.a Certificate of Leave Credits</b><br>
<?php $query3=mysqli_query($conn2,"select NOW() as datetoday  from tblemployees e 
                                join tblsalarygrade s on s.salarygrade = e.salary
                            where e.id = $emid"); $rowl3 = mysqli_fetch_array($query3)?>
<b>as of <?php echo $rowl3['datetoday']; ?></b> <br>
<table style="color: black; border: 1px solid black; width: 100%;"  >
         <tr style="color: black;">
            <td style="border: 1px solid black; width: 100px;"><center>Vacation</center></td>
            <td style="border: 1px solid black; width: 100px;"><center>Sick</center></td>
            <td style="border: 1px solid black; width: 100px;"><center>Total</center></td>
            
        </tr>
        <tr style="color: black;">
            <td style="border: 1px solid black; width: 100px;"><center><?php echo $rowl['sick_credits']; ?><br>Days</center></td>
            <td style="border: 1px solid black; width: 100px;"><center><?php echo $rowl['vacation_credits']; ?><br>Days</center></td>
            <td style="border: 1px solid black; width: 100px;"><center><?php echo ($rowl['vacation_credits'])+($rowl['sick_credits']); ?><br>Days</center></td>
            
        </tr>
    </table><br><br><br><center><b>RUPERTO D. CARPIO</b></center><center>__________________________________</center><center><b>Human Resource Management Officer</b></center></td>
                                           <td><?php echo htmlentities($result->LeaveType);?></td>
</div>     


<div style="color: black; background-color: transparent; border: gray 2px solid; width: 525px; height: 399px; bottom: -964px; position: absolute; right: -1px; color: black; font-size: 20px;" class="input-field col m6 s12">
    <td style="font-size:16px;"><b>7.b Recommendation</b><br>
        <br><form><br><br>
            <input type="checkbox" name="option1" value="Approval"> [&nbsp;&nbsp;] Approval<br>
            <input type="checkbox" name="option2" value="Dispproval">[&nbsp;&nbsp;] Dispproval _______________________________<br>________________________________________<br>
        </form><br><br><br><br>
            <center><b>
            __________________________________</b></center>
            <center><b>Authorized Official</b></center>
    </td>
    <td><?php echo htmlentities($result->LeaveType);?></td>
</div>       

<div style="color: black; background-color: transparent; border: gray 2px solid; width: 1050px; height: 400px; bottom: -1360px; position: absolute; right: -1px; color: black; font-size: 20px;" class="input-field col m6 s12">
<td style="font-size:16px;"><b>7.c Approval for: <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; _________________ Days with pay <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; _________________ Days without pay<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; _________________ Others (Specify) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
_______________________________ </b><br><br><center><b>__________________________________</b></center><center><b>Signature</b></center></b><br><center><b>__________________________________</b></center><center><b>Authorized Official</b></center></td>
                                           <td><?php echo htmlentities($result->LeaveType);?></td>
</div>                                  
 
 <button style="bottom: -620px; right: -444px; visibility: hidden;" type="submit" name="apply" id="apply" class="waves-effect waves-light btn indigo m-b-xs">PRINT</button>
 

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
<?php  ?> 