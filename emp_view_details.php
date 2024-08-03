<?php
session_start();
$logged_in_id = $_SESSION['login_id'];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/admin_display_emp.css" />
		<link rel="stylesheet" href="E:/xampp/htdocs/Museum/fonts/fontawesome-free-5.10.2-web/css/all.min.css">
		<title>Admin Display Emp Details</title>
	</head>
	
	<body style="background: url(images/dun1.jpg) no-repeat; background-size: cover;">
	<center>
		<h1 align="center">Your Details</h1>
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
				
				$sql = "SELECT * FROM staff WHERE staffid = '$logged_in_id' LIMIT 1";
				$result = $conn->query($sql);
				
				if($result->num_rows == 1){
					$row = $result->fetch_assoc();
					echo "<tr><td>".$row["staffid"]."</td><td>".$row["Did"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["country"]."</td><td>".$row["pass_word"]."</td><td>".$row["phone"]."</td><td>".$row["DOB"]."</td><td>".$row["gender"]."</td><td>".$row["job"]."</td><td>".$row["entry_time"]."</td><td>".$row["exit_time"]."</td></tr>";
					echo "</table>";
				}
				else{
					echo "<script>window.alert('No employee to be displayed')</script>";
				}
				$result->close();
				$conn->close();
			?>
		</table>
	</body>
</html>