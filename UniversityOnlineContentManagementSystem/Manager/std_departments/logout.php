<?php  
session_start();  
unset($_SESSION['auth']);  
header("location: http://localhost/manager%20View/index.php"); 
?>