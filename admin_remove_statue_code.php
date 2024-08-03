<?php
// Process delete operation after confirmation
session_start();
$statue_id = $_POST['id'];
if(!empty($statue_id)){
    // Include configuration
    $host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "museumsys";
	
	// create connection
	$link = new mysqli($host, $dbUsername, $dbPassword, $dbName);
    
    // Prepare a delete statement
    $DELETE = "DELETE FROM statue WHERE id = ? ";
    
    if(mysqli_connect_error()){
		die('Connect Error(' . mysqli_connect_errno().')'.mysqli_connect_error());
	}
	else{
		//Prepare a select statement to check after excute delete
		$SELECT = "SELECT id FROM statue WHERE id = ?";
		//checking if id exists or not
		$stmt = $link->prepare($SELECT);
		$stmt->bind_param("s", $statue_id);
		$stmt->execute();
		$stmt->bind_result($statue_id);
		$stmt->store_result();
		$rnum = $stmt->num_rows;
		$stmt->close();
		if($rnum==0){
			$_SESSION['msg'] = "<script>window.alert('No such ID exists')</script>";
			header("location: admin_check_logistics.php");
		}
		else{
			//now delete legally
			//executing delete
			$dtmt = $link->prepare($DELETE);
			$dtmt->bind_param("s", $statue_id);
			$dtmt->execute();
		
			//after delete check if any row of staff_id exists or not
			//execute select
			$dtmt->close();
			$stmt = $link->prepare($SELECT);
			$stmt->bind_param("s", $statue_id);
			$stmt->execute();
			$stmt->bind_result($statue_id);
			$stmt->store_result();
			$rnum = $stmt->num_rows;
		
			if($rnum!=0){
				$_SESSION['msg'] = "<script>window.alert('Delete fail. Try again')</script>";
				header("location: admin_check_logistics.php");
			}
			else{
				$_SESSION['msg'] = "<script>window.alert('Delete success')</script>";
				header("location: admin_check_logistics.php");
			}
			$stmt->close();
			$link->close();
		}
	}
} else{
    //check if id is present or not
	$_SESSION['msg'] = "<script>window.alert('Enter a statue ID to remove')</script>";
	die();
	header("location: admin_check_logistics.php");
}
?>