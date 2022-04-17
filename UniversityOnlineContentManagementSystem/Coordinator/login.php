<?php  
 
 include('connect.php');
session_start();
 $name=$_POST['name'];
 $password=$_POST['password'];

$query= mysqli_query($connect,"Select faculty_id,staff_id,name, password,role_id from staffs where 
 	name='$name' and password='$password'
 	");
$count=mysqli_num_rows($query);
$row=mysqli_fetch_assoc($query);

if($count > 0){
		$_SESSION['faculty_id']=$row['faculty_id'];

	$_SESSION['role']=$row['role_id'];
	$_SESSION['staff']=$row['staff_id'];

	echo "<script>window.alert('Login Successful');</script>";
    echo "<script>window.location='index2.php'</script>";
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
 
