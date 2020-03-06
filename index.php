
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['signin']))
{
$uname=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT EmailId,Password,Status,id FROM tblemployees WHERE EmailId=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
 foreach ($results as $result) {
    $status=$result->Status;
    $_SESSION['eid']=$result->id;
  }
if($status==0)
{
$msg="Your account is Inactive. Please contact the admin";
} else{
$_SESSION['emplogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'apply-leave.php'; </script>";
} }

else{

  echo "<script>alert('Invalid Details');</script>";

}

}

?><!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Title -->
        <title>PUP Leave Management System | Home Page</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />

        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">


        <!-- Theme Styles -->
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>



    </head>
    <body>
        <style>
            body {
                background-image: url('mountains2.jpg');
                background-size: 1500px;
            }
        </style>
        <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-spinner-teal lighten-1">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mn-content fixed-sidebar">
            <header class="mn-header navbar-fixed">
                <nav style="background-color: transparent;" class="gold">
                    <div class="nav-wrapper row">
                        <section class="material-design-hamburger navigation-toggle">
                            <a href="#" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                                <span class="material-design-hamburger__layer"></span>
                            </a>
                        </section>
                        <div class="header-title col s3">
                            <span style="font-size: 100%; width: 300px;" class="chapter-title">PUP | Leave Management System</span>
                        </div>


                        </form>


                    </div>
                </nav>
            </header>



            <aside style="background-color: transparent;" id="slide-out" class="side-nav gold fixed">
                <div class="side-nav-wrapper">


                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                    <li>&nbsp;</li>
                    <li class="no-padding"><a style="color: white;" class="waves-effect waves-red" href="index.php"><i style="color: white;" class="material-icons">account_box</i>Employee Login</a></li>
                    <li class="no-padding"><a style="color: white;" class="waves-effect waves-red" href="forgot-password.php"><i style="color: white;" class="material-icons">account_box</i>Emp Password Recovery</a></li>
                    <li class="no-padding"><a style="color: white;" class="waves-effect waves-red" href="admin/"><i style="color: white;" class="material-icons">account_box</i>Admin Login</a></li>
       

                </ul>
          <div class="footer">
                    <p class="copyright"><a href="https://hris.pup.edu.ph/">PUP HRIS</a></p>

                </div>
                </div>
            </aside>
            <main style="background-color: transparent;" class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div style="color: white;" class="page-title"><h4>Welcome to PUP Leave Management System</h4></div>
                          <div class="col s12 m6 l8 offset-l2 offset-m3">
                              <div class="card white ligthen-2">

                                  <div class="card-content" style="background-image: url('mountains2.jpg');  border: gray 5px solid;">
                                      <span class="card-title" style="font-size:20px; color: white;">Employee Login</span>
                                         <?php if($msg){?><div class="errorWrap"><strong>Error</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                       <div class="row">
                                           <form class="col s12" name="signin" method="post">
                                               <div class="input-field col s12">
                                                   <input style="color: white;" id="username" type="text" name="username" class="validate" autocomplete="off" required >
                                                   <label style="color: white;" for="email">Email Id</label>
                                               </div>
                                               <div class="input-field col s12">
                                                   <input style="color: white;" id="password" type="password" class="validate" name="password" autocomplete="off" required>
                                                   <label style="color: white;" for="password">Password</label>
                                               </div>
                                               <div class="col s12 right-align m-t-sm">

                                                   <input type="submit" name="signin" value="Sign in" class="waves-effect waves-light btn teal">
                                               </div>
                                           </form>
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
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>

    </body>
</html>
