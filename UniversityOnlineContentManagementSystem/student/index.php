<?php
// start the session function.
session_start();
//connect to the database of the system.
require('connect.php');
require('passwordfun.php');
// check the condition for login stage.
if (isset($_POST['btnlogin'])) 
{
$txtStudentUsername=$_POST['txtStudentUsername'];
$txtStudentPassword=$_POST['txtStudentPassword'];
$secondselect="SELECT * from students
                WHERE username='$txtStudentUsername'";


$secondrun=mysqli_query($connection,$secondselect);
$secondrow=mysqli_num_rows($secondrun);
$secondarray=mysqli_fetch_array($secondrun);
$password=$secondarray['password'];
$checkpassword=verifypassword($txtStudentPassword,$password);

// check the condition if there is no account.
if ($checkpassword==false) 
{
    echo "<script>window.alert('You failed to login to the account. Pls check email or password.')</script>";
    echo "<script>window.location='index.php'</script>";
}
// check the condition if the account has already got approval or not.
elseif($secondarray['is_approved']==0)
{
 echo "<script>window.alert('Your account is still pending. We will let you know after we check.')</script>";
    echo "<script>window.location='index.php'</script>";
}
else
{
// take the data from the database for the session.
    $_SESSION['student_id']=$secondarray['student_id'];
    $_SESSION['StudentGUID']=$secondarray['StudentGUID'];
    $_SESSION['name']=$secondarray['name'];
    $_SESSION['profile_img_url']=$secondarray['profile_img_url'];
    $_SESSION['password']=$secondarray['password'];
    $_SESSION['address']=$secondarray['address'];
    $_SESSION['email']=$secondarray['email'];
    $_SESSION['username']=$secondarray['username'];
    $_SESSION['faculty_id']=$secondarray['faculty_id'];
    $_SESSION['gender_id']=$secondarray['gender_id'];
     $_SESSION['dob']=$secondarray['dob'];
    // $_SESSION['faculty_name']=$secondarray['faculty_name'];
    echo "<script>window.alert('You login to the account successfully.')</script>";
    echo "<script>window.location='Home.php'</script>";
}
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>KMD University - Think High, Aim Big, Get Knowledge</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">

     <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
  </head>
  <body>
    <form action="index.php" method="POST" enctype="multipart/form-data">
    <div class="page-wrapper bg-light p-t-100 p-b-100 font-robo">
       <div class="wrapper wrapper--w680">
           <div class="card card-1">
               <div class="card-heading"></div>
               <div class="card-body">
                   <h1 class="title">Student Login</h1>
                   <form method="POST">
                     <div class="row row-space">
                         <div class="col-12">
                             <div class="input-group">
                                 <input class="input--style-1" type="text" placeholder="Username" name="txtStudentUsername">
                             </div>
                         </div>
                         </div>
                       <div class="row row-space">
                           <div class="col-12">
                               <div class="input-group">
                                   <input class="input--style-1" type="password" placeholder="Password" name="txtStudentPassword">
                               </div>
                           </div>
                       </div>



                       <div class="text-center">
                           <button class="btn btn-success" type="login" name="btnlogin">Login</button>
                            <button class="btn btn-danger" name="btncancel" type="cancel">Cancel</button>
                       </div><br>
                       <label align="Middle">Don't have an account? Click <b><a href="StudentRegistration.php">Here</a></b> to Register.</label>
                   </form>
                    <hr>
                   <form action="guestlogin.php" method="post">
                  
                   <select name="faculty" class="form-control" id="">
                   <option value="0">Choose a Faculty to view As GUEST</option>

                       <?php   
                       
                       $facultyquery=mysqli_query($connection,"Select * from faculties");

                     while(  $row=mysqli_fetch_assoc($facultyquery)):
                       ?>
                    <option value="<?php echo $row['faculty_id'] ?>"><?php echo $row['name'] ?></option>
                     <?php endwhile;?>
                </select>

                   <button type="submit" name="guset" class="btn btn-primary" >View As Guest</button>
                   </form>
               </div>
           </div>
       </div>
   </div>

<!--  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div> -->


 <script src="js/jquery.min.js"></script>
 <script src="js/jquery-migrate-3.0.1.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery.easing.1.3.js"></script>
   <script src="js/jquery.waypoints.min.js"></script>
   <script src="js/jquery.stellar.min.js"></script>
   <script src="js/owl.carousel.min.js"></script>
   <script src="js/jquery.magnific-popup.min.js"></script>
   <script src="js/aos.js"></script>
   <script src="js/jquery.animateNumber.min.js"></script>
   <script src="js/scrollax.min.js"></script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
   <script src="js/google-map.js"></script>
   <script src="js/main.js"></script>
   <!-- Jquery JS-->
   <script src="vendor/jquery/jquery.min.js"></script>
   <!-- Vendor JS-->
   <script src="vendor/select2/select2.min.js"></script>
   <script src="vendor/datepicker/moment.min.js"></script>
   <script src="vendor/datepicker/daterangepicker.js"></script>

   <!-- Main JS-->
   <script src="js/global.js"></script>
</form>
   </body>
   </html>
