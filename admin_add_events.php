<html>
	<head align='center'>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin Add Events</title>
		<link rel="stylesheet" href="css/admin_add_events.css" />
		<link rel="stylesheet" href="E:/xampp/htdocs/Museum/fonts/fontawesome-free-5.10.2-web/css/all.min.css" />
	</head>
	
	<body style="background:url('images/subway.jpg') no-repeat; background-size: 100% 100%;">
	<center>
		<h2>ADD EVENT</h2>
		<div class="data_insert_box">
			<form action="admin_add_events_code.php" method="POST">
				<table>
					<tr class="textbox">
						<td>Event Name : </td><td><input type="text" placeholder=" Enter Event Name" name="event_name" value="" required></td>
					</tr>
					<tr class="textbox">
						<td>Department ID : </td><td><select name="did" required>
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
						<td>Date Start : </td><td><input type="date" placeholder=" Enter Start Date" name="start_date" value="" required></td>
					</tr>
					<tr class="textbox">
						<td>Date End : </td><td><input type="date" placeholder=" Enter End Date" name="end_date" value="" required></td>
					</tr>
					<tr class="textbox">
						<td>People Involved : </td><td><input type="text" placeholder=" Enter People" name="people" value="" required></td>
					</tr>
					<tr>
						<td colspan=2><input class="btn" type="submit" value="Add"></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>