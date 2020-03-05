<?php
   session_start();
   error_reporting(0);
   include('includes/config.php');
   if(strlen($_SESSION['emplogin'])==0)
       {   
   header('location:index.php');
   }
   else{
   
    ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Title -->
      <title>Employee | Leave History</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
      <meta charset="UTF-8">
      <meta name="description" content="Responsive Admin Dashboard Template" />
      <meta name="keywords" content="admin,dashboard" />
      <meta name="author" content="Steelcoders" />
      <!-- Styles -->
      <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
      <link href="assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

      <link href="assets/plugins/sweetalert2/sweetalert2.css" rel="stylesheet">

      <!-- Theme Styles -->
      <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
      <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>

      <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
      <script src="assets/plugins/materialize/js/materialize.min.js"></script>
      <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
      <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
      <script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
      <script src="assets/js/alpha.min.js"></script>
      <script src="assets/js/pages/table-data.js"></script>
      <script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>


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
               <div class="page-title"></div>
            </div>
            <div class="col s12 m12 l12">
               <div style="background-color: transparent;" class="card">
                  <div class="card-content">
                     <span style="color: black; font-size: 25px;" class="card-title">Leave History</span>
                     <?php if($msg){?>
                     <div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div>
                     <?php }?>
                     <table style="color: black;" id="example" class="display responsive-table ">
                        <thead>
                           <tr style="color: black;">
                              <th>#</th>
                              <th width="120">Leave Type</th>
                              <th>From</th>
                              <th>To</th>
                              <th>Description</th>
                              <th width="120">Posting Date</th>
                              <th width="200">Admin Remark</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              $eid=$_SESSION['eid'];
                              $sql = "SELECT id,LeaveType,FromDate,ToDate,Description,PostingDate,AdminRemarkDate,AdminRemark,Status from tblleaves where empid=:eid";
                              $query = $dbh -> prepare($sql);
                              $query->bindParam(':eid',$eid,PDO::PARAM_STR);
                              $query->execute();
                              $results=$query->fetchAll(PDO::FETCH_OBJ);
                              $cnt=1;
                              if($query->rowCount() > 0)
                              {
                              foreach($results as $result)
                              {        
                              
                              $leaveid = htmlentities($result->id)
                                     ?>  
                           <tr style="color: black;">
                              <td> <?php echo htmlentities($cnt);?></td>
                              <td><?php echo htmlentities($result->LeaveType);?></td>
                              <td><?php echo htmlentities($result->FromDate);?></td>
                              <td><?php echo htmlentities($result->ToDate);?></td>
                              <td><?php echo htmlentities($result->Description);?></td>
                              <td><?php echo htmlentities($result->PostingDate);?></td>
                              <td><?php if($result->AdminRemark=="")
                                 {
                                 echo htmlentities('waiting for approval');
                                 } else
                                 {
                                 
                                 echo htmlentities(($result->AdminRemark)." "."at"." ".$result->AdminRemarkDate);
                                 }
                                 
                                 ?>
                              </td>
                              
                              <?php 
                              
                              $stats=$result->Status;
                                 if($stats==1)
                                 {
                                 ?>
                                 <td>
                                 <span style='color: green; font-weight: bold;'>Approved</span> 
                                 </td>
                                 <td>
                                 <a
                                    onclick="window.open('leavee.php?id=<?php echo $leaveid ?>', 
                                    'newwindow', 
                                    'width=750,height=1100');"
                                    class="waves-effect waves-light btn indigo m-b-xs" style="width:50%;">PRINT</a> 
                                 </td>

                                    

                                 <?php

                                 }
                                 else if($stats==2)
                                 {
                                    echo "<td>
                                          <span style='color: red; font-weight: bold;'>Rejected</span>
                                          </td>
                                          <td>--</td>";
                                 }
                                 else if($stats==0)
                                 {
                                    ?>
                                    <td>
                                    <span style='color: orange; font-weight: bold;'>Pending | Waiting for Approval</span> 
                                    </td>
                                    <td>
                                    <a style="font-style: bold; width:50%; background-color: #800000; padding: 10% 25% 10% 25%; border-radius:3px; color: white; "href="#" id="<?php echo $leaveid?>" class="cancel" >CANCEL</a>
                               
                                    </td>

                                    

                                 <?php
                                 }
                                 else if($stats==3)
                                 {
                                    echo "<td>
                                          <span style='color: red; font-weight: bold;'>Cancelled</span>
                                          </td>
                                          <td>--</td>";
                                 }
                                    
                             
                                 ?>

                                


                           </tr>
                           <?php $cnt++;} }?>

                           <script>

                           $('.cancel').click(function(e){

                           e.preventDefault();

                           Swal.fire({
                           title: 'Are you sure?',
                           text: "You won't be able to revert this!",
                           type: 'warning',
                           showCancelButton: true,
                           confirmButtonColor: '#3085d6',
                           cancelButtonColor: '#d33',
                           confirmButtonText: 'Yes, cancel it!'
                           }).then((result) => {
                           if (result.value) {

                              var del_id= $(this).attr('id');
                              var $ele = $(this).parent().parent();
                              $.ajax({
                                 type:'POST',
                                 url:'cancelleave.php',
                                 data:{del_id:del_id},
                                 success: function(data){
                                       if(data=="YES"){
                                          Swal.fire(
                                             'Your Leave was Cancelled!',
                                             'Your file has been deleted.',
                                             'success'
                                          )

                                          window.location.href = "leavehistory.php";
                                          
                                       }else{
                                       console.log("undefined");
                                       }
                                 }

                              })


                              
                           }
                           })


                           })                             

                           </script>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </main>
      </div>
      <div class="left-sidebar-hover"></div>
      <!-- Javascripts -->
  
   </body>
</html>
<?php } ?>