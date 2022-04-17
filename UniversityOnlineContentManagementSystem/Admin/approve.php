
<?php 
   $connect=mysqli_connect('localhost','root','','ewsd');
if (isset($_GET['QID'])) 
{
    $MID=$_GET['QID'];
}
$insert="UPDATE articles SET is_approved=1 where article_id= '$MID' ";
    $ret=mysqli_query($connect,$insert);
    if ($ret) 
    {
        echo "<script>alert('approve Successful');</script>";
          echo "<script>window.location='Magazines.php'</script>";
    } 
    else 
    {
        echo mysqli_error($connect);
    }
   
    
   
 ?>x