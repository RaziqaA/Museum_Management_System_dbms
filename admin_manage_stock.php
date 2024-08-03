<html>
	<head align='center'>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin Manage Stock</title>
		<link rel="stylesheet" href="css/admin_manage_stock_css.css" />
		<link rel="stylesheet" href="E:/xampp/htdocs/Museum/fonts/fontawesome-free-5.10.2-web/css/all.min.css" />
	</head>
	
	<body style="background:url('images/sdi.jpg') no-repeat; background-size:cover;">
	<center>
		<h2 align="center">Stocks List</h2>
		<table>
			<tr>
				<th>Object ID</th>
				<th>Departmment ID</th>
				<th>Arstist Name</th>
				<th>Year</th>
				<th>Title</th>
				<th>Type</th>
			</tr>
			
			<?php
				$conn = mysqli_connect("localhost", "root", "", "museumsys");
				if($conn->connect_error){
					die("Connection failed:".$conn->connect_error);
				}
				$sql = "CALL showObjects()";
				$result = $conn->query($sql);
				
				if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
						echo "<tr><td>".$row["id"]."</td><td>".$row["Did"]."</td><td>".$row["artist_name"]."</td><td>".$row["year"]."</td><td>".$row["title"]."</td><td>".$row["type"]."</td></tr>";
					}
				}
				else{
					echo "<script>window.alert('No object in stock')</script>";
				}
				
				$conn->close();
				
			?>
		</table>
	</body>
</html>