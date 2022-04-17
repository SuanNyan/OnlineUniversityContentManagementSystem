<?php  
session_start();  
unset($_SESSION['role']);  
unset($_SESSION['staff_id']);  

echo "<script>window.alert('Logout Successful');</script>";
    echo "<script>window.location='index.php'</script>";
?>