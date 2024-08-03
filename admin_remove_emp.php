
<!DOCTYPR HTML>
<html>
	<head align='center'>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin Remove Employee</title>
		<link rel="stylesheet" href="css/admin_remove_emp.css" />
		<link rel="stylesheet" href="E:/xampp/htdocs/Museum/fonts/fontawesome-free-5.10.2-web/css/all.min.css" />
	</head>
	
	<body style="background:url('images/paris.jpg') no-repeat; background-size: 100% 100%">
		<center>
		<h2>REMOVE EMPLOYEE</h2>
		<div class="data_delete_box">
			<form action="admin_remove_emp_code.php" method="POST">
			<table>
				<tr class="textbox">
					<td>Enter ID :<input type="text" placeholder="  Enter Employee ID" name="staffid" value="" required ></td>
				</tr>
				<tr>
					<td><input class="btn" type="submit" value="REMOVE" ></td>
				</tr>
			</table>
			</form>
		</div>
	
	</body>
</html>

