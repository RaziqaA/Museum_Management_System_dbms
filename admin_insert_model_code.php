<?php
session_start();
$model_id = $_POST['id'];
$Did = $_POST['did'];
$ar_name = $_POST['artist_name'];
$year = $_POST['year'];
$title = $_POST['title'];
$size = $_POST['size'];
$type = $_POST['type'];

//code for value check
if(!empty($model_id) && !empty($Did) && !empty($ar_name) && !empty($year) && !empty($title) && !empty($size) && !empty($type))
{
	
	// create connection
	$conn = new mysqli("localhost", "root", "", "museumsys");
	
	if(mysqli_connect_error()){
		die('Connect Error(' . mysqli_connect_errno().')'.mysqli_connect_error());
	}
	else
	{
		$SELECT = "SELECT id From model Where id = ? Limit 1";
		$INSERT = "INSERT INTO model(id, Did, size, type, title, artist_name, year) VALUES (?,?,?,?,?,?,?)";
		
		//Prepare statement
		//checking if same id item exists or not
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s", $model_id);
		$stmt->execute();
		$stmt->bind_result($model_id);
		$stmt->store_result();
		$rnum = $stmt->num_rows;
		$stmt->close();
		
		if($rnum==0){
			//id does not exist so we can insert it safely
			$dtmt = $conn->prepare($INSERT);
			$dtmt->bind_param("sssssss", $model_id, $Did, $size, $type, $title, $ar_name, $year);
			$dtmt->execute();
			$dtmt->close();
			$_SESSION['msg'] = "<script>window.alert('New model inserted successfully')</script>";
			header("location: admin_check_logistics.php");
		}else{
			$_SESSION['msg'] = "<script>window.alert('Item already present with same model id.')</script>";
			header("location: admin_check_logistics.php");
		}
		$conn->close();
	}
}
else{
	$_SESSION['msg'] = "<script>window.alert('All fields are required')</script>";
	die();
	header("location: admin_check_logistics.php");
}
?>