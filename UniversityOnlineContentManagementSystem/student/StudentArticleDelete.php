<?php
session_start();
//connect to the database of the system.
require('connect.php');
$StudentGUID=$_SESSION['StudentGUID'];
$date=date_create("",timezone_open("Asia/Yangon"));
$TodayDate=date_format($date,"Y-m-d H:i");
if(isset($_GET['article_id'])) 
    {
    $txtarticleid=$_GET['article_id'];


    $Update="UPDATE`articles`
              SET `is_approved`='0'
              ,`deleted_at`='$TodayDate'
              WHERE article_id='$txtarticleid'";

    $ret2=mysqli_query($connection,$Update);

    if($ret2) //True
    {
        echo "<script>window.alert('Success : You have parmently deleted your article. ')</script>";
        echo "<script>window.location='MyArticle.php'</script>";
    }
    else
    {
        echo "<p>Error in Account Delete!" . mysqli_error($connection) . "</p>";
    }

}
?>
