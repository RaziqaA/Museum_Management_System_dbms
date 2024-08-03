<?php
session_start();
$logged_in_id = $_SESSION['login_id'];

//check if value exists
if(!empty($logged_in_id)){
	//create connection
	
	$conn = new mysqli("localhost", "root", "", "museumsys");
	
	if(mysqli_connect_error()){
		die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
	}
	else{
		//getting system date and time
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d H:i:s');
		
		//query for updating date and time
		$UPDATE = "UPDATE staff SET exit_time = ? WHERE staffid = ? LIMIT 1";
		
		$stmt = $conn->prepare($UPDATE);
		$stmt->bind_param("ss", $date, $logged_in_id);
		$stmt->execute();
		$_SESSION['msg'] = "<script>window.alert('Exit Date and Time Updated successfully')</script>";
		header('location: employee_menu.php');
	}
	$stmt->close();
	$conn->close();
}
else{
	$_SESSION['msg'] = "<script>window.alert('Login ID not present')</script>";
	header('location: employee_menu.php');
}
?>