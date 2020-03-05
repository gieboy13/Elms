<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin | Generate Reports</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
        <link href="../assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

            
        <!-- Theme Styles -->
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/Chart.min.css" rel="stylesheet" type="text/css"/>


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
        <script src="../assets/js/Chart.min.js"></script>
<body>
<style>
.print {
    display:none
}
#chart-container {
    width: 90%;
    height: auto;
}
.spacer{
    height:20px;
}
 @media print {
    .print {display:block}
    .btn-print {display:none;}
    .btn-info {display: none;}
    .btn-sm {display: none;}
    .printh {display:block}
    .page-header{display: none}
    .graphss{display: none}
    .container-fluid{display: none}
    .spacer{display: none}
}
</style>
<div id="wrapper">
    <div class="print">
        <div class="printh">
            <img src="pup.png" style="position: absolute;left:20px;height: 100px;width: auto">
            <center><h5><b>Polytechnic University of the Philippines</b></h5>
            <h6>Address: Sta. Mesa, Manila</h6>
            <h5> <b id="reptype">Leave Weekly Report</b> <b> as of <?php echo date("W, Y "); ?></b></h5></center>
        </div>
        
        <div class="col-lg-12" id="tableContainer">
            <table  width="100%" class="table table-striped table-bordered table-hover" id="repTable">
                <thead>
                    <tr>
                        <th class="hidden"></th>
                        <th>Date</th>
                        <th>Department</th>
                        <th>No. of On Leave</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sq=mysqli_query($conn,"SELECT DATE_FORMAT(CURDATE(), '%W %Y') as CURRENTWEEK, COUNT(l.Status) as 'No. Of Leave', e.Department from tbldepartments d join tblemployees e on e.Department = d.DepartmentName  left join tblleaves l on l.empid = e.id Where
l.Status = 1 AND (DATE_FORMAT(l.FromDate, '%W %Y')=DATE_FORMAT(CURDATE(), '%W %Y') OR DATE_FORMAT(l.ToDate, '%W %Y')=DATE_FORMAT(CURDATE(), '%W %Y'))
group by e.Department; ");
                    $hq=mysqli_query($conn,"SELECT COUNT(Status) as 'No. Of Leave' from  tblleaves  Where
Status = 1 AND (DATE_FORMAT(FromDate, '%W %Y')=DATE_FORMAT(CURDATE(), '%W %Y') OR DATE_FORMAT(ToDate, '%W %Y')=DATE_FORMAT(CURDATE(), '%W %Y'));");
                    $hqrow = mysqli_fetch_array($hq);
                    while($sqrow=mysqli_fetch_array($sq)){
                    ?>
                        <tr>
                            <td class="hidden"></td>

                            <td><?php echo date('M d, Y ',strtotime($sqrow['Date'])); ?>
                                <?php echo ($sqrow['Department']); ?>
                                <?php echo ($sqrow['Leave']); ?>
                            </td>
                            <td align="left"><?php echo ($sqrow['sq']); ?></td>
                            <td align="right"><?php echo number_format($sqrow['Leave'],2); ?></td>

                        </tr>
                    <?php
                    }
                ?>
                        <tr>
                            <th class="hidden"></th>
                           
                            <th class=""></th>
                            <td align="right">TOTAL: </td>
                            <td align="right"><?php echo number_format($hqrow[0],2); ?></td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="spacer"></div>
    <div id="page-wrapper"style="border:none">
        <div class="container-fluid">
            <h1 class="page-header">Generate- <b id="reptype2">Leave Weekly Report</b>
                                    
                                </h1>
            <div class="row">
                <?php $reptype= 'Weekly Sales'; ?>
                <div class="col-lg-12" style="margin-left: 10px">

                    <div class="col-sm-3" style="">
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker2'>
                                <input type='text' class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar">
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <span ><button class="btn btn-info" onClick="Weekly()"> Weekly</button></span>
                    <span ><button class="btn btn-info"  onClick="monthly()"> Monthly</button></span>
                    <span ><button class="btn btn-info"  onClick="annual()"> Annual</button></span>
                    <span class="pull-right"><a class="btn btn-primary btn-sm" href=""  onClick="window.print()"><i class="fa fa-print"></i> Print Report</a></span>
                </div>
                <div class="graphss"> 
                    <div id="chart-container">
                        <canvas id="graphCanvas"></canvas>
                    </div>
                </div>
                
                
            </div>      
        </div>
            
    </div>
        
</div>



<script>
  $(function () {
            $('#datetimepicker2').datetimepicker({
                viewMode: 'years'
            });
        });
    function tableChange(str) {
    if (str == "") {
        document.getElementById("tableContainer").innerHTML = "";
        return;
    } 
    else if (str==1) {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tableContainer").innerHTML = this.responseText;
            }
        };
//        xmlhttp.open("GET","gettable.php?q="+str,true);
        xmlhttp.send();
    }
    else if (str==2) {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tableContainer").innerHTML = this.responseText;
            }
        };
//        xmlhttp.open("GET","gettable.php?q="+str,true);
        xmlhttp.send();
    }
    else if (str==3) {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tableContainer").innerHTML = this.responseText;
            }
        };
//        xmlhttp.open("GET","gettable.php?q="+str,true);
        xmlhttp.send();
    }
}
        $(document).ready(function () {
            showGraph();
        });
        function showGraph()
        {
            {
                $.post("daily.php",
                function (data)
                {
                    console.log(data);
                     var date = [];
                    var total = [];
                    var dates =[];
                    for (var i in data) {
                        date.push(data[i].months.concat(" "+data[i].days+" "+data[i].years));
                        total.push(data[i].tsale);
                    }
                    dates=  date.map( dateString => new Date(dateString) )

                    var chartdata = {
                        labels: date,
                        datasets: [
                            {
                                label: 'Total Sales',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: total
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'line',
                        data: chartdata
                    });
                });
            }
        }
        function showMonGraph()
        {
            {
                $.post("monthly.php",
                function (data)
                {
                    console.log(data);
                     var date = [];
                    var total = [];

                    for (var i in data) {
                        date.push(data[i].months.concat(" "+data[i].years));
                        total.push(data[i].tsale);
                    }

                    var chartdata = {
                        labels: date,
                        datasets: [
                            {
                                label: 'Total Sales',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: total
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'line',
                        data: chartdata
                    });
                });
            }
        }
        function showYearGraph()
        {
            
            {
                $.post("yearly.php",
                function (data)
                {
                    console.log(data);
                     var date = [];
                    var total = [];

                    for (var i in data) {
                        date.push(data[i].years);
                        total.push(data[i].tsale);
                    }

                    var chartdata = {
                        labels: date,
                        datasets: [
                            {
                                label: 'Total Sales',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: total
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'line',
                        data: chartdata
                    });
                });
            }
        }
        </script>

<script type="text/javascript">
 

function week(){
  document.getElementById('reptype').innerHTML = "Leave Weekly Report";
  document.getElementById('reptype2').innerHTML = "Leave Weekly Report";
  showGraph();
  tableChange(1);

}
function monthly(){
    document.getElementById('reptype').innerHTML = "Leave Monthly Report";
    document.getElementById('reptype2').innerHTML = "Leave Monthly Report";
    showMonGraph();
    tableChange(2);
}
function annual(){
    document.getElementById('reptype').innerHTML = "Leave Annual Report";
    document.getElementById('reptype2').innerHTML = "Leave Annual Report";
    showYearGraph();
    tableChange(3);
}
</script>
</body>
</html>