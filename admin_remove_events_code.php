<?php
// Process delete operation after confirmation
session_start();
$event_name = $_POST['event_name'];
if(!empty($event_name)){
    // Include configuration
    $host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "museumsys";
	
	// create connection
	$link = new mysqli($host, $dbUsername, $dbPassword, $dbName);
    
    // Prepare a delete statement
    $DELETE = "DELETE FROM museum_events WHERE event_name = ? ";
    
    if(mysqli_connect_error()){
		die('Connect Error(' . mysqli_connect_errno().')'.mysqli_connect_error());
	}
	else{
		//Prepare a select statement to check after excute delete
		$SELECT = "SELECT event_name FROM museum_events WHERE event_name = ? ";
		//checking if event exists or not
		$stmt = $link->prepare($SELECT);
		$stmt->bind_param("s", $event_name);
		$stmt->execute();
		$stmt->bind_result($event_name);
		$stmt->store_result();
		$rnum = $stmt->num_rows;
		$stmt->close();
		if($rnum==0){
			$_SESSION['msg'] = "<script>window.alert('No such event exists')</script>";
			header("location: admin_menu.php");
		}
		else{
			//now delete legally
			//executing delete
			$dtmt = $link->prepare($DELETE);
			$dtmt->bind_param("s", $event_name);
			$dtmt->execute();
		
			//after delete check if any row of event exists or not
			//execute select
			$dtmt->close();
			$stmt = $link->prepare($SELECT);
			$stmt->bind_param("s", $event_name);
			$stmt->execute();
			$stmt->bind_result($event_name);
			$stmt->store_result();
			$rnum = $stmt->num_rows;
		
			if($rnum!=0){
				$_SESSION['msg'] = "<script>window.alert('Delete unsuccessful. Try again.')</script>";
				header("location: admin_menu.php");
			}
			else{
				$_SESSION['msg'] = "<script>window.alert('Delete successful')</script>";
				header("location: admin_menu.php");
			}
			$stmt->close();
			$link->close();
		}
	}
} else{
    //check if id is present or not
	$_SESSION['msg'] = "<script>window.alert('Enter a Event name to remove')</script>";
	die();
	header("location: admin_menu.php");
}
?>