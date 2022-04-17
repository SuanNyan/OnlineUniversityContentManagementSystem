<?php  
//call the session function for the system.
session_start();
require('connect.php');
require('passwordfun.php');


  if(!(isset($_SESSION["StudentGUID"]))) 
  {
    echo "<script>

                    window.location='403.php';
    </script>";
   
}

// check the condition if the user click  cancel button
if (isset($_POST['btncancel'])) 
{
echo "<script>window.alert('You cancel the process of registration.')</script>";
echo"<script>window.location='StudentProfile.php'</script>";
}
if(isset($_GET['StudentGUID'])) 
{
    $StudentGUID=$_GET['StudentGUID'];

    $query="SELECT * 
            FROM students 
            WHERE StudentGUID='$StudentGUID'";
    $ret=mysqli_query($connection,$query);
    $count=mysqli_num_rows($ret);
    $rows=mysqli_fetch_array($ret);
if ($count<1) 
{
 echo "<script>window.alert('Error:There is no Student.')</script>";
 echo "<script>window.location='StudentProfile.php'</script>";
}
}

if(isset($_POST['btnUpdate'])) 
    {
//take the updated data from the data inputs.
 $date=date_create("",timezone_open("Asia/Yangon"));
$txtStudentGUID=$_SESSION['StudentGUID'];
$txtStudentName=$_POST['txtStudentName'];
$txtStudentEmail=$_POST['txtStudentEmail'];
$carrypassword=$_POST['txtStudentPassword'];

if ($carrypassword=='') {
   $txtStudentPassword=$_SESSION['password'];

}
$unhashpassword=$_POST['txtStudentPassword'];
$txtStudentPassword=checkandHash($unhashpassword);
$txtGenderid=$_POST['txtGenderid'];
$txtStudentBirthday=$_POST['txtStudentBirthday'];

$txtFacultyid=$_POST['txtFacultyid'];
$txtStudentAddress=$_POST['txtStudentAddress'];
$txtStudentBirthday=$_POST['txtStudentBirthday'];
$txtTodaydate=date_format($date,"Y-m-d H:i") ;

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

    $filename1=$StudentidImages; 

    $copied1=copy($_FILES['StudentidImages']['tmp_name'],$folder.$filename1);

    if(!$copied1) 
    {                                                               
        echo "<p>Error in Image Upload...</p>";
        exit();
    }
//Student ID card Image Upload Coding End--------------------------

    $Update="UPDATE `students`
             SET name='$txtStudentName',
             email='$txtStudentEmail',
             password='$txtStudentPassword',
             faculty_id='$txtFacultyid',
             profile_img_url='$filename',
             student_id_img_url='$filename1',
            dob='$txtStudentBirthday',
             address='$txtStudentAddress',
             gender_id='$txtGenderid',
                updated_at='$txtTodaydate'
             WHERE StudentGUID='$txtStudentGUID'";
    $ret1=mysqli_query($connection,$Update);

    if($ret1) //True
    {
        echo "<script>window.alert('Success : Your updated your profile successfully. You will see your new password when you login again to the website.')</script>";
        echo "<script>window.location='StudentProfile.php'</script>";
    }
    else
    {
        echo "<p>Error in Your Update!" . mysqli_error($connection) . "</p>";
    }

}
if(isset($_POST['btndelete'])) 
    {
        $date=date_create("",timezone_open("Asia/Yangon"));
        $txtStudentGUID=$_SESSION['StudentGUID'];
        $txtTodaydate=date_format($date,"Y-m-d H:i:sP") ;
    $delete="UPDATE `students`
             SET 
             is_approved='0',
             deleted_at='$txtTodaydate'
             WHERE StudentGUID='$txtStudentGUID'
             ";
    $ret2=mysqli_query($connection,$delete);

    if($ret2) //True
    {
        echo "<script>window.alert('Success : You have parmently deleted your account of this website. ')</script>";
        echo "<script>window.location='StudentLogin.php'</script>";
    }
    else
    {
        echo "<p>Error in Account Delete!" . mysqli_error($connection) . "</p>";
    }

}

?>
<!--php code end-->
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
<form action="StudentUpdate.php" method="POST" enctype="multipart/form-data">
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
                        <h1 class="title">Your Account Update</h1>
                        <form method="POST">

                                   <div class="row row-space">
                                <div class="col-12">
                                    <div class="input-group">
                                        <label>Choose your profile image from gallery</label>
                                        <input class="input--style-1" type="file" placeholder="Choose Student Image" name="StudentImage" required >
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="input-group">
                                <input class="input--style-1" type="text" placeholder="Student Name(not username)"  name="txtStudentName" value="<?php echo $_SESSION['name']?>">
                            </div>
                            <!--  -->
