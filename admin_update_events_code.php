<?php
	//getting values
	session_start();
	$ev_name = $_POST["event_name"];
	$start_date = $_POST["start_date"];
	$end_date = $_POST["end_date"];
	
	$conn = new mysqli("localhost", "root", "", "museumsys");
	
	if(mysqli_connect_error()){
		die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
	}
	else{
		
		//query for updating event details
		$UPDATE = "UPDATE museum_events SET date_start = ?, date_end = ? WHERE event_name = ? LIMIT 1";
		$SELECT = "SELECT * FROM museum_events WHERE event_name = ?";
		
		//check if event exists or not
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s", $ev_name);
		$stmt->execute();
		$stmt->store_result();
		$rnum = $stmt->num_rows;
		$stmt->close();
		
		if($rnum == 1){
			//event exists
			$stmt = $conn->prepare($UPDATE);
			$stmt->bind_param("sss", $start_date, $end_date, $ev_name);
			$stmt->execute();
			
			$_SESSION['msg'] = "<script>window.alert('Details for Event updated successfully')</script>";
			header("location: admin_menu.php");
		}
		else{
			$_SESSION['msg'] = "<script>window.alert('Event does not exist')</script>";
			header("location: admin_menu.php");
		}
		$stmt->close();
		$conn->close();
	}
?>