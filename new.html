<?php
session_start();
$event_name = $_POST['event_name'];
$did = $_POST['did'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$people = $_POST['people'];
//code for value check
if(!empty($event_name) && !empty($did) && !empty($start_date) && !empty($end_date) && !empty($people))
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
		$SELECT = "SELECT event_name From museum_events Where event_name = ? ";
		$SELECT_DID = "SELECT Did from department Where Did = ? ";
		$INSERT = "INSERT INTO museum_events(event_name, Did, date_start, date_end, people_involved) VALUES (?,?,?,?,?)";
		
		//Prepare statement check if event_name already exists
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s", $event_name);
		$stmt->execute();
		$stmt->bind_result($event_name);
		$stmt->store_result();
		$rnum = $stmt->num_rows;
		//getting all available dids checking if did is correct
		
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
				$stmt->bind_param("sssss", $event_name, $did, $start_date, $end_date, $people);
				$stmt->execute();
				$_SESSION['msg'] = "<script>window.alert('New event inserted successfully.')</script>";
				header("location: admin_menu.php");
			}else{
				$_SESSION['msg'] = "<script>window.alert('Department ID incorrect')</script>";
				header("location: admin_menu.php");
			}
		}else{
			$_SESSION['msg'] = "<script>window.alert('Someone already registered with this event name')</script>";
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