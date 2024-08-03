<?php
session_start();
$statue_id = $_POST['id'];
$Did = $_POST['did'];
$ar_name = $_POST['artist_name'];
$year = $_POST['year'];
$material = $_POST['material'];
$title = $_POST['title'];
$style = $_POST['style'];
$type = $_POST['type'];
$height = $_POST['height'];
$weight = $_POST['weight'];


//code for value check
if(!empty($statue_id) && !empty($Did) && !empty($ar_name) && !empty($year) && !empty($title) && !empty($style) && !empty($type) && !empty($material) && !empty($height) && !empty($weight))
{
	
	// create connection
	$conn = new mysqli("localhost", "root", "", "museumsys");
	
	if(mysqli_connect_error()){
		die('Connect Error(' . mysqli_connect_errno().')'.mysqli_connect_error());
	}
	else
	{
		$SELECT = "SELECT id From statue Where id = ? Limit 1";
		$INSERT = "INSERT INTO statue(id, Did, type, style, material, title, artist_name, year, height_in_m, weight_in_kg) VALUES (?,?,?,?,?,?,?,?,?,?)";
		
		//Prepare statement
		//checking if same id item exists or not
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s", $statue_id);
		$stmt->execute();
		$stmt->bind_result($statue_id);
		$stmt->store_result();
		$rnum = $stmt->num_rows;
		$stmt->close();
		
		if($rnum==0){
			//id does not exist so we can insert it safely
			$dtmt = $conn->prepare($INSERT);
			$dtmt->bind_param("ssssssssii", $statue_id, $Did, $type, $style, $material, $title, $ar_name, $year, $height, $weight);
			$dtmt->execute();
			$dtmt->close();
			$_SESSION['msg'] = "<script>window.alert('New statue inserted successfully.')</script>";
			header("location: admin_check_logistics.php");
		}else{
			$_SESSION['msg'] = "<script>window.alert('Item already present with same statue ID')</script>";
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