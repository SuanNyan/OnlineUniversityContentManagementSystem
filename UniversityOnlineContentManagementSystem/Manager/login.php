<?php  
 
 include('connect.php');
session_start();
 $name=$_POST['name'];
 $password=$_POST['password'];

$query= mysqli_query($connect,"Select staff_id,name, password,role_id from staffs where 
 	name='$name' and password='$password'
 	");
$count=mysqli_num_rows($query);
$row=mysqli_fetch_assoc($query);
printf($count);
printf($row['role_id']);
if($count > 0){
	$_SESSION['role']=$row['role_id'];
	$_SESSION['staff']=$row['staff_id'];

	echo "<script>window.alert('Login Successful');</script>";
    echo "<script>window.location='dashboard.php'</script>";
}
else{
	echo "<script>window.alert('Credential Incorrect!');</script>";
    echo "<script>window.location='index.php'</script>";
}


// $name = $_POST['name'];  
// $password = $_POST['password'];  
// if($name == "Manager" and $password == "123") 
// 	{    
// 		$_SESSION['auth'] = true;    
// 		header("location: dashboard.php");  
// 	} 
// 	else 
// 		{    
// 			header("location: index.php");  
// 		} 
?>
 
