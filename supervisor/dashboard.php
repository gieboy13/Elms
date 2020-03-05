<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin | Dashboard</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
        <link href="../assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet">
        <link href="../assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet">

        	
        <!-- Theme Styles -->
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/chart.css" rel="stylesheet" type="text/css"/>
        
    </head>
    <body>
        <style>
            body {
                background-color: white;
                                background-size: 1500px;
            }
        </style>
           <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>

            <main  class="mn-inner">
                <h1 style="font-size: 30px; margin-bottom: -10px; margin-top: -2px;">Admin | Dashboard</h1>
               
                <div style="margin-top: 2%;">
                      
                    <div class="row">
                        <div class="col s12 m12">
                            <div class="row">
                                <div class="col s3 m3 ">
                                    <div style="background-color: transparent; border: gray 3px solid;" class="card stats-card">
                            <div class="card-content">
                            
                                <span style="color: black; font-size: 15px;" class="card-title">Total No. of Approved Leaves</span>
                                <span style="color: black;" class="stats-counter">
<?php
$sql = "SELECT count(empid) leave_count from tblleaves where Status = 1";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$appcount=$results[0]->leave_count;
?>

                                    <span class="counter"><?php echo htmlentities($appcount);?></span></span>
                                    <br><br><a href="approvedleave-history.php?leaveid=<?php echo htmlentities($result->lid);?>" class="waves-effect waves-light btn blue m-b-xs"  > View Details</a>
                            </div>
                            <div class="progress stats-card-progress">
                                <div class="determinate" style="width: 70%"></div>
                            </div>
                            <div id="sparkline-bar"></div>
                        </div>
                                </div>
                                <div class="col s3 m3 ">
                                    <div style="background-color: transparent; border: gray 3px solid;" class="card stats-card">
                            <div class="card-content">
                            
                                <span style="color: black; font-size: 15px;" class="card-title">Total No. of Approved Leaves</span>
                                <span style="color: black;" class="stats-counter">
<?php
$sql = "SELECT count(empid) leave_count from tblleaves where Status = 1";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$appcount=$results[0]->leave_count;
?>

                                    <span class="counter"><?php echo htmlentities($appcount);?></span></span>
                                    <br><br><a href="approvedleave-history.php?leaveid=<?php echo htmlentities($result->lid);?>" class="waves-effect waves-light btn blue m-b-xs"  > View Details</a>
                            </div>
                            <div class="progress stats-card-progress">
                                <div class="determinate" style="width: 70%"></div>
                            </div>
                            <div id="sparkline-bar"></div>
                        </div>
                                </div>
                                <div class="col s3 m3 ">
                                    <div style="background-color: transparent; border: gray 3px solid;" class="card stats-card">
                            <div class="card-content">
                            
                                <span style="color: black; font-size: 15px;" class="card-title">Total No. of Approved Leaves</span>
                                <span style="color: black;" class="stats-counter">
<?php
$sql = "SELECT count(empid) leave_count from tblleaves where Status = 1";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$appcount=$results[0]->leave_count;
?>

                                    <span class="counter"><?php echo htmlentities($appcount);?></span></span>
                                    <br><br><a href="approvedleave-history.php?leaveid=<?php echo htmlentities($result->lid);?>" class="waves-effect waves-light btn blue m-b-xs"  > View Details</a>
                            </div>
                            <div class="progress stats-card-progress">
                                <div class="determinate" style="width: 70%"></div>
                            </div>
                            <div id="sparkline-bar"></div>
                        </div>
                                </div>
                                <div class="col s3 m3 ">
                                    <div style="background-color: transparent; border: gray 3px solid;" class="card stats-card">
                            <div class="card-content">
                            
                                <span style="color: black; font-size: 15px;" class="card-title">Total No. of Approved Leaves</span>
                                <span style="color: black;" class="stats-counter">
<?php
$sql = "SELECT count(empid) leave_count from tblleaves where Status = 1";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$appcount=$results[0]->leave_count;
?>

                                    <span class="counter"><?php echo htmlentities($appcount);?></span></span>
                                    <br><br><a href="approvedleave-history.php?leaveid=<?php echo htmlentities($result->lid);?>" class="waves-effect waves-light btn blue m-b-xs"  > View Details</a>
                            </div>
                            <div class="progress stats-card-progress">
                                <div class="determinate" style="width: 70%"></div>
                            </div>
                            <div id="sparkline-bar"></div>
                        </div>
                                </div>

                            </div><!--row-->

                            <div class="row">
                                <div class="col s6 m6">
                                    <div style="background-color: transparent; border: gray 3px solid; height:230px;" class="card stats-card">
                            <div class="card-content">
                                <span style="color: black; font-size: 15px;" class="card-title">TOP 5 EMPLOYEE WITH MOST NUMBER OF APPLIED LEAVES</span>
                                    <?php
                                    if($query->rowCount() > 0)
                                    {
   
                                        $sql1 = "SELECT l.empid, concat (e.FirstName, ' ', e.LastName) as NAME, COUNT(l.empid) as t
                                        FROM tblleaves as l LEFT JOIN tblemployees as e ON l.empid = e.id
                                        WHERE month(todate) = month(now())
                                        GROUP BY l.empid
                                        ORDER BY COUNT(l.empid) desc
                                        LIMIT 5";
                                        $query2 = $dbh -> prepare($sql1);
                                        $query2->execute();
                                        $results=$query2->fetchAll(PDO::FETCH_OBJ);
                                        // print_r($results);
                                        // $mostapp=$results[0]->l;
                                        foreach($results as $result)
                                        {
                                            
                                                print_r($result->t . " Leave/s - " .  $result->NAME."<br>");
                                        }

                                        if($query2->rowCount() == 0)
                                        {
                                            echo "<p style='margin-top:12%; margin-left: 30%;'>No candidates for this month!</p>";
                                        }
                                            
                                    }
                                 

    
