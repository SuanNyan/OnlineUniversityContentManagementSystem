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
session_start();
require('../config/connect.php');
require('WebHeader.php');
if(empty($_SESSION['guest'])&&empty($_SESSION['student_id']))
{
  header("location:403.php");

}
if(isset($_SESSION['faculty_id'])){
  $facultyid=$_SESSION['faculty_id'];
}
else{
   $facultyid=$_SESSION['guest'];
}
$magazineid=$_GET['magazineid'];
 $query=mysqli_query($connect,"Select count(a.article_id) as articles, m.name as magazine,f.name from articles a, students s,magazines m,faculties f WHERE a.student_id=s.student_id and m.magazine_id=a.magazine_id and s.faculty_id=f.faculty_id and s.faculty_id='$facultyid' and a.magazine_id='$magazineid'
                            ");
 $row=mysqli_fetch_assoc($query);
//for approve articles 

 $queryfornoapprove=mysqli_query($connect,"select count(a.is_approved) as approve from articles a, students s,magazines m,faculties f WHERE a.student_id=s.student_id and m.magazine_id=a.magazine_id and s.faculty_id=f.faculty_id and s.faculty_id='$facultyid' and a.magazine_id='$magazineid' and a.is_approved=1 ");

 $retnum=mysqli_fetch_assoc($queryfornoapprove);

?>
<div class="container py-3">
	<h4>Our Faculty Contributes total 
		<span class="badge badge-dark"><?php echo $row['articles']; ?> articles</span> 
<p class="font-weight-normal" style="font-size: 18px; ">
	for <?php echo $row['magazine'] ?> </h4>

  <i>Approved <?php echo $retnum['approve'] ?> out of <?php echo  $row['articles'];?></i>
</p>

 <table class="table table-bordered" id="table" >
  <thead>


    <tr>
      <th scope="col">#</th>
      <th scope="col">Student Name</th>
      <th scope="col">Article</th>
         <th scope="col">Image-1</th>
           <th scope="col">Image-2</th>



    </tr>
  </thead>
  <tbody>
    <?php $querystudent=mysqli_query($connect,"SELECT s.student_id_img_url,s.name as student, a.file_url as article, s.profile_img_url FROM `articles`a, students s WHERE a.student_id=s.student_id AND a.is_approved=1 and s.faculty_id='$facultyid' and a.magazine_id='$magazineid' ");

  while ($row=mysqli_fetch_assoc($querystudent)):
 ?>
    <tr>
      <th scope="row">~</th>
      <td><?php echo $row['student'] ?></td>
      <td><a href="../docs/<?php echo $row['article'] ?>">View Doc</a></td>
     
       	
       	
       </td>
         <td><a href="../img/<?php echo $row['profile_img_url'] ?>" target="_bash">View Profile</a></td>
         <td><a href="../img/<?php echo $row['student_id_img_url'] ?>" target="_bash">View ID Card</a></td>

    </tr>
   <?php endwhile; ?>
  </tbody>
</table>
		
</div>

 <?php 

include('WebFooter.php');

  ?>