<?php
include('emp_login_session.php');
if(!isset($_SESSION['login_id'])){
	header("location: emp_login.php");
}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="x-ua-compatible" content="ie=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Employee Menu</title>
		<link  href="css/employee_menu.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="fonts/fontawesome-free-5.10.2-web/css/all.min.css"/>
	</head>
	
	<body style="background:url(images/hde.jpg) no-repeat; background-size:cover;">
	<center>
	<h1>This is emp menu</h1>
	<div class="menu_box">
			<nav>
				<ul>
					<li><a href="emp_update_entry_code.php">
						<input class="btn" type="button" value="Update entry time"></a>
						<?php echo $_SESSION['msg']; 
							$_SESSION['msg'] = "";?>
					</li>
					<li><a href="emp_update_exit_code.php">
						<input class="btn" type="button" value="Update exit time"></a>
					</li>
					<li><a href="emp_update_details.php">
						<input class="btn" type="button" value="Update details"></a>
					</li>
					<li><a href="emp_view_details.php">
						<input class="btn" type="button" value="View your details"></a>
					</li>
					<li><a href="emp_logout.php">
						<input class="btn" type="button" value="Log Out"></a>
					</li>
				</ul>
			</nav>
	</div>
	</body>
</html>