<?php
session_start();
//connect the database to the system.
require('connect.php');
if(empty($_SESSION['student_id']))
{
    echo "<script>window.location='403.php'</script>";
}
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php'; 
$date=date_create("",timezone_open("Asia/Yangon"));
$TodayDate=date_format($date,"Y-m-d H:i");

if(isset($_POST['btnUpload']))
{
  $magazineid=$_POST['magazineid'];
  $StudentGUID=$_SESSION['StudentGUID'];
  $student_id=$_SESSION['student_id'];
      $magazinequery1="SELECT * FROM magazines where magazine_id='$magazineid'";
  $magazinerat1=mysqli_query($connection,$magazinequery1);
  $magazinecount1=mysqli_num_rows($magazinerat1);

    for($q=0;$q<$magazinecount1;$q++) 
  { 
     $arr2=mysqli_fetch_array($magazinerat1);
  $DeadlineDate=$arr2['closure_date'];

if ($DeadlineDate<=$TodayDate) 
{
  echo "<script>window.alert('The upload time was expeired.')</script>";
   echo "<script>window.location='Magazines.php'</script>";
}
 }
   //Image 1 Upload Coding Start--------------------------
    $articleimages=$_FILES['articleimages1']['name']; 
    $Folder="../img/";

    $filename1=$articleimages; 

    $copied1=copy($_FILES['articleimages1']['tmp_name'], $Folder.$filename1);

    if(!$copied1) 
    {                                                               
        echo "<p>Error in Image1 Upload...</p>";
        exit();
    }
//Image 1 Upload Coding End--------------------------
   //Image 2 Upload Coding Start--------------------------
    $articleimages1=$_FILES['articleimages2']['name']; 
    $Folder="../img/";

    $filename2=$articleimages1; 

    $copied2=copy($_FILES['articleimages2']['tmp_name'], $Folder.$filename2);

    if(!$copied2) 
    {                                                               
        echo "<p>Error in Image2 Upload...</p>";
        exit();
    }
//Image 2 Upload Coding End--------------------------

   //Image 3 Upload Coding Start--------------------------
    $articleimages2=$_FILES['articleimages3']['name']; 
    $Folder="../img/";

    $filename3=$articleimages2; 

    $copied3=copy($_FILES['articleimages3']['tmp_name'], $Folder.$filename3);

    if(!$copied3) 
    {                                                               
        echo "<p>Error in Image3 Upload...</p>";
        exit();
    }
//Image 3 Upload Coding End--------------------------
   //Article Upload Coding Start--------------------------
    $article1=$_FILES['txtarticle']['name']; 
    $Folder="../docs/";

    $articlefile=$article1; 

    $copied4=copy($_FILES['txtarticle']['tmp_name'],$Folder.$articlefile);

    if(!$copied4) 
    {                                                               
        echo "<p>Error in article Upload...</p>";
        exit();
    }
//Article Upload Coding End--------------------------  


if (empty($_POST['checkit'])) 
{
echo"<script>window.alert('You need to agree terms and conditions deal with your upolad.')</script>";

} 

else
{
$insert="INSERT INTO `articles`
        (`magazine_id`, `file_url`, `article_photo_url_1`, `article_photo_url_2`, `article_photo_url_3`, `student_id`, `StudentGUID`,`created_at`)

          VALUES
          ('$magazineid','$articlefile','$filename1','$filename2','$filename3','$student_id','$StudentGUID','$TodayDate')";
        $run=mysqli_query($connection,$insert);
        if($run) 
        {
          echo "<script>window.alert('You uploaded the arts and articles successfully. Thanks for your artworks.')</script>";
           // echo "<script>window.location='Articleupload.php'</script>";
        
        $mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['btnUpload']))

{
  


  $name = $_POST['name'];
  $email = $_POST['email'];

  try{

    $faculty_id=$_SESSION['faculty_id'];
  $selectemail=mysqli_query($connection,"Select email from staffs where faculty_id='$faculty_id'  ");

  while ($row=mysqli_fetch_assoc($selectemail)){
    $sentemail=$row['email'];
    printf($sentemail);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'Marcusewsd@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'Marcus@12345'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('Marcusewsd@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress($sentemail); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Message Received.New Article Arrived!!!';
    $mail->Body = "<h3>Name : $name <br>Email: $email <br>Message : $name has make a new contribution.</h3>";

    $mail->send();
  }

  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}
}
else
{
 echo mysqli_error($connection) ;
  echo "<script>window.location='ArticleUpload.php'</script>";  
}
}
}

?>

<!DOCTYPE html>
<html>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">

  </head>
</head>
 <body>


  <form action="ArticleUpload.php" method="POST" enctype="multipart/form-data">
<?php
require('WebHeader.php');
?>
  <br>
  <br>
  <br>
                              <!--  -->
    <div class="container">
  <div class="row row-space">
      <div class="col-12">
          <div class="input-group">
          <select class="form-control" name="magazineid" >
   <!-- show the gender data from the database -->
                                             <?php  

                                        $magazinequery="SELECT * FROM magazines where final_closure_date>='$TodayDate'";
                                        $magazinerat=mysqli_query($connection,$magazinequery);
                                        $magazinecount=mysqli_num_rows($magazinerat);

                                        for($x=0;$x<$magazinecount;$x++) 
                                        { 
                                            $arr1=mysqli_fetch_array($magazinerat);
                                            $Magazineid=$arr1['magazine_id'];
                                            $MagazineName=$arr1['name'];

                                            echo "<option value='$Magazineid'>$MagazineName</option>";
                                        }
                                             ?>
                                        </select>
                                            <div class="select-dropdown"></div>
                                    </div>
                                </div>
    </div>
  </div>
  <br>
                            <!--  -->
  <div class="container">

<p>Photo 1 Upload:</p>
<div class="input-group">
  <div class="custom-file">
    <input type="file" name="articleimages1" class="custom-file-input" id="inputGroupFile01" 
      aria-describedby="inputGroupFileAddon01" required>
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>
  </div>
<br>
    <div class="container">
      <p>Photo 2 Upload:</p>
<div class="input-group">
  <div class="custom-file">
    <input type="file" name="articleimages2" class="custom-file-input" id="inputGroupFile01" 
      aria-describedby="inputGroupFileAddon01" required>
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>
  </div>
<br>
    <div class="container">
<p>Photo 3 Upload:</p>
<div class="input-group">
  <div class="custom-file">
    <input type="file" name="articleimages3" class="custom-file-input" id="inputGroupFile01" 
      aria-describedby="inputGroupFileAddon01" required>
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>
  </div>
  <br>

  <div class="container">
<p>Article Upload:</p>
<div class="input-group">
  <div class="custom-file">
    <input type="file" name="txtarticle" class="custom-file-input" id="inputGroupFile01" 
      aria-describedby="inputGroupFileAddon01" required>
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>
  </div>
  <br>
    <div class="container">
<div class="input-group" >
  <div class="custom-file">
    <input type="checkbox" name="checkit" value="1">
    <label><a href="Terms.php">Agree the Terms and Conditions</a></label>
  </div>
</div>
</div>
  <br>

  <div disabled hidden>
              <input type="text" name="name"value="<?php echo $_SESSION['name'];?>" required>
          <input type="email" name="email" value="<?php echo $_SESSION['email'];?>" required>
          
  </div>
  <div class="text-center">
<button class="btn btn-success align-center" name="btnUpload" value="send" type="submit">Upload</button>
<button type="reset" class="btn btn-danger" type="cancel">Cancel</button>
</div>
<br>
<br>
<br>
<?php
require('WebFooter.php');
?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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
    </form>
</body>
</html>