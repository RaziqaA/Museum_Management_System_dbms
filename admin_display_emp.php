<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/admin_display_emp.css" type="text/css"/>
		<link rel="stylesheet" href="E:/xampp/htdocs/Museum/fonts/fontawesome-free-5.10.2-web/css/all.min.css">
		<title>Admin Display Emp Details</title>
	</head>
	
	<body style="background:url(images/shd.jpg) no-repeat; background-size:cover;">
	<center>
		<h2 align="center" >Employee List</h2>
		<table>
			<tr>
				<th>Staff ID</th>
				<th>Department ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Country</th>
				<th>Password</th>
				<th>Phone</th>
				<th>D.O.B</th>
				<th>Gender</th>
				<th>Job</th>
				<th>Entry Time</th>
				<th>Exit Time</th>
			</tr>
			
			<?php
				$conn = mysqli_connect("localhost", "root", "", "museumsys");
				if($conn->connect_error){
					die("Connection failed:".$conn->connect_error);
				}
				
				$sql = "CALL showEmployees()";
				$result = $conn->query($sql);
				
				if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
						echo "<tr><td>".$row["staffid"]."</td><td>".$row["Did"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["country"]."</td><td>".$row["pass_word"]."</td><td>".$row["phone"]."</td><td>".$row["DOB"]."</td><td>".$row["gender"]."</td><td>".$row["job"]."</td><td>".$row["entry_time"]."</td><td>".$row["exit_time"]."</td></tr>";
					}
				}
				else{
					echo "<script>window.alert('No employee to be displayed')</script>";
				}
				
				$conn->close();
			?>
		</table>
	</body>
</html>