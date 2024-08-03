<?php
session_start();
$staffid = $_POST['staffid'];
$did = $_POST['did'];
$name = $_POST['name'];
$email = $_POST['email'];
$country = $_POST['country'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$job = $_POST['job'];
//code for value check
if(!empty($staffid) || !empty($did) || !empty($name) || !empty($email) || !empty($country) || !empty($password) || !empty($phone) || !empty($dob) || !empty($gender) || !empty($job))
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
		$SELECT = "SELECT staffid From staff Where staffid = ? Limit 1";
		$SELECT_DID = "SELECT Did from department Where Did = ? Limit 1";
		$INSERT = "INSERT INTO staff(staffid, Did, name, email, country, pass_word, phone, DOB, gender, job) VALUES (?,?,?,?,?,?,?,?,?,?)";
		
		//Prepare statement
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s", $staffid);
		$stmt->execute();
		$stmt->bind_result($staffid);
		$stmt->store_result();
		$rnum = $stmt->num_rows;
		//getting all available dids
		
		$stmt->close();
		$stmt = $conn->prepare($SELECT_DID);
		$stmt->bind_param("s", $did);
		$stmt->execute();
		$stmt->bind_result($did);
		$stmt->store_result();
		$dnum = $stmt->num_rows;
		
		if($rnum==0){
			if($dnum!=0){
				$stmt->close();
				$stmt = $conn->prepare($INSERT);
				$stmt->bind_param("ssssssssss", $staffid, $did, $name, $email, $country, $password, $phone, $dob, $gender, $job);
				$stmt->execute();
				$_SESSION['msg'] = "<script>window.alert('New record inserted successfully.')</script>";
				header("location: admin_menu.php");
			}else{
				$_SESSION['msg'] = "<script>window.alert('Department ID incorrect')</script>";
				header("location: admin_menu.php");
			}
		}else{
			$_SESSION['msg'] = "<script>window.alert('Someone already registered with this staffid')</script>";
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