<!DOCTYPE html>
<html lang="en">
	
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="x-ua-compatible" content="ie=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Change password form</title>
		<link  href="css/index_style.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="fonts/fontawesome-free-5.10.2-web/css/all.min.css"/>
		<h1 style="font-family:courier; color: black; font-size: 6vh">CHANGE ADMIN PASSWORD</h1>
	</head>
	
	<body class="floor-fade" style="background:url('images/gall.jpg') no-repeat; background-size:cover;">
		<div class="login_box">
		<form method="POST" action="admin_forgot_password_code.php">
			<h1>Forgot ?</h1>
			<div class="textbox">
				<i class="fas fa-user" aria-hidden="true"></i>
				<input type="text" placeholder="Enter Admin ID" name="ad_id" value="" required >
			</div>
			<div class="textbox">
				<i class="fas fa-at" aria-hidden="true"></i>
				<input type="text" placeholder="Enter Email ID" name="email" value="" required >
			</div>
			<div class="textbox">
				<i class="fas fa-unlock" aria-hidden="true"></i>
				<input type="password" placeholder="New Password" name="pass_word" value="" required >
			</div>
			<div class="textbox">
				<i class="fas fa-unlock" aria-hidden="true"></i>
				<input type="password" placeholder="Confirm New Password" name="con_pass_word" value="" required >
			</div>
			<a href="">
			<input class="btn" type="submit" name="submit" value="Create New Password" />
			</a>
		</form>
		</div>
	</body>
</html>