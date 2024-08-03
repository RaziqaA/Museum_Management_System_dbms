<html>
	<head align='center'>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin Insert Emp</title>
		<link rel="stylesheet" href="css/admin_insert_emp.css" />
		<link rel="stylesheet" href="E:/xampp/htdocs/Museum/fonts/fontawesome-free-5.10.2-web/css/all.min.css" />
	</head>
	
	<body style="background:url('images/subway.jpg') no-repeat; background-size: 100% 100%;">
	<center>
		<h2>CREATE EMPLOYEE</h2>
		<div class="data_insert_box">
			<form action="admin_insert_emp_code.php" method="POST">
				<table>
					<tr class="textbox">
						<td>STAFF ID : </td><td><input type="text" placeholder=" Enter StaffID" name="staffid" value="" required></td>
					</tr>
					<tr class="textbox">
						<td>DEPARTMENT ID : </td><td><select name="did" required>
														<option value="1">History</option>
														<option value="2">Zoology</option>
														<option value="3">Science and Space</option>
														<option value="4">Automobiles</option>
														<option value="5">Botany</option>
														<option value="6">Geography</option>
														</select>
													</td>
					</tr>
					<tr class="textbox">
						<td>NAME : </td><td><input type="text" placeholder=" Enter Name" name="name" value="" required></td>
					</tr>
					<tr class="textbox">
						<td>EMAIL : </td><td><input type="text" placeholder=" Enter Email" name="email" value="" required></td>
					</tr>
					<tr class="textbox">
						<td>COUNTRY : </td><td><input type="text" placeholder=" Enter Country" name="country" value="" required></td>
					</tr>
					<tr class="textbox">
						<td>PASSWORD : </td><td><input type="password" placeholder=" Enter Password" name="password" value="" required></td>
					</tr>
					<tr class="textbox">
						<td>PHONE : </td><td><input type="text" placeholder =" Enter Phone" name="phone" value="" required></td>
					</tr>
					<tr class="textbox">
						<td>D.O.B : </td><td><input type="date" placeholder=" Enter D.O.B" name="dob" value="" required></td>
					</tr>
					<tr class="textbox">
						<td>GENDER : </td><td><input type="text" placeholder=" Enter Gender" name="gender" value="" required></td>
					</tr>			
					<tr class="textbox">
						<td>JOB : </td><td><input type="text" placeholder=" Enter Job" name="job" value="" required></td>
					</tr>
					<tr>
						<td colspan=2><input class="btn" type="submit" value="Add"></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>