
<?php 
   $connect=mysqli_connect('localhost','root','','ewsd');
if (isset($_GET['QID'])) 
{
    $MID=$_GET['QID'];
}
$insert="UPDATE staffs SET deleted_at=Now() where staff_id='$MID' ";
    $ret=mysqli_query($connect,$insert);
    if ($ret) 
    {
        echo "<script>alert('Fire Successful');</script>";
          echo "<script>window.location='Staffs_control.php'</script>";
    } 
    else 
    {
        echo mysqli_error($connect);
    }
   
    
   
 ?>x