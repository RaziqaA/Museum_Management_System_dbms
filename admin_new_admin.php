<!DOCTYPE html>
<html>
	<head align='center'>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Create New Admin</title>
		<link rel="stylesheet" href="css/admin_new_admin.css" />
		<link rel="stylesheet" href="E:/xampp/htdocs/Museum/fonts/fontawesome-free-5.10.2-web/css/all.min.css" />
	</head>
	
	<body style="background:url(images/lbm.jpg) no-repeat; color:black; background-size: 100% 100%;">
	<center>
		<h2>CREATE ADMIN</h2>
		<div class="data_insert_box">
			<form action="admin_new_admin_code.php" method="POST">
				<table>
					<tr class="textbox">
						<td>NEW ID : </td><td><input type="text" placeholder=" Enter New ID" name="adid" value="" required></td>
					</tr>
					<tr class="textbox">
						<td>NAME : </td><td><input type="text" placeholder=" Enter Name" name="name" value="" required></td>
					</tr>
					<tr class="textbox">
						<td>EMAIL : </td><td><input type="text" placeholder=" Enter Email" name="email" value="" required></td>
					</tr>
					<tr class="textbox">
						<td>PHONE : </td><td><input type="text" placeholder=" Enter Phone" name="phone" value="" required></td>
					</tr>
					<tr class="textbox">
						<td>D.O.B : </td><td><input type="date" placeholder=" Enter D.O.B" name="dob" value="" required></td>
					</tr>
					<tr class="textbox">
						<td>GENGER : </td><td><input type="text" placeholder=" Enter Gender" name="gender" value="" required></td>
					</tr>
					<tr class="textbox">
						<td>NEW PASSWORD : </td><td><input type="password" placeholder=" Enter Password" name="password" value="" required></td>
					</tr>
					<tr>
						<td colspan='2'><input class="btn" type="submit" value="Add"></td>
					</tr>
				</table>	
			</form>
		</div>
	</body>
</html>