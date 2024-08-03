<?php
session_start();
$logged_in_id = $_SESSION['login_id'];

//check if value exixts
if(!empty($logged_in_id)){
	//create connection
	
	$conn = new mysqli("localhost", "root", "", "museumsys");
	
	if(mysqli_connect_error()){
		die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
	}
	else{
		//getting new values to be updated
		$name = $_POST['name'];
		$email = $_POST['email'];
		$country = $_POST['country'];
		$password = $_POST['password'];
		$phone = $_POST['phone'];
		$dob = $_POST['dob'];
		
		//query for updating values
		$UPDATE = "UPDATE staff SET name=?, email=?, country=?, pass_word=?, phone=?, DOB=? WHERE staffid=? LIMIT 1";
		
		$stmt = $conn->prepare($UPDATE);
		$stmt->bind_param("sssssss", $name, $email, $country, $password, $phone, $dob, $logged_in_id);
		$stmt->execute();
		$_SESSION['msg'] = "<script>window.alert('Details updated successfully.')</script>";
		header("location: employee_menu.php");
	}
	$stmt->close();
	$conn->close();
}
else{
	$_SESSION['msg'] = "<script>window.alert('Login ID not present')</script>";
	header('location: employee_menu.php');
}
?>