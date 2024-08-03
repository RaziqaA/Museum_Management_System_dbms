<?php
session_start();
$paint_id = $_POST['id'];
$Did = $_POST['did'];
$ar_name = $_POST['artist_name'];
$year = $_POST['year'];
$material = $_POST['material'];
$title = $_POST['title'];
$style = $_POST['style'];
$type = $_POST['type'];

//code for value check
if(!empty($paint_id) && !empty($Did) && !empty($ar_name) && !empty($year) && !empty($title) && !empty($style) && !empty($type) && !empty($material))
{
	
	// create connection
	$conn = new mysqli("localhost", "root", "", "museumsys");
	
	if(mysqli_connect_error()){
		die('Connect Error(' . mysqli_connect_errno().')'.mysqli_connect_error());
	}
	else
	{
		$SELECT = "SELECT id From painting Where id = ? Limit 1";
		$INSERT = "INSERT INTO painting(id, Did, type, style, material_type, title, artist_name, year) VALUES (?,?,?,?,?,?,?,?)";
		
		//Prepare statement
		//checking if same id item exists or not
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s", $paint_id);
		$stmt->execute();
		$stmt->bind_result($paint_id);
		$stmt->store_result();
		$rnum = $stmt->num_rows;
		$stmt->close();
		
		if($rnum==0){
			//id does not exist so we can insert it safely
			$dtmt = $conn->prepare($INSERT);
			$dtmt->bind_param("ssssssss", $paint_id, $Did, $type, $style, $material, $title, $ar_name, $year);
			$dtmt->execute();
			$dtmt->close();
			$_SESSION['msg'] = "<script>window.alert('New painting inserted successfully')</script>";
			header("location: admin_check_logistics.php");
		}else{
			$_SESSION['msg'] = "<script>window.alert('Item already present with same paint ID.')</script>";
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