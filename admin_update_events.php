<?php
session_start();
$logged_in_id = $_SESSION['login_id'];
?>

<html>
	<head align='center'>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin Update Events</title>
		<link rel="stylesheet" href="css/admin_update_events.css" />
		<link rel="stylesheet" href="E:/xampp/htdocs/Museum/fonts/fontawesome-free-5.10.2-web/css/all.min.css" />
	</head>
	
	<body style="background:url('images/dma.jpg') no-repeat; background-size:100% 100%;">
	<center>
		<h2>UPDATE EVENT DETAILS</h2>
		<div class="data_insert_box">
			<form action="admin_update_events_code.php" method="POST">
				<table>
					<tr class="textbox">
						<td>EVENT NAME : </td><td><input type="text" placeholder=" Enter Event Name" name="event_name" value="" required></td>
					</tr>
					<tr class="textbox">
						<td>START DATE : </td><td><input type="date" placeholder=" Enter Start Date" name="start_date" value="" required></td>
					</tr>
					<tr class="textbox">
						<td>END DATE : </td><td><input type="date" placeholder=" Enter End Date" name="end_date" value="" required></td>
					</tr>
					<tr>
						<td colspan='2'><input class="btn" type="submit" value="UPDATE"></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>