<?php
session_start();  //starting session
$error = '';	//variable to show error message

if(isset($_POST['submit'])){
	if(empty($_POST['ad_id']) || empty($_POST['pass_word'])){
		$error = "ID or Password is invalid";
	}
	else{
		//define admin id and password
		$ad_id = $_POST['ad_id'];
		$pass_word = $_POST['pass_word'];
		
		$conn = mysqli_connect("localhost", "root", "", "museumsys");
		
		//query to fetch info of registered users
		$query = "SELECT ad_id, pass_word FROM admin WHERE ad_id = ? AND pass_word = ? LIMIT 1";
		
		//to protect sql injection for security 
		$stmt = $conn->prepare($query);
		$stmt->bind_param("ss", $ad_id, $pass_word);
		$stmt->execute();
		$stmt->bind_result($ad_id, $pass_word);
		$stmt->store_result();
		
		if($stmt->fetch())
		{
			$_SESSION['login_id'] = $ad_id;
			header("location: admin_menu.php");
		}
		else{
			$error = "UserId or Password is invalid";
		}
		mysqli_close($conn);
	}
}

?>