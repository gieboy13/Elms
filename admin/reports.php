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
        <title>Admin | Reports</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet"> 
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css"/>



        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/plugins/counter-up-master/jquery.counterup.min.js"></script>
        <script src="../assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="../assets/plugins/chart.js/chart.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="../assets/plugins/curvedlines/curvedLines.js"></script>

        <script src="../assets/js/jszip.min.js"></script>
        <script src="../assets/js/pdfmake.min.js"></script>
        <script src="../assets/js/jquery.dataTables.min.js"></script>
        <script src="../assets/js/dataTables.buttons.min.js"></script>       
        <script src="../assets/js/buttons.colVis.min.js"></script>
        <script src="../assets/js/buttons.flash.min.js"></script>
        <script src="../assets/js/buttons.html5.min.js"></script>
        <script src="../assets/js/buttons.print.min.js"></script>


        <script src="../assets/plugins/peity/jquery.peity.min.js"></script>
        <script src="../assets/js/Chart.min.js"></script>


  <style>
    body {
                background-color: white;
                background-size: 1500px;
            }
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
        </style>
  

    </head>
    <body>
  <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>
   <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div style="color: black; font-size: 25px;" class="page-title">Reports</div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div style="background-color: transparent; border: gray 5px solid;" class="card">
                            <div class="card-content">
                            <hr>
                            <div class="center-align">
                            <h5><i>Filter Reports<b></b></i></h5>
                            <hr><br>
                            <div class="card">
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col s3 m3">
                                            
                                                                            
                                            <div style="color: black;">Start Date</div>
                                            <input id="startdate" type="date" required>

                                            <div style="color: black;">End Date</div>
                                            <input id="enddate" type="date" required>  

                                            <div style="color: black;">Status</div>
                                            <hr>
                                            <div class="row">
                                                <div class="col s4 m4">
                                                    <div class="switch">
                                                        <label>
                                                        APPROVED
                                                        <input id="approved" type="checkbox">
                                                        <span class="lever"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col s4 m4">
                                                    <div class="switch">
                                                        <label>
                                                        PENDING
                                                        <input id="pending" type="checkbox">
                                                        <span class="lever"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col s4 m4">
                                                    <div class="switch">
                                                        <label>
                                                        REJECTED
                                                        <input id="rejected" type="checkbox">
                                                        <span class="lever"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>

                                            <div style="color: black;" class="input-field col  s12">
                                                <div style="color: black;">Types of Leave</div>
                                                <select style="color: black;" id="leaves" autocomplete="off">
                                                    <option style="color: black;" value="%" selected >Show All Leave</option>
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

                                            <div style="color: black;" class="input-field col  s12">
                                                <div style="color: black;">Departments</div>
                                                <select style="color: black;" id="departments" autocomplete="off">
                                                    <option style="color: black;" value="%" selected >Show All Department</option>
                                                    <?php $sql1 = "SELECT DepartmentName FROM tbldepartments";
                                                    $query2 = $dbh -> prepare($sql1);
                                                    $query2->execute();
                                                    $results=$query2->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt2=1;
                                                    if($query2->rowCount() > 0)
                                                    {
                                                    foreach($results as $result)
                                                    {   ?>                                            
                                                    <option value="<?php echo htmlentities($result->DepartmentName);?>"><?php echo htmlentities($result->DepartmentName);?></option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                         


                                            <br>                         
                                            <div class="input-field col s12">
                                                <input id="generate" type="button" style="width: 100%;" class="btn blue m-b-xs" value="Generate">
                                            </div>                                       
                                    

                                        </div>


                                        <div class="col s9 m9">
                                            <div class="card">
                                                <div class="card-content">
                                                    <span class="card-title">Results</span>
                                                    <table id="reportTable" class="display nowrap" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Department</th>
                                                                <th>Type</th>
                                                                <th>Leave : To</th>
                                                                <th>Leave : From</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>                                                          
                                                            
                                                        </tbody>                                                    
                                                    </table>
                                                    <br>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                
                                </div>
                                <br>
                               
                                    
                                    
                                    <br><br>
                                                            
                            </div>
                            <br><br>



                            




                            <hr>
                            <div class="center-align">
                            <h5><i>Graph Reports<b></b></i></h5>
                            <hr>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col s12">
                                <ul class="tabs">
                                    <li class="tab col s3"><a class="active" href="#test1">Overall No. of Leave by Department</a></li>
                                    <li class="tab col s3"><a href="#test2">Overall No. of Leave by Leave Type</a></li>
                                </ul>
                                </div>
                                <div id="test1" class="col s12">
                                    <div style="margin-left: 14%; margin-right: 14%;">                                    <br>
                                        <canvas id="departmentcanvas" style="height: 140px;"></canvas>
                                    </div>
                                    
                                </div>
                                <div id="test2" class="col s12">
                                    <div style="margin-left: 14%; margin-right: 14%;">                                 <br>                                   
                                        <canvas id="leavecanvas" style="height: 140px;"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s12">
                                <ul class="tabs">
                                    <li class="tab col s3"><a class="active" href="#monthly">Monthly No. of Leaves</a></li>
                                </ul>
                                </div>
                                <div id="monthly" class="col s12">
                                    <div style="margin-left: 14%; margin-right: 14%;">                                    <br>
                                        <canvas id="monthlycanvas" style="height: 140px;"></canvas>
                                    </div>
                                    
                                </div>
                                                           
                            </div>

                            <div class="row">
                                <div class="col s12">
                                <ul class="tabs">
                                    <li class="tab col s3"><a class="active" href="#yearly">Annually No. of Leaves</a></li>
                                </ul>
                                </div>
                                <div id="yearly" class="col s12">
                                    <div style="margin-left: 14%; margin-right: 14%;">                                    <br>
                                        <canvas id="yearlycanvas" style="height: 140px;"></canvas>
                                    </div>
                                    
                                </div>
                                                           
                            </div>
                          
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div class="left-sidebar-hover"></div>
        
        <!-- Javascripts -->
        
        
    </body>


<script>
$(document).ready(function () {

    

    $("#approved").click(function(){
        $("#pending").prop("checked", false);
        $("#rejected").prop("checked", false); 
    });

    $("#pending").click(function(){
        $("#approved").prop("checked", false);
        $("#rejected").prop("checked", false);
    });

    $("#rejected").click(function(){
        $("#pending").prop("checked", false);
        $("#approved").prop("checked", false);
    });

        
    showDepartment();
    showType();

    showMonthly();
    showYearly();

    

    $("#generate").off().on('click', function(e){

        if($.trim($('#startdate').val()) == 0 || $.trim($('#enddate').val()) == 0){
            alert("Input Start and End Date!")
        }
        else if($.trim($('#startdate').val()) > $.trim($('#enddate').val())){
            alert("Start Date is leading, Change Start Date or End Date! ");
        }
        else{
            var status = '%';

            if($('#approved').is(':checked')){
                status = 1;
            }
            else if($('#pending').is(':checked')){
                status = 0;
            }
            else if($('#rejected').is(':checked')){
                status = 2;
            }

            var dep = $("#departments").val();
            var lev = $("#leaves").val();

            var start = $("#startdate").val();
            var end = $("#enddate").val();


            $.ajax({                
                url: 'generatereports.php',
                method: 'POST',
                data: {status:status, dep:dep, lev:lev, start:start, end:end},
                dataType: 'JSON',
                success:function(e)            
                {
                    $("#reportTable").html(e);
                    $('#reportTable').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ],
                        stateSave: true,
                        "bDestroy": true
                    });
                }
            })
            
        }

            
        
    })


















        
});

        function showDepartment()
        {
            {
                $.post("countleavesdepartment.php",
                function (data)
                {
                    var department = [];
                    var count = [];

                    for (var i in data) {
                        department.push(data[i].department);
                        count.push(data[i].count);
                    }

                    var chartdata = {
                        labels: department,
                        datasets: [
                            {
                                label: 'No of Leaves',
                                backgroundColor: ['red', 'orange', 'yellow', 'green', 'indigo', 'violet','blue','#f56954', '#00a65a', '#f39cs2',  ],
                                data: count
                            }
                        ]
                    };

                    var graphTarget = $("#departmentcanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'pie',
                        data: chartdata,
                        
                    });
                });
            }
        }
        

        function showType()
        {
            {
                $.post("countleavestype.php",
                function (data)
                {
                    var type = [];
                    var count = [];
                    

                    for (var i in data) {
                        type.push(data[i].type);
                        count.push(data[i].count);
                    }

                    var chartdata = {
                        labels: type,
                        datasets: [
                            {
                                label: 'No. of Leaves',
                                backgroundColor: ['red', 'orange', 'yellow', 'green', 'indigo', 'violet','blue','#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                                data: count
                            }
                        ]
                    };

                    var graphTarget = $("#leavecanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata,
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                });
            }
        }

        function showMonthly()
        {
            {
                $.post("monthly.php",
                function (data)
                {
                    var monthly = [];
                    var count = [];
                    var d = new Date();
                    var n = d.getFullYear();
                    var year = "Year "; 
                    var res = year.concat(n);

                    for (var i in data) {
                        monthly.push(data[i].month);
                        count.push(data[i].count);
                    }

                    var chartdata = {
                        labels: monthly,
                        datasets: [
                            {
                                label: res,
                                backgroundColor: ['red', 'orange', 'yellow', 'green', 'indigo', 'violet','blue','#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                                data: count
                            }
                        ],
                        
                    };

                    var graphTarget = $("#monthlycanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata,
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                });
            }
        }


        function showYearly()
        {
            {
                $.post("yearly.php",
                function (data)
                {
                    var year = [];
                    var count = [];
                   
                    for (var i in data) {
                        year.push(data[i].year);
                        count.push(data[i].count);
                    }

                    var chartdata = {
                        labels: year,
                        datasets: [
                            {
                                label: "No. of Leaves",
                                backgroundColor: ['red', 'orange', 'yellow', 'green', 'indigo', 'violet','blue','#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                                data: count
                            }
                        ],
                        
                    };

                    var graphTarget = $("#yearlycanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata,
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                });
            }
        }
        
    </script>


                
                
<script>
// FIRST CHART
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            
            borderWidth: 1
        }]
    },
    
});

// SECOND CHART
var ctx1 = document.getElementById('myChart1');
var myChart1 = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
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
            borderWidth: 1
        }]
    },
    
});
</script>



</html>