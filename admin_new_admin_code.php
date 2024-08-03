<?php
session_start();
$adid = $_POST['adid'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$password = $_POST['password'];

//code for value check
if(!empty($adid) || !empty($name) || !empty($email) || !empty($phone) || !empty($dob) || !empty($gender) || !empty($password))
{
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "museumsys";
	
	// create connection
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
	
	if(mysqli_connect_error()){
		die('Connect Error(' . mysqli_connect_errno().')'.mysqli_connect_error());
	}
	else
	{
		$SELECT = "SELECT ad_id From admin Where ad_id = ? Limit 1";
		$INSERT = "INSERT INTO admin(ad_id, ad_name, email, phone, DOB, gender, pass_word) VALUES (?,?,?,?,?,?,?)";
		
		//Prepare statement
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s", $adid);
		$stmt->execute();
		$stmt->bind_result($adid);
		$stmt->store_result();
		$rnum = $stmt->num_rows;
		
		if($rnum==0){
			$stmt->close();
			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("sssssss", $adid, $name, $email, $phone, $dob, $gender, $password);
			$stmt->execute();
			$_SESSION['msg'] = "<script>window.alert('New admin created successfully.')</script>";
			header("location: admin_menu.php");
		}else{
			$_SESSION['msg'] = "<script>window.alert('Admin with same ID already exists.')</script>";
			header("location: admin_menu.php");
		}
		$stmt->close();
		$conn->close();
	}
}
else{
	$_SESSION['msg'] = "<script>window.alert('All fields are required')</script>";
	die();
	header("location: admin_menu.php");
}
?>