<?php
session_start();
$name = $_POST['name'];
$itemid = $_POST['itemid'];
$price = $_POST['price'];

//code for value check
if(!empty($itemid) || !empty($name) || !empty($price))
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
		$SELECT = "SELECT item_id From store_items Where item_id = ? Limit 1";
		$INSERT = "INSERT INTO store_items(item_name, item_id, item_price) VALUES (?,?,?)";
		
		//Prepare statement
		//checking if same id item exists or not
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s", $itemid);
		$stmt->execute();
		$stmt->bind_result($itemid);
		$stmt->store_result();
		$rnum = $stmt->num_rows;
		$stmt->close();
		
		if($rnum==0){
			//id does not exist so we can insert it safely
			$dtmt = $conn->prepare($INSERT);
			$dtmt->bind_param("ssi", $name, $itemid, $price);
			$dtmt->execute();
			$dtmt->close();
			$_SESSION['msg'] = "<script>window.alert('New item inserted successfully')</script>";
			header("location: admin_menu.php");
		}else{
			$_SESSION['msg'] = "<script>window.alert('Item already present with same item ID')</script>";
			header("location: admin_menu.php");
		}
		$conn->close();
	}
}
else{
	$_SESSION['msg'] = "<script>window.alert('All fields are required')</script>";
	die();
	header("location: admin_menu.php");
}
?>