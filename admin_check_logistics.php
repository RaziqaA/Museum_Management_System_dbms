<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/admin_check_logistics.css" />
		<link rel="stylesheet" href="E:/xampp/htdocs/Museum/fonts/fontawesome-free-5.10.2-web/css/all.min.css">
		<title>Logistics Menu Page</title>
	</head>
	
	<body style="background:url('images/jqp.jpg') no-repeat; background-size:cover;">
	<h1 align="center">LOGISTICS MENU</h1><br />
		<div class="admin_selection_box">
			<nav>
				<ul>
				<li>
					<a href="admin_insert_model.php"><input class="btn" type="btn" name="" value="Insert Model" /></a>
					<?php echo $_SESSION['msg'];
					$_SESSION['msg'] = ""; ?>
				</li>
				<li>
					<a href="admin_remove_model.php"><input class="btn" type="btn" name="" value="Remove Model" /></a>
				</li>
				<li>
					<a href="admin_insert_statue.php"><input class="btn" type="btn" name="" value="Insert Statue" /></a>
				</li>
				<li>
					<a href="admin_remove_statue.php"><input class="btn" type="btn" name="" value="Remove Statue" /></a>
				</li>
				<li>
					<a href="admin_insert_painting.php"><input class="btn" type="btn" name="" value="Insert Painting" /></a>
				</li>
				<li>
					<a href="admin_remove_painting.php"><input class="btn" type="btn" name="" value="Remove Painting" /></a>
				</li>
				</ul>
			<nav>
		</div>
	</body>
</html>