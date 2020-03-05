<?php
   session_start();
   error_reporting(0);
   
   
   
   include('includes/config.php');
   if(strlen($_SESSION['emplogin'])==0)
   {   
      header('location:index.php');
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
      <link href="assets/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
      <link href="assets/css/jquery-ui.theme.min.css" rel="stylesheet" type="text/css"/>
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
      <script></script>
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
                        <input id="sessionid" name="session" value="<?php echo $_SESSION['eid'];?>" hidden>
                           <h3 style="color: black;">Apply For Leave</h3>
                           <section>
                              <div class="wizard-content">
                                 <div class="row">
                                    <div class="col m12">
                                       <div class="row">
                                          <?php if($error){?>
                                          <div class="errorWrap"><strong>ERROR </strong>:<?php echo htmlentities($error); ?> </div>
                                          <?php } 
                                             else if($msg){?>
                                          <div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
                                          <?php }?>
                                          <div style="color: black;" class="input-field col  s12">
                                             <div style="color: black;">Type of Leave</div>
                                             <select style="color: black;" name="leavetype" id="leavetype" autocomplete="off">
                                                <option style="color: black;" value="1" disabled selected>Select leave type...</option>
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
                                          <div stlye="color: black; " class="col m6 s12">
                                                      <input id="date1" name="todate" type="text" autocomplete="off" required>
                                          </div>
                                   
                                          <div style="color: black;" class="col m6 s12">
                                             <input placeholder="To Date" id="date2" readonly name="todate" type="text" autocomplete="off" required>
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
                                          <div class="col m12 s12">
                                             

                                             <div name="spentsick" id="spentsick" hidden> 
                                                <div style="color: black;">Where Leave will be spent?</div>                                               
                                                <select  name="casesick" id="casesick" autocomplete="off" >                                        
                                                   <option value="" selected>In Case of Sick Leave...</option>
                                                   <option value="Out Patient">Out Patient (specify)</option>
                                                   <option value="In Hospital">In Hospital (specify)</option>
                                                </select>    
                                            
                                                   <input readonly placeholder="Specify Details" id="sickspecify" name="casesickdesc" type="text" autocomplete="off" required> 
                                                                                 
                                             </div>

                                             


                                             <div name="spentvac" id="spentvac" hidden> 
                                             <div style="color: black;">Where Leave will be spent?</div>                                               
                                                <select  name="casevac" id="casevac" autocomplete="off" >
                                                   <option value="" selected>In Case of Vacation Leave...</option>
                                                   <option value="Within the Philippines">Within the Philippines</option>
                                                   <option value="Abroad (Specify)">Abroad (Specify)</option>
                                                </select>  
                                            
                                                   <input readonly hidden placeholder="Specify Abroad Details" name="casevacdesc" id="abroadspecify" type="text" autocomplete="off" required> 
                                                                                 
                                             </div>

                                             <div style="color: black;">Commutation</div>
                                             <select  name="commutation" id="commutation" autocomplete="off">
                                                <option value="notrequested" selected>Not Requested</option>
                                                <option value="requested">Requested</option>
                                             </select> 
                                             
                                        

                                             
                                          </div>
                                          <div style="color: black;" class="input-field col m12 s12">
                                             <div style="color: black;">Justification Document <small style="color: gray"><i> word format (.docx), if picture put it in the ms word</i></small></div>
                                             <input id="justicedocument"  type="file"> 
                                          </div>
                                          <div style="height:10px;"></div>
                                        
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <button type="submit" name="apply" id="apply" class="waves-effect waves-light btn blue  m-b-xs" style="width: 100%;">Apply</button>                                             
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
      <script src="assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
      <script src="assets/js/jquery-ui.min.js"></script>
      <script>

         

      //    $('#date1').off().on('change', function() 
      //   {
      //       if($("#date1").val() > $("#date1").val())
      //       {
      //          alert("less than date");
      //       }
      //       else{
      //          alert("error");
      //       }

      //   })

      //   $('#date2').off().on('change', function() 
      //   {
      //      if($("#date1").val() > $("#date1").val())
      //       {
      //          alert("less than date");
      //       }
      //       else{
      //          alert("error");
      //       }

      //   })

      $('#casevac').off().on('change', function() 
        {
         if($('#casevac').val() == 'Abroad (Specify)')
         {
            $('#abroadspecify').removeAttr("hidden")
            $('#abroadspecify').removeAttr("readonly")
       
         }
         else{
            $('#abroadspecify').attr("hidden",true);            
            $('#abroadspecify').attr("readonly",true);  
         }


        });

        


    

        $('#leavetype').off().on('change', function() 
        {

            if($('#leavetype').val() == 'Sick Leave')
            {
                $("#date1").datepicker("destroy");
                $("#date2").datepicker("destroy");
                
                var dateToday = new Date();

                $("#date1").val("");
                $("#date2").val("");

                $("#date1").datepicker({ 
                    beforeShowDay: $.datepicker.noWeekends,
                    maxDate: dateToday                
                })
            
                $("#date2").datepicker({ 
                    beforeShowDay: $.datepicker.noWeekends,
                    maxDate: dateToday
                })

                $('#casesick').removeAttr("readonly");
                $('#spentsick').show().find('input, select').prop('readonly', false);


               
            }
            if($('#leavetype').val() != 'Sick Leave')
            {
                $("#date1").datepicker("destroy");
                $("#date2").datepicker("destroy");

                var dateToday = new Date();

                $("#date1").val("");
                $("#date2").val("");

                $("#date1").datepicker({ 
                    beforeShowDay: $.datepicker.noWeekends,
                    minDate: dateToday
                    
                })
                $("#date2").datepicker({ 
                    beforeShowDay: $.datepicker.noWeekends,
                    minDate: dateToday
                })

                $('#spentsick').hide().find('input, select').prop('readonly', true);    
                $('#casesick').attr("readonly",true)

                
                               
            }

            if($('#leavetype').val() == 'Vacation Leave')
            {
               $('#spentvac').show().find('input, select, span').prop('readonly', false);
               $('#casevac').removeAttr("readonly");
               $('#casevac').attr("readonly",false);



            }
            if($('#leavetype').val() != 'Vacation Leave')
            {
               $('#spentvac').hide().find('input, select').prop('readonly', true); 
               $('#casevac').attr("readonly",true);
            }

        });
   
         
         
         
         
         $(document).ready(function(){
         $.ajax({ 
             url: "updatecredits.php",
             context: document.body,
             success: function(data){
                 if(data == 'No Affected')
                 {
                     
                 }   
                 else{
                     alert("Credits Updated!");
                     location.reload();
                 }
                
                
               
             }});
         });


         $('#apply').click(function(e){

            e.preventDefault();

            var id = $('#sessionid').val();
            var type = $('#leavetype').val();            
            var fromdate = $('.fromdate').val();
            var todate = $('.todate').val();
            var casesick = $('#casesick').val();
            var casesickdesc = $('#sickspecify').val();
            var casevac = $('#casevac').val();
            var casevacdesc = $('#abroadspecify').val();
            var commutation = $('#commutation').val();


            alert(id);
            alert(type);
            alert(todate);
            alert(fromdate);
            alert(casesick);
            alert(casesickdesc);

            alert(casevac);
            alert(casevacdesc);
            alert(commutation);
            var data = $("#example-form").serialize();

            // $.ajax({ 
            //  url: "applyleave.php",
            //  data: data ,
            //  type: 'post',
            //  success: function(data){
            //      if(data == 'success')
            //      {
                     
            //      }   
            //      else{
                    
            //          alert(data);
            //      }
                
                
               
            //  }});


         });
         
         




         
         
      </script>
   </body>
</html>