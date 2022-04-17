<?php
session_start();
//connect to the database of the system.
require('connect.php');
if(empty($_SESSION['student_id']))
{
    echo "<script>window.location='403.php'</script>";
}
$StudentGUID=$_SESSION['StudentGUID'];

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
<form action="MyArticle.php" method="POST" enctype="multipart/form-data">
			<div class="container">
				<div class="row justify-content-center  ">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class=""><span></span>My articles</h2>
            <p>You can watch the articles that you uploaded 


            </p>
          </div>
        </div>
                <div class="row">
          
        <?php
        $select="SELECT * FROM articles where StudentGUID='$StudentGUID'AND deleted_at is NULL";
        $run=mysqli_query($connection,$select);
        $row=mysqli_num_rows($run);
        if ($row<1) 
        {
          echo"<p class='text-center'>There is no article you have uploaded.</p>";
        }
        else
        {
        for ($i=0; $i <$row ; $i++) 
        { 
          $array=mysqli_fetch_array($run);
          $articleid=$array['article_id'];
          $articlename=$array['file_url'];
          $articleimage=$array['article_photo_url_1'];
          $staffid=$array['staff_id'];
          $articlecreatedate=$array['created_at'];


          ?>
          <div class="col-md-6 col-lg-4 ftco-animate" >
            <div class="blog-entry border border-1" >
              <a href="" class="p-5 m-3 d-flex align-items-end" >
              <img src="../img/<?php echo $articleimage?>">
              </a>
								<div class="meta-date text-center p-2">
                  <span class="day"></span>
                  <span class="mos">Month</span>
                  <span class="yr">Year</span>
                </div>
              <div class="text bg-white p-4">
                <p class="heading"><?php echo basename($articlename)?></p>
                <p></p>
                <div class="d-flex align-items-center mt-4">
                  <input type="text"  name="txtarticleid"  value="<?php echo $articleid;?>" disabled hidden >
	                <p class="ml-auto mb-0">

	                	<a href="StudentComment.php?article_id=<?php echo $articleid?>" class="meta-chat">
                      <span class=" icon-chat" style="font-size: 30px;"></span>
                    </a>
	                </p>
                </div>
                  <div class="text-center">
                    <button class="btn btn-success align-center" name="btnUpdate" type="submit">
                      <a  href="ArticleUpdate.php?article_id=<?php echo $articleid?>" style="color: white"">Update Article</a></button>
                    <button class="btn btn-outline-danger" name="btnDelete"type="cancel"><a href="StudentArticleDelete.php?article_id=<?php echo $articleid?>">Delete Article</a></button>
                    </div>
              </div>
            </div>
          </div>

            <?php
            }
          }
            ?>

            </div>
          </div>
        </div>
			</div>
		</section>


<?php
require('WebFooter.php');
?>



  <!-- loader -->
<!--   <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div> -->


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
