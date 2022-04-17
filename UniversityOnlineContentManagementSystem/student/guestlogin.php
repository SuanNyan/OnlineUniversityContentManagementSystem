<?php 
$faculty=$_POST['faculty'];
if($faculty==0){
   
   echo "<script>window.alert('Choose a faculty to view as guest!')</script>";
    echo "<script>window.location='index.php'</script>";
}
session_start();
$_SESSION['guest']=$faculty;

echo "<script>window.location='guestview.php'</script>";

?>