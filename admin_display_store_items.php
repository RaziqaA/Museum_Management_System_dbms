<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/admin_display_store_items.css" />
		<link rel="stylesheet" href="E:/xampp/htdocs/Museum/fonts/fontawesome-free-5.10.2-web/css/all.min.css">
		<title>Admin Display Store Items</title>
	</head>
	
	<body style="background:url('images/vad.jpg') no-repeat; background-size:cover;">
	<center>
		<h2 align="center">Items List</h2>
		<table>
			<tr>
				<th>Item Name</th>
				<th>Item ID</th>
				<th>Price</th>
			</tr>
			
			<?php
				$conn = mysqli_connect("localhost", "root", "", "museumsys");
				if($conn->connect_error){
					die("Connection failed:".$conn->connect_error);
				}
				
				$sql = "CALL showStoreItems()";
				$result = $conn->query($sql);
				
				if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
						echo "<tr><td>".$row["item_name"]."</td><td>".$row["item_id"]."</td><td>".$row["item_price"]."</td></tr>";
					}
					echo "</table>";
				}
				else{
					echo "<script>window.alert('No item to be displayed')</script>";
				}
				
				$conn->close();
			?>
		</table>
	</body>
</html>