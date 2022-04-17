<?php
// call the session function.
session_start();
//connect to the database of the system.
require('connect.php');
// check the condition if the user has already login to the account or not.
if(empty($_SESSION['student_id']))
{
    echo "<script>window.location='403.php'</script>";
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
    <style type="text/css">
        a{
           color: #666666;
        }
         .black:hover{
            color: black;
        }
        a:hover{
            color: #ffff;
        }

    </style>
</head>
<form action="StudentProfile.php" method="POST" enctype="multipart/form-data">
<body>
    <?php
       //connect to the header site of the website.
require ('WebHeader.php');
    ?>
        

        <div class="page-wrapper bg-light p-t-100 p-b-100 font-robo">
            <div class="wrapper wrapper--w680">
                <div class="card card-1">
                    <div class="card-heading"></div>
                    <div class="card-body">
                        <h1 class="title">Your Profile</h1>
                        <form method="POST">
                            <div>
                                <img class="block-20 d-flex align-items-end"  src="../img/<?php echo $_SESSION['profile_img_url']?>">
                            </div><br>
                            <div class="input-group">
                                <label disabled>Student Name: <?php echo $_SESSION['name']?></label>
                            </div>
                             <div class="input-group">
                                <label disabled>Student Username: <?php echo $_SESSION['username']?></label>
                            </div>
                          
                            <div class="row row-space">
                                <div class="col-5">
                                    <div class="input-group">
                                        <label disabled>BirthDate: <?php echo $_SESSION['dob']?></label>
                                    </div>
                                </div>
                            </div>
                           <div class="row row-space">
                                <div class="col-5">
                                    <div class="input-group">
                                        <label disabled>Gender: <?php 

                                        $genderid=$_SESSION['gender_id'];
                                        $select2="SELECT * from genders
                                                 Where gender_id='$genderid'";
                                        $run2=mysqli_query($connection,$select2);
                                        $row2=mysqli_num_rows($run2);
                                        for ($i=0; $i <$row2 ; $i++) 
                                        { 
                                            $array2=mysqli_fetch_array($run2);
                                            echo $array2['gender_name'];
                                        }
                                        ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-12">
                                    <div class="input-group">
                                        <label disabled>Faculty:<?php
                                        $facultyid=$_SESSION['faculty_id'];
                                        $select="SELECT * from faculties
                                                 Where faculty_id='$facultyid'";
                                        $run=mysqli_query($connection,$select);
                                        $row=mysqli_num_rows($run);
                                        for ($i=0; $i <$row ; $i++) 
                                        { 
                                            $array=mysqli_fetch_array($run);
                                            echo $array['name'];
                                        }

                                         ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-12">
                                    <div class="input-group">
                                        <label disabled>Email:<?php echo $_SESSION['email']?></label>
                                    </div>
                                </div>
                            </div>

                                   <div class="row row-space">
                                <div class="col-12">
                                        <label><a class="black" href="MyArticle.php?StudentGUID=<?php echo $_SESSION['StudentGUID']?>">Click Here Watch your Arts</a></label>

                                </div>
                            </div>
                        
                            <div class="text-center">
                                <button class="btn btn-outline-info" name="btnupdate" type="submit">
<a  

" href="StudentUpdate.php?Student=<?php echo $_SESSION['StudentGUID'] ?>">Update my account</a></button>
                                <button class="btn btn-outline-success" name="btnupdate" type="submit">
            <a href="ArticleUpload.php">Upload Arts</a></button>
                                <button class="btn btn-danger" name="btncancel" type="cancel">Cancel</button>
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
     
<?php
//connect to the footer site of the website.
require('WebFooter.php');
?>


        <!-- loader -->
<!--         <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div> -->


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

</body>
</form>
</html>