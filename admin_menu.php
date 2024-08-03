<?php
include('index_session.php');
if(!isset($_SESSION['login_id'])){
	header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/admin_menu_css.css" />
		<link rel="stylesheet" href="E:/xampp/htdocs/Museum/fonts/fontawesome-free-5.10.2-web/css/all.min.css">
		<title>Admin Menu Page</title>
	</head>
	
	<body style="background:url('images/jqp.jpg') no-repeat; background-size:cover; background-attachment: fixed;">
		<h1 align="center">ADMIN MENU</h1><br />
		<div class="admin_selection_box">
			<nav>
				<ul>
				<li>
					<a href="admin_insert_emp.php"><input class="btn" type="btn" name="" value="Add Employee" /></a>
					<?php echo $_SESSION['msg'];
					$_SESSION['msg'] = ""; ?>
				</li>
				<li>
					<a href="admin_remove_emp.php"><input class="btn" type="btn" name="" value="Remove Employee" /></a>
				</li>
				<li>
					<a href="admin_display_emp.php"><input class="btn" type="btn" name="" value="Display Employees" /></a>
				</li>
				<li>
					<a href="admin_new_admin.php"><input class="btn" type="btn" name="" value="Create New Admin" /></a>
				</li>
				<li>
					<a href="admin_remove_admin.php"><input class="btn" type="btn" name="" value="Remove Admin" /></a>
				</li>
				<li>
					<a href="admin_manage_stock.php"><input class="btn" type="btn" name="" value="Display Objects" /></a>
				</li>
				<li>
					<a href="admin_display_store_items.php"><input class="btn" type="btn" name="" value="Display Store Items" /></a>
				</li>
				<li>
					<a href="admin_insert_store_item.php"><input class="btn" type="btn" name="" value="Insert Store Item" /></a>
				</li>
				<li>
					<a href="admin_remove_store_item.php"><input class="btn" type="btn" name="" value="Remove Store Item" /></a>
				</li>
				<li>
					<a href="admin_add_events.php"><input class="btn" type="btn" name="" value="Add Events" /></a>
				</li>
				<li>
					<a href="admin_remove_events.php"><input class="btn" type="btn" name="" value="Remove Events" /></a>
				</li>
				<li>
					<a href="admin_update_events.php"><input class="btn" type="btn" name="" value="Update Events" /></a>
				</li>
				<li>
					<a href="admin_check_logistics.php"><input class="btn" type="btn" name="" value="Check Logistics" /></a>
				</li>
				<li>
					<a href="admin_logout.php"><input class="btn" type="btn" name="" value="Log Out" /></a>
				</li>
				</ul>
			</nav>
		</div>
	</body>
</html>