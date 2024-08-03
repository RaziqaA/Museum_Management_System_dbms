<?php
	$conn = mysqli_connect("localhost", "root", "", "museumsys");
	if($conn->connect_error){
		die("Connection failed:".$conn->connect_error);
	}
	$sql = "SELECT * FROM museum_events";
	$result = $conn->query($sql);
	//getting all values in arrays
	if($result->num_rows > 0){
		$name = array();
		$did = array();
		$date_start = array();
		$date_end = array();
		$people = array();
		$i = 0;
		
		while($row = $result->fetch_assoc()){
			$name[$i] = $row["event_name"];
			$did[$i] = $row["Did"];
			$date_start[$i] = $row["date_start"];
			$date_end[$i] = $row["date_end"];
			$people[$i] = $row["people_involved"];
			$i=$i+1;
		}
		$i=0;
	}
	else{
		echo "<script>window.alert('No event available')</script>";
	}
	$conn->close();

?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/visitor_events_css.css" />
		<link rel="stylesheet" href="E:/xampp/htdocs/Museum/fonts/fontawesome-free-5.10.2-web/css/all.min.css" />
	</head>
	
	<body style="background: url(images/sdy.jpg) no-repeat; background-size: 100% 100%; background-attachment: fixed;">
	<center>
		
		<div class="events_list">
			<h2>MUSEUM EVENTS</h2>
			<nav>
			<ul>
				<li><div class="show_items">
					<?php 
						$i = 0;
						while(!empty($name[$i])){
							echo "<hr></hr>";
							echo "<div class='item_block'>";
							echo "<strong>".$name[$i]."</strong><br />";
							echo " Event Name : ".$name[$i]."<br />";
							echo " Start Date : ".$date_start[$i]."<br />";
							echo " End Date : ".$date_end[$i]."<br />";
							echo " People Involved : ".$people[$i]."<br />";
							echo "</div>";
							echo "<hr></hr>";
							$i = $i + 1;
						}
					?>
				</div></li>
			</ul>
			</nav>
		</div>
	</body>
</html>