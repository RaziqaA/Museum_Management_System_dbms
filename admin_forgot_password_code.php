<?php
//taking all inputs

$adid = $_POST['ad_id'];
$email = $_POST['email'];
$new_pass = $_POST['pass_word'];
$con_new_pass = $_POST['con_pass_word'];

//check value is empty or not
if(!empty($adid) && !empty($email) && !empty($new_pass) && $new_pass!=null && !empty($con_new_pass))
{
	//creating connection
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
		//take out old password
		$SELECT = "SELECT * FROM admin Where ad_id = ? LIMIT 1";
		$UPDATE_PASS = "UPDATE admin SET pass_word = ? Where ad_id = ? LIMIT 1";
		
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s", $adid);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$old_pass = $row["pass_word"];
		
		if($adid == $row["ad_id"] && $email == $row["email"] && $new_pass==$con_new_pass){
			//updating
			$stmt->close();
			$stmt = $conn->prepare($UPDATE_PASS);
			$stmt->bind_param("ss", $new_pass, $adid);
			$stmt->execute();
			//check if updated successfully
			$stmt->close();
			$stmt = $conn->prepare($SELECT);
			$stmt->bind_param("s", $adid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if($row["pass_word"] == $old_pass){
				echo "<script>window.alert('Password unchanged')</script>";
			}
			else{
				echo "<script>window.alert('Password changed successfully')</script>";
			}
		}
		else{
			echo "<script>window.alert('Id or email incorrect')</script>";
		}
		
	}
	$stmt->close();
	$conn->close();
}
else
{
	echo "<script>window.alert('All fields are required')</script>";
	die();
}
?>