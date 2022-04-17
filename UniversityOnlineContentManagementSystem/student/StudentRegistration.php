<?php
//connect to the database of the system.
require('connect.php');
//call globally unique identifier function of the system.
require('GUIDFunction.php');

if (isset($_POST['btncancel'])) 
{
echo "<script>window.alert('You cancel the process of registration.')</script>";
echo"<script>window.location('StudentRegisteration.php')</script>";
}
// check the condition of the sign up process.
if (isset($_POST['btnsignup'])) 
{
//take the data from the data inputs.
$txtStudentName=$_POST['txtStudentName'];
$txtStudentEmail=$_POST['txtStudentEmail'];
$txtStudentPassword=$_POST['txtStudentPassword'];

$checkpassword=strlen($_POST['txtStudentPassword']);


$txtStudentGenderid=$_POST['txtStudentGenderid'];

$txtStudentGuid=$_POST['txtStudentGuid'];

$txtStudentUsername=$_POST['txtStudentUsername'];

$txtFacultyid=$_POST['txtFacultyid'];
$txtStudentAddress=$_POST['txtStudentAddress'];
$txtStudentBirthday=$_POST['txtStudentBirthday'];
$txtTodayDate=date('Y-m-d H:i');




//Student Image Upload Coding Start--------------------------
    $StudentImage=$_FILES['StudentImage']['name']; 
    $folder="../img/";

    $filename=$StudentImage; 

    $copied=copy($_FILES['StudentImage']['tmp_name'], $folder.$filename);

    if(!$copied) 
    {                                                               
        echo "<p>Error in Image Upload...</p>";
        exit();
    }
// StudentImage Upload Coding End--------------------------

//Student ID card Image Upload Coding Start--------------------------
    $StudentidImages=$_FILES['StudentidImages']['name']; 
    $Folder="../img/";

    $filename1= $StudentidImages; 

    $copied1=copy($_FILES['StudentidImages']['tmp_name'], $Folder.$filename1);

    if(!$copied1) 
    {                                                               
        echo "<p>Error in Image Upload...</p>";
        exit();
    }
//Student ID card Image Upload Coding End--------------------------

//check the database whether there is same data or not
$select="SELECT * from students 
		where email='$txtStudentEmail'
        and password='$txtStudentPassword'
        or username='$txtStudentUsername'";
//command to run the database
$run=mysqli_query($connection,$select);
//search the data row by row
$search=mysqli_num_rows($run);
// $array3=mysqli_fetch_array($run);
//check the condition if there is the same data equivalent from the data inputs.

if ($search>0) 
{
echo "<script>window.alert('The account has already existed. Please sign in the account.')</script>";
echo"<script>window.location('index.php')</script>";
}
// check if there is a same username or not
// elseif ($array3['student_username']=$txtStudentUsername) 
// {
// echo "<script>window.alert('This Username has already existed. Please choose the other one.')</script>";
// echo"<script>window.location('StudentRegisteration.php')</script>";
// }
// check the age limitation
// $Todaydate=strtotime('Y');
// $age=$TodayDate-$txtStudentBirthday;
// if($age<16 or $age>120) 
// {
// echo "<script>window.alert('You are not a university student.')</script>";
// echo"<script>window.location('StudentLogin.php')</script>";
// }
else
{
if ($checkpassword < 6) {
   echo "<script>window.alert('Password must be at least 6 character')</script>";
echo"<script>window.location('StudentRegisteration.php')</script>";
}
elseif (is_numeric($txtStudentPassword)) {
   echo "<script>window.alert('Password must also include the characters')</script>";
echo"<script>window.location('StudentRegisteration.php')</script>";
}

else{
// for the security of the password
// require('passwordfun.php');

// $txtStudentPassword=password_hash($txtStudentPassword, PASSWORD_DEFAULT);
   //Insert the data to the database
$insert="INSERT INTO `students`
        (`name`, `username`, `email`, `password`, `faculty_id`, `profile_img_url`, `student_id_img_url`, `is_approved`, `dob`, `address`, `gender_id`, `created_at`,`StudentGUID`) 
        VALUES ('$txtStudentName','$txtStudentUsername','$txtStudentEmail','$txtStudentPassword','$txtFacultyid','$filename','$filename1','0','$txtStudentBirthday','$txtStudentAddress','$txtStudentGenderid','$txtTodayDate','$txtStudentGuid')";
//run the above command

$runagain=mysqli_query($connection,$insert); 
if ($runagain) 
{
echo "<script>window.alert('Thanks for your registration. We will notice you when you can use the  account.')</script>";
echo"<script>window.location('StudentLogin.php')</script>";
}
else
{
    echo "<p>There is an error in website!" . mysqli_error($connection) . "</p>";

}
}

//check the condition if the data was inserted to the database.

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
<form action="StudentRegistration.php" method="POST" enctype="multipart/form-data">
<body>
<!--     <?php
       //connect to the header site of the website.
// require ('WebHeader.php');
    ?> -->
        

        <div class="page-wrapper bg-light p-t-100 p-b-100 font-robo">
            <div class="wrapper wrapper--w680">
                <div class="card card-1">
                    <div class="card-heading"></div>
                    <div class="card-body">
                        <h1 class="title">Registration Info</h1>
                        <form method="POST">
                            <div class="input-group">
                                <input class="input--style-1" type="text" placeholder="NAME" name="txtStudentName" required>
                            </div>
                             <div class="input-group">
                                <input class="input--style-1" type="text" placeholder="Username" name="txtStudentUsername" required>
                            </div>
                            <div class="row row-space">
                                <div class="col-5">
                                    <div class="input-group">
                                        <input type="date" placeholder="Date Of Birth" name="txtStudentBirthday" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-12">
                                    <div class="input-group">
                                        <input class="input--style-1" type="password" placeholder="Password" name="txtStudentPassword" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-12">
                                    <div class="input-group">
                                        <input class="input--style-1" type="email" placeholder="Email" name="txtStudentEmail" required>
                                    </div>
                                </div>
                            </div>
                             <div class="row row-space">
                                <div class="col-lg-6 col-md-6 form-group">
                                    <div class="input-group">

                                            <select class="form-control" name="txtFacultyid" required>
                                            <option disabled="disabled" selected="selected">Choose your Faculty</option>
                                             <!-- show the gender data from the database -->
                                             <?php  
                                        $facultyquery="SELECT * FROM faculties";
                                        $facultyret=mysqli_query($connection,$facultyquery);
                                        $facultycount=mysqli_num_rows($facultyret);

                                        for($x=0;$x<$facultycount;$x++) 
                                        { 
                                            $arr1=mysqli_fetch_array($facultyret);
                                            $FacultyID=$arr1['faculty_id'];
                                            $FacultyName=$arr1['name'];

                                            echo "<option value='$FacultyID'>$FacultyName</option>";
                                        }
                                             ?>
                                        </select>
                                            <div class="select-dropdown"></div>
                                        </div>
                                </div>

                                    <div class="col-lg-6 col-md-6 form-group">
                                    <div class="input-group">
                                       
                                            <select class="form-control" name="txtStudentGenderid" required>
                                                 <option disabled="disabled" selected="selected">GENDER</option>
                                                <!-- show the gender data from the database -->
                                             <?php  
                                        $genderquery="SELECT * FROM genders";
                                        $genderret=mysqli_query($connection,$genderquery);
                                        $gendercount=mysqli_num_rows($genderret);

                                        for($i=0;$i<$gendercount;$i++) 
                                        { 
                                            $arr=mysqli_fetch_array($genderret);
                                            $GenderID=$arr['gender_id'];
                                            $GenderName=$arr['gender_name'];

                                            echo "<option value='$GenderID'>$GenderName</option>";
                                        }
                                             ?>
                                        </select>
                                           <div class="select-dropdown"> </div>
                                        </div>
                                    </div>
                                 </div>

                                   <div class="row row-space">
                                <div class="col-12">
                                    <div class="input-group">
                                        <label>Choose your image from gallery</label>
                                        <input class="input--style-1" type="file" placeholder="Choose Student Image" name="StudentImage" required>
                                    </div>
                                </div>
                            </div>

                                   <div class="row row-space">
                                <div class="col-12">
                                    <div class="input-group">
                                         <label>Choose your Student ID Card image from gallery</label>
                                        <input class="input--style-1" type="file" placeholder="Choose Student ID card" name="StudentidImages" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-12">
                                    <div class="input-group">
                                        <input class="input--style-1" type="text" placeholder="Address" name="txtStudentAddress" required>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-success" name="btnsignup" type="submit">Submit</button>
                                <button class="btn btn-danger" name="btncancel" type="cancel">Cancel</button>
                            </div>
                            <br>
                                <div class="text-center">
                                <label>Already have an account. Click<a href="index.php"> Here</a> to Login.</label>
                            </div>
                            <!-- hidden and disabled division start -->
                            <div hidden disabled>
                                <!-- global unique identifier data input -->
                        <div class="row row-space" >
                                <div class="col-12">
                                    <div class="input-group">
                                        <input class="input--style-1" type="text"name="txtStudentGuid" value="<?php $GUID = getGUID();echo $GUID;?>" >
                                    </div>
                                </div>
                            </div>
                            <!-- Account created date  -->
                            <div class="row row-space" en>
                                <div class="col-12">
                                    <div class="input-group">
                                        <input class="input--style-1" type="text" name="txtTodayDate" value="<?php echo date('Y-m-d H:i:sa')?>" >
                                    </div>
                                </div>
                            </div>
                            </div>
                            <!-- hidden and disabled division end -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
     
<!-- <?php
//connect to the footer site of the website.
// require('WebFooter.php');
?> -->


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