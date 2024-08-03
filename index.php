<?php 
include('login.php');
if(isset($_SESSION['login_id'])){
	header("loation: admin_menu.php");
}
?>
<!DOCTYPE html>
<html lang="en">
	
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="x-ua-compatible" content="ie=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Museum login form</title>
		<link  href="css/index_style.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="fonts/fontawesome-free-5.10.2-web/css/all.min.css"/>
		<h1 style="font-family:courier; color: black; font-size: 6vh">MUSEUM MANAGEMENT SYSTEM</h1>
	</head>
	
	<body class="floor-fade" style="background:url('images/gall.jpg') no-repeat; background-size:cover;">
		
		<header >
			<div class="wrapper">
				<div class="logo">
					<img src="images/images.png" alt="">
				</div>
				<ul class="nav-area" style="font-family:courier; color:black">
					<li><a href="about.php">About</a></li>
					<li><a href="visitor_page.php">Visitor</a></li>
					<li><a href="emp_login.php">Employee</a></li>
					<li><a href="index.php">Admin</a></li>
				</ul>
			</div>
		</header>
		<div class="login_box">
		<form method="POST" action="">
			<h1>Login</h1>
			<div class="textbox">
				<i class="fas fa-user" aria-hidden="true"></i>
				<input type="text" placeholder="Enter Admin ID" name="ad_id" value="" />
			</div>
			<div class="textbox">
				<i class="fas fa-unlock" aria-hidden="true"></i>
				<input type="password" placeholder="Password" name="pass_word" value="" />
			</div>
			
			<a href="">
			<input class="btn" type="submit" name="submit" value="Sign In" />
			</a>
			<a href="admin_forgot_password.php" style="color: white">Forgot Password?</a>
			<br/>
			<span><?php echo $error; ?></span>
		</form>
		</div>
	</body>
</html>