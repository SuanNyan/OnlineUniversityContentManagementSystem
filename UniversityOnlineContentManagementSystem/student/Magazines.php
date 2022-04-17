<?php
session_start();
//connect to the database of the system.
require('connect.php');

if(empty($_SESSION['guest'])&&empty($_SESSION['student_id']))
{
  header("location:403.php");

}

// 
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
  </head>
  <body>
<?php
require('WebHeader.php');
?>
<FORM action="Magazines.php" method="POST" enctype="multipart/form-data">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-12 text-center heading-section ftco-animate">
            <h2 class="mb-4"><span></span> Magazines</h2>
            <p>Reading gives new way to life, Gives Different perspective to life....</p>
          </div>
          
        </div>
                
          <div class="row">
            
        
        <?php
        $date=date_create("",timezone_open("Asia/Yangon"));
$TodayDate=date_format($date,"Y-m-d H:i:sP");
        $select="SELECT * FROM magazines 
        WHERE final_closure_date>'$TodayDate'";
        $run=mysqli_query($connection,$select);
        $row=mysqli_num_rows($run);
        for ($i=0; $i <$row ; $i++) 
        { 
          $array=mysqli_fetch_array($run);
          $magazine_id=$array['magazine_id'];
          $magazinename=$array['name'];
          $magazinedescription=$array['description'];
          $magazineimage=$array['img_url'];
          $magazineyear=$array['academic_year'];
          $staffid=$array['staff_id'];
          $magazinecreatedate=$array['created_at'];


          ?>

            <div class="col-md-4 col-lg-4 course border border-2 m-1">
            <div class="img">
              <a href="FullMagazine.php?magazine_id=<?php echo  $magazine_id ?>">
                <img src="../img/<?php echo $array['img_url']?>" class="img">
              </a>
            </div>
            <div class="text pt-4">
              <p class="meta d-flex">
<!--                <span><i class="icon-user mr-2"></i>              <?php echo $array['staff_id']  ?></span> -->
                <span><i class="icon-table mr-2"></i><?php echo $array['name']  ?></span>
                <span><i class="icon-calendar mr-2"></i><?php echo $array['academic_year']  ?></span>
              </p>
              <h3><a href="#"><?php echo $array['name']  ?></a></h3>
              <p><?php echo $array['description']  ?></p>
              <p><a href="articlelist.php?magazineid=<?php echo $magazine_id ?>" class="btn btn-primary">View Articles <span class="ion-ios-arrow-round-forward"></span></a></p>
            </div>
          </div>

   
       
          

            <?php
            }
            ?>
             </div>

            </div>
          </div>
        </div>
			</div>


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
</FORM>
  </body>
</html>
