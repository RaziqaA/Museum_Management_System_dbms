<html>
	<head align='center'>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin Insert Models</title>
		<link rel="stylesheet" href="css/admin_insert_model.css" />
		<link rel="stylesheet" href="E:/xampp/htdocs/Museum/fonts/fontawesome-free-5.10.2-web/css/all.min.css" />
	</head>
	
	<body style="background:url('images/dsc.jpg') no-repeat; background-size:100% 100%;">
	<center>
		<h2>INSERT MODEL DETAILS</h2>
		<div class="data_insert_box">
			<form action="admin_insert_model_code.php" method="POST">
				<table>
					<tr class="textbox">
						<td>MODEL ID : </td><td><input type="text" placeholder=" Enter Model ID" name="id" value="" required></td>
					</tr>
					<tr class="textbox">
						<td>DEPARTMENT ID : </td><td><select name="did" required>
														<option value="1">History</option>
														<option value="2">Zoology</option>
														<option value="3">Science and Space</option>
														<option value="4">Automobiles</option>
														<option value="5">Botany</option>
														<option value="6">Geography</option>
														</select></td>
					</tr>
					<tr class="textbox">
						<td>ARTIST NAME : </td><td><input type="value" placeholder=" Enter Artist Name" name="artist_name" value="" required></td>
					</tr>
					<tr class="textbox">
						<td>YEAR : </td><td><input type="text" placeholder=" Enter Year" name="year" value="" required></td>
					</tr>
					<tr class="textbox">
						<td>TITLE : </td><td><input type="text" placeholder=" Enter Title" name="title" value="" required></td>
					</tr>
					<tr class="textbox">
						<td>SIZE : </td><td><input type="text" placeholder=" Enter size" name="size" value="" required></td>
					</tr>
					<tr class="textbox">
						<td>TYPE : </td><td><select name="type" required>
											<option value="model">Model</option>
											</select></td>
					</tr>
					<tr>
						<td colspan='2'><input class="btn" type="submit" value="Add"></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>