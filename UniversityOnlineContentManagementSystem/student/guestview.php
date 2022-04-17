<?php 
session_start();

include('WebHeader.php');
include('../config/connect.php');
if(empty($_SESSION['guest'])){
    echo "<script>window.alert('Please Select the faculty to view.')</script>";
    echo "<script>window.location='index.php'</script>";
}
else{
    $faculty=$_SESSION['guest'];
    $query=mysqli_query($connect,"Select name from faculties where faculty_id='$faculty'");
    $rowforfaculty=mysqli_fetch_assoc($query);
}
?>
<body>
    <div class="container my-3">

    <h4 class="text-center">Your are Viewing As Guest.</h4>
     <div class="row containers">
						<!-- show the magazines from the database -->
						<?php
							$show="SELECT * from magazines";
							$run=mysqli_query($connect,$show);
							$row=mysqli_num_rows($run);
							for ($i=0; $i<$row ; $i++) 
							{ 
							$array=mysqli_fetch_array($run);
						?>
						<div class="col-md-4 col-lg-4 course border border-2 ">
						<div class="img">
							<a href="FullMagazine.php?magazine_id=<?php echo $array['magazine_id'] ?>">
								<img src="../img/<?php echo $array['img_url']?>" class="img">
							</a>
						</div>
						<div class="text pt-4">
							<p class="meta d-flex">
<!-- 								<span><i class="icon-user mr-2"></i>							<?php echo $array['staff_id']  ?></span> -->
								<span><i class="icon-table mr-2"></i><?php echo $array['name']  ?></span>
								<span><i class="icon-calendar mr-2"></i><?php echo $array['academic_year']  ?></span>
							</p>
							<h3><a href="#"><?php echo $array['name']  ?></a></h3>
							<p><?php echo $array['description']  ?></p>
							<p><a href="Magazines.php" class="btn btn-primary">Go to Magazine Page</a></p>
						</div>
					</div>

		<?php
							}
						?>
				</div>
    </div>

</body>
<?php include('WebFooter.php'); ?>