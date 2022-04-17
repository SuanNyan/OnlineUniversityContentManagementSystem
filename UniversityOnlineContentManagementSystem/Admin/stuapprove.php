
<?php 
   $connect=mysqli_connect('localhost','root','','ewsd');
if (isset($_GET['QID'])) 
{
    $MID=$_GET['QID'];
}
$insert="UPDATE students SET created_at=Now() where student_id='$MID' ";
    $ret=mysqli_query($connect,$insert);
    if ($ret) 
    {
        echo "<script>alert('Approve Successful');</script>";
          echo "<script>window.location='Students_control.php'</script>";
    } 
    else 
    {
        echo mysqli_error($connect);
    }
   
    
   
 ?>