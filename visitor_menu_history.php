<?php
	$conn = new mysqli("localhost", "root", "", "museumsys");
	//connection created
	
	if($conn->connect_error){
		die("Connection failed:".$conn->connect_error);
	}
	else{
		$SELECT_DID = "CALL selectDepartment(1)";
	
		//executing query
		$result = $conn->query($SELECT_DID);
		if($result->num_rows == 1){
			$row = $result->fetch_assoc();
			$Did = $row['Did'];
			$Dname = $row['Dname'];
			$floor = $row['Floor'];
			//now we got all details of history department
		}
		else{
			echo "<script>window.alert('Department does not exist')</script>";
			exit();
		}
		$result->close();
	}
	$conn->close();
	//getting all model, statues, and painting details from the department
?>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/visitor_menu_history.css" />
		<link rel="stylesheet" href="E:/xampp/htdocs/Museum/fonts/fontawesome-free-5.10.2-web/css/all.min.css">
		<title>History Page</title>
	</head>
	
	<body>
	<center>
		<h2 align="center"><?php echo $Dname; ?></h2>
		<div class="welcome_block">
			<img src="images/glyp.jpg" alt="">
			<div class="general_desc" align="center">
				<p>The History Department</p>
			</div>
		</div>
		<p>We have varieties of items in the museum related to <?php echo $Dname; ?>.<br/>
			The History Department is located on <?php echo $floor; ?> floor.</p>
		
		<h3 align="center">MODELS</h3>
		<div class="show_items">
			<?php 
				$conn = new mysqli("localhost", "root", "", "museumsys");
				//connection created
	
				if($conn->connect_error){
					die("Connection failed:".$conn->connect_error);
				}
				$SELECT = "CALL selectModel($Did)";
				
				$result = $conn->query($SELECT);
				if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
							echo "<hr></hr>";
							echo "<div class='item_block'>";
							echo " Title : ".$row['title']."<br />";
							echo " Artist Name : ".$row['artist_name']."<br />";
							echo " Size : ".$row['size']."<br />";
							echo " Year : ".$row['year']."<br />";
							echo "</div>";
							echo "<hr></hr>";
					}
				}
				$result->close();
				$conn->close();
			?>
		</div>
		<h3 align="center">STATUES</h3>
		<div class="show_items">
			<?php 
				$conn = new mysqli("localhost", "root", "", "museumsys");
				//connection created
	
				if($conn->connect_error){
					die("Connection failed:".$conn->connect_error);
				}
				$SELECT = "CALL selectStatue($Did)";
				
				$result = $conn->query($SELECT);
				if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
							echo "<hr></hr>";
							echo "<div class='item_block'>";
							echo " Title : ".$row['title']."<br />";
							echo " Artist Name : ".$row['artist_name']."<br />";
							echo " Material : ".$row['material']."<br />";
							echo " Style : ".$row['style']."<br />";
							echo " Height : ".$row['height_in_m']." m <br />";
							echo " Weight : ".$row['weight_in_kg']." kg <br />";
							echo " Year : ".$row['year']."<br />";
							echo "</div>";
							echo "<hr></hr>";
					}
				}
				$result->close();
				$conn->close();
			?>
		</div>
		<h3 align="center">PAINTINGS</h3>
		<div class="show_items">
			<?php 
				$conn = new mysqli("localhost", "root", "", "museumsys");
				//connection created
	
				if($conn->connect_error){
					die("Connection failed:".$conn->connect_error);
				}
				$SELECT = "CALL selectPainting($Did)";
				
				$result = $conn->query($SELECT);
				if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
							echo "<hr></hr>";
							echo "<div class='item_block'>";
							echo " Title : ".$row['title']."<br />";
							echo " Artist Name : ".$row['artist_name']."<br />";
							echo " Style : ".$row['style']."<br />";
							echo " Material Type : ".$row['material_type']."<br />";
							echo " Year : ".$row['year']."<br />";
							echo "</div>";
							echo "<hr></hr>";
					}
				}
				$result->close();
			?>
		</div>
		
	</body>
</html>
<?php
	$conn->close();
?>