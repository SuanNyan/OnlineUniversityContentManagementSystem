<?php 

session_start();
if(empty($_SESSION['student_id'])
{
	echo "<script>window.location=403.php;</script>";
}
 ?>
