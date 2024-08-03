<?php
session_start();  //starting session
$error = '';	//variable to show error message

if(isset($_POST['submit'])){
	if(empty($_POST['staffid']) || empty($_POST['pass_word'])){
		$error = "ID or Password is invalid";
	}
	else{
		//define admin id and password
		$staffid = $_POST['staffid'];
		$pass_word = $_POST['pass_word'];
		
		$conn = mysqli_connect("localhost", "root", "", "museumsys");
		
		//query to fetch info of registered users
		$query = "SELECT staffid, pass_word FROM staff WHERE staffid = ? AND pass_word = ? LIMIT 1";
		
		//to protect sql injection for security 
		$stmt = $conn->prepare($query);
		$stmt->bind_param("ss", $staffid, $pass_word);
		$stmt->execute();
		$stmt->bind_result($staffid, $pass_word);
		$stmt->store_result();
		
		if($stmt->fetch())
		{
			$_SESSION['login_id'] = $staffid;
			header("location: employee_menu.php");
		}
		else{
			$error = "UserId or Password is invalid";
		}
		mysqli_close($conn);
	}
}

?>