<!--                              <div class="input-group">
                              <input class="input--style-1" type="text" placeholder="Student UserName"  name="txtStudentUsername" value="<?php echo $_SESSION['username']?>">

                            </div> -->
                            <!--  -->
                            <div class="row row-space">
                                <div class="col-5">
                                    <div class="input-group">
                                        <input class="input--style-1" type="email" placeholder="Email"  name="txtStudentEmail" value="<?php echo $_SESSION['email']?>">
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="row row-space">
                                <div class="col-12">
                                    <div class="input-group">
                                          <select class="form-control" name="txtFacultyid" >
                                            
<!--                                                 <?php
                                        $facultyid=$_SESSION['faculty_id'];
                                        $select="SELECT * from faculties
                                                 Where faculty_id='$facultyid'";
                                        $run=mysqli_query($connection,$select);
                                        $row=mysqli_num_rows($run);
                                        for ($i=0; $i <$row ; $i++) 
                                        { 
                                            $array=mysqli_fetch_array($run);
                                            $faculty_names=$array['faculty_name'];
                                            $faculty_ids=$array['faculty_id'];
                                           echo "<option disabled='disabled' selected='selected'>$faculty_names</option>";
                                        }

                                         ?> -->
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
                            </div>
                            <!--  -->
                            <div class="row row-space">
                                <div class="col-12">
                                    <div class="input-group">
                                          <select class="form-control" name="txtGenderid"  >

<!--                                                <?php 
                                        $genderid=$_SESSION['gender_id'];
                                        $select2="SELECT * from genders
                                                 Where gender_id='$genderid'";
                                        $run2=mysqli_query($connection,$select2);
                                        $row2=mysqli_num_rows($run2);
                                        for ($j=0; $j <$row2 ; $j++) 
                                        { 
                                            $array2=mysqli_fetch_array($run2);
                                            $genderid= $array2['gender_id'];
                                            $gendername=$array2['gender_name'];
                                            echo "<option disabled='disabled' selected='selected'>$gendername</option>";
                                        }
                                        ?> -->
                                             <!-- show the gender data from the database -->
                                             <?php  
                                        $genderquery="SELECT * FROM genders";
                                        $genderret=mysqli_query($connection,$genderquery);
                                        $gendercount=mysqli_num_rows($genderret);

                                        for($y=0;$y<$gendercount;$y++) 
                                        { 
                                            $arr3=mysqli_fetch_array($genderret);
                                            $genderID=$arr3['gender_id'];
                                            $genderName=$arr3['gender_name'];

                                            echo "<option value='$genderID'>$genderName</option>";
                                        }
                                             ?>
                                        </select>
                                            <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                                <!--  -->
                                   <div class="row row-space">
                                <div class="col-12">
                                    <div class="input-group">
                                         <label>Choose your Student ID Card image from gallery</label>
                                        <input class="input--style-1" type="file" placeholder="Choose Student ID card" name="StudentidImages" required>
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="row row-space">
                                <div class="col-12">
                                    <div class="input-group">
                                       <input class="input--style-1" type="date" placeholder="Birthday"  name="txtStudentBirthday" value="<?php echo $_SESSION['dob']?>">
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                              <div class="row row-space">
                                <div class="col-12">
                                    <div class="input-group">
                                       <input class="input--style-1" type="text" placeholder="Password"  name="txtStudentPassword" value="">
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                           <div class="row row-space">
                                <div class="col-12">
                                    <div class="input-group">
                                       <input class="input--style-1" type="text" placeholder="Address"  name="txtStudentAddress" value="<?php echo $_SESSION['address']?>">
                                    </div>
                                </div>
                            </div>
                            <!--  -->
<!--                             <div class="row row-space" disabled hidden>
                                <div class="col-12">
                                    <div class="input-group">
                                         <label>Acc Updated Date</label>
                                        <input class="input--style-1" type="text" placeholder="Updated Date" name="" value="<?php date('Y-m-d H:i:sa') ?>" required disabled hidden>
                                    </div>
                                </div>
                            </div> -->
                            <!--  -->
                            <div class="text-center">
                                <button class="btn btn-success" name="btnUpdate" type="submit">Update Info</button>
                                <button class="btn btn-danger" name="btndelete" type="submit">Delete Your Account</button>
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