?>   

                      
                            </div>
                    </div>

                                </div>
                                <div class="col s6 m6">
                                    <div style="background-color: transparent; border: gray 3px solid; height:230px;" class="card stats-card">
                            <div class="card-content">
                                <span style="color: black; font-size: 15px;" class="card-title">TOP 5 DEPARTMENT WITH MOST NUMBER OF APPLIED LEAVES</span>
                                    <?php
                                    
    
$sql = "SELECT e.Department as DEPARTMENT, COUNT(l.empid) as t
FROM tblleaves as l LEFT JOIN tblemployees as e ON l.empid = e.id
WHERE month(todate) = month(now())
GROUP BY e.Department
ORDER BY COUNT(e.Department) desc
LIMIT 5";
$query3 = $dbh -> prepare($sql);
$query3->execute();
$results=$query3->fetchAll(PDO::FETCH_OBJ);
// print_r($results);
// $mostapp=$results[0]->l;
foreach($results as $result2)
{
        
    print_r($result->t . " Leave/s - " .  $result->NAME."<br>");
}

if($query3->rowCount() == 0)
{
    echo "<p style='margin-top:12%; margin-left: 30%;'>No candidates for this month!</p>";
}
    
        ?>              
                            </div>
                    </div>

                                </div>
                            </div><!--row-->
                            <div class="row">
                                <div style="background-color: transparent; border: gray 5px solid;" class="card invoices-card">
                                <div class="card-content">
                                 
                                    <span style="color: black; font-size: 15px;" class="card-title">Latest Leave Applications</span>
                             <table id="example" class="display responsive-table ">
                                    <thead>
                                        <tr style="color: black;">
                                            <th>#</th>
                                            <th width="200">Employee Name</th>
                                            <th width="120">Leave Type</th>

                                             <th width="180">Posting Date</th>                 
                                            <th>Status</th>
                                            <th align="center">Action</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
<?php $sql = "SELECT tblleaves.id as lid,tblemployees.FirstName,tblemployees.LastName,tblemployees.EmpId,tblemployees.id,tblleaves.LeaveType,tblleaves.PostingDate,tblleaves.Status from tblleaves join tblemployees on tblleaves.empid=tblemployees.id order by lid desc limit 10";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{         
      ?>  

                                        <tr>
                                            <td style="color: black;"> <b><?php echo htmlentities($cnt);?></b></td>
                                              <td><a href="editemployee.php?empid=<?php echo htmlentities($result->id);?>" target="_blank"><?php echo htmlentities($result->FirstName." ".$result->LastName);?>(<?php echo htmlentities($result->EmpId);?>)</a></td>
                                            <td style="color: black;"><?php echo htmlentities($result->LeaveType);?></td>
                                            <td style="color: black;"><?php echo htmlentities($result->PostingDate);?></td>
                                                                       <td><?php $stats=$result->Status;
if($stats==1){
                                             ?>
                                                 <span style="color: green">Approved</span>
                                                 <?php } if($stats==2)  { ?>
                                                <span style="color: red">Rejected</span>
                                                 <?php } if($stats==0)  { ?>
 <span style="color: blue">waiting for approval</span>
 <?php } ?>


                                             </td>

          <td>
           <td><a href="leave-details.php?leaveid=<?php echo htmlentities($result->lid);?>" class="waves-effect waves-light btn blue m-b-xs"  > View Details</a></td>
                                    </tr>
                                         <?php $cnt++;} }?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                                <h3>Label here!</h3>
                                <div id="canv"><canvas id="myChart"></canvas></div>

                            </div>




                        </div><!--col-->

                        



                    
                    </div><!--row-->
                </div>
              
            </main>
          
        </div>

<style>
    #canv {
      width: 700px;
      height: 600px;
      margin-right: 0px;

    }
  </style>

        
        
        <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../assets/plugins/counter-up-master/jquery.counterup.min.js"></script>
        <script src="../assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="../assets/plugins/chart.js/chart.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="../assets/plugins/curvedlines/curvedLines.js"></script>
        <script src="../assets/plugins/peity/jquery.peity.min.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/dashboard.js"></script>
        <script src="../assets/js/chart.js"></script>
<?php $sql = "SELECT DATE_FORMAT(CURDATE(), '%M %Y') CURRENTMONTH, COUNT(l.empid) leave_count, e.Department from tblleaves l LEFT JOIN tblemployees e ON l.empid = e.id where l.Status = 1 AND (DATE_FORMAT(l.FromDate, '%M %Y')=DATE_FORMAT(CURDATE(), '%M %Y') OR DATE_FORMAT(l.ToDate, '%M %Y')=DATE_FORMAT(CURDATE(), '%M %Y')) GROUP BY e.Department";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
    $departments = array();
    $departmentsLabels = '';
    $leavecounts = array();
    $leavecountsData = '';

    foreach($results as $result)
    {         
        array_push($departments, $result->Department);
        array_push($leavecounts, $result->leave_count);
    }
}
        $departmentsLabels .= "['" . join($departments, "', '") . "']";
        $leavecountsData .= "[" . join($leavecounts, ",") . "]";
 ?>
        <script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {

        // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        labels: <?php echo $departmentsLabels; ?>,
        datasets: [{
            data: <?php echo $leavecountsData; ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 2
        }]
    },
    options: {
         legend: { display: false },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
    </body>
</html>
<?php  } ?>