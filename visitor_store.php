
	
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/visitor_store.css" />
		<link rel="stylesheet" href="E:/xampp/htdocs/Museum/fonts/fontawesome-free-5.10.2-web/css/all.min.css" />
	</head>
	
	<body style="background:url('images/muv.jpg') no-repeat; background-size:cover; background-attachment: fixed;">
		<center>
		<h1>VISITOR'S STORE</h1>
		<table>
			<tr>
				<th>Item Name</th>
				<th>Price</th>
			</tr>
			
			<?php
				$conn = mysqli_connect("localhost", "root", "", "museumsys");
				if($conn->connect_error){
					die("Connection failed:".$conn->connect_error);
				}
				$sql = "SELECT * FROM store_items";
				$result = $conn->query($sql);
				
				if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
						echo "<tr><td>".$row["item_name"]."</td><td>".$row["item_price"]."</td><td><input class='btn' type='submit' onclick=removeItem() name='submit' value='Buy Now'></td></tr>";
					}
					echo "</table>";
				}
				else{
					echo "<script>window.alert('No item for sale')</script>";
				}
				$conn->close();
			?>
		</table>
		<script type="text/javascript">
			function removeItem(){
				window.alert('Item bought');
			}
		</script>
		
	</body>
</html>