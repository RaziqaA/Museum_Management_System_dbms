<html>
	<head align='center'>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin Remove Statue</title>
		<link rel="stylesheet" href="css/admin_remove_statue.css" />
		<link rel="stylesheet" href="E:/xampp/htdocs/Museum/fonts/fontawesome-free-5.10.2-web/css/all.min.css" />
	</head>
	
	<body style="background:url('images/mat.jpg') no-repeat; background-size:100% 100%;">
	<center>
		<h2>REMOVE STATUE DETAILS</h2>
		<div class="data_insert_box">
			<form action="admin_remove_statue_code.php" method="POST">
				<table>
					<tr class="textbox">
						<td>STATUE ID : </td><td><input type="text" placeholder=" Enter Statue ID" name="id" value="" required></td>
					</tr>
					<tr>
						<td colspan='2'><input class='btn' type="submit" value="Remove"></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>