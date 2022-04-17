<?php 


session_start();
if(empty($_SESSION['role'])){
	
	echo "<script>alert('Please Login First!')</script>";
	echo "<script>window.location='index.php'</script>";
}
else if ($_SESSION['role']==1)
{
	echo "<script>window.location='403.php'</script>";
}
else if($_SESSION['role']==3){
	echo "<script>window.location='403.php'</script>";
}

 ?>