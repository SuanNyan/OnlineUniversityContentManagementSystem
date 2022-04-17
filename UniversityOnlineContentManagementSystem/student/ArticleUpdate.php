<?php
session_start();
//connect the database to the system.
require('connect.php');
$date=date_create("",timezone_open("Asia/Yangon"));
$TodayDate=date_format($date,"Y-m-d H:i");
if (isset($_GET['article_id'])) 
{
  $ArticleID=$_GET['article_id'];
  $select4="SELECT * from articles where article_id='$ArticleID'";
  $run4=mysqli_query($connection,$select4);
  $row4=mysqli_num_rows($run4);
  $array4=mysqli_fetch_array($run4);
  if ($row4<1) 
{
 echo "<script>window.alert('Warning:There is no article.')</script>";
}
else
{

}
}
 if(isset($_POST['btnUpdate']))  
 {

    $txtarticleid=$_POST['txtarticleid'];
//take the updated data from the data inputs.
  $StudentGUID=$_SESSION['StudentGUID'];

  //Article Upload Coding Start--------------------------
    $article1=$_FILES['article1']['name']; 
    $Folder2=".../doc/";

    $filename1=$article1; 

    $copied1=copy($_FILES['article1']['tmp_name'], $Folder2.$filename1);

    if(!$copied1) 
    {                                                               
        echo "<p>You need to insert the article file.</p>";
          echo "<script>window.location='MyArticle.php'</script>"; 
    }


// Student ID card Image Upload Coding End--------------------------


    $magazinequery1="SELECT m.*,a.* FROM magazines m,articles a where m.magazine_id=a.magazine_id and a.article_id='$txtarticleid'";
  $magazinerat1=mysqli_query($connection,$magazinequery1);
  $magazinecount1=mysqli_num_rows($magazinerat1);

    for($q=0;$q<$magazinecount1;$q++) 
  { 
     $arr2=mysqli_fetch_array($magazinerat1);
  $DeadlineDate=$arr2['final_closure_date'];

if ($DeadlineDate<$TodayDate) 
{
  echo "<script>window.alert('The upload time was expeired.')</script>";
   echo "<script>window.location='MyArticle.php'</script>";
}
 }
if (empty($_POST['checkit'])) 
{
echo"<script>window.alert('You need to agree terms and conditions deal with your upolad.')</script>";

} 

else
{
  $date=date_create("",timezone_open("Asia/Yangon"));

$TodayDate=date_format($date,"Y-m-d H:i");
$insert="UPDATE `articles` 
          SET`file_url`='$filename1',
          `StudentGUID`='$StudentGUID',
          `updated_at`='$TodayDate'
           WHERE article_id='$txtarticleid'";
        $run=mysqli_query($connection,$insert);
        if ($run) 
        {
          echo "<script>window.alert('You updated the articles successfully. Thanks for your artworks.')</script>";
           echo "<script>window.location='MyArticle.php'</script>";
        }
        else
{
 echo "<script>window.alert('Error in Article Update.')</script>";
  echo "<script>window.location='MyArticle.php'</script>";  
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
  </head>
</head>
 <body>
  <form action="ArticleUpdate.php" method="POST" enctype="multipart/form-data">
<?php
require('WebHeader.php');
?>
	<br>

                              <!--  -->

             <!--  -->
	<div class="container">

<!-- <p>Photo 1 Upload:</p>
<div class="input-group">
  <div class="custom-file">
    <input type="file" name="articleimages1" class="custom-file-input" id="inputGroupFile01" 
      aria-describedby="inputGroupFileAddon01">
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
      aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>
  </div>
<br> -->
    <div class="container" hidden disabled>
<p>Photo 3 Upload:</p>
<div class="input-group">
  <div class="custom-file">
    <input type="text" name="txtarticleid" value="<?php echo $array4['article_id']?>" class="custom-file-input" id="inputGroupFile01" 
      aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01" ><?php echo $array4['article_id'];?></label>
  </div>
</div>
  </div>
	<br>

  <div class="container">
<p>Article Upload:</p>
<div class="input-group">
  <div class="custom-file">
    <input type="file" name="article1" class="custom-file-input" id="inputGroupFile01" 
      aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>
  </div>
    <div class="container">
<div class="input-group" >
  <div class="custom-file">
    <input type="checkbox" name="checkit" value="1">
    <label><a href="Terms.php">Agree the Terms and Conditions</a></label>
  </div>
</div>
</div>
  <br>
	<div class="text-center">
<button class="btn btn-success align-center" name="btnUpdate" type="submit">Update</button>
<button class="btn btn-danger" type="cancel">Cancel</button>
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