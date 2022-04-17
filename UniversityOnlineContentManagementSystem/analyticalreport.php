<?php 
require('config/connect.php');
function totalarticles()
{
	global $connect;

	$query=mysqli_query($connect,"Select count(aritcle_id) as articles from articles");

	
	
}


 ?>