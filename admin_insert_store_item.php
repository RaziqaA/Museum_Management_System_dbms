<html>
	<head align='center'>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin Insert Store Items</title>
		<link rel="stylesheet" href="css/admin_insert_store_item.css" />
		<link rel="stylesheet" href="E:/xampp/htdocs/Museum/fonts/fontawesome-free-5.10.2-web/css/all.min.css" />
	</head>
	
	<body style="background:url('images/buf.jpg') no-repeat; background-size:cover;">
	<center>
		<h2>INSERT ITEM DETAILS</h2>
		<div class="data_insert_box">
			<form action="admin_insert_store_item_code.php" method="POST">
				<table>
					<tr class="textbox">
						<td>ITEM NAME : </td><td><input type="text" placeholder=" Enter Item Name" name="name" value="" required></td>
					</tr>
					<tr class="textbox">
						<td>ITEM ID : </td><td><input type="text" placeholder=" Enter Item ID" name="itemid" value="" required></td>
					</tr>
					<tr class="textbox">
						<td>PRICE : </td><td><input type="value" placeholder=" Enter Price" name="price" value="" required></td>
					</tr>
					<tr>
						<td colspan='2'><input class="btn" type="submit" value="Add"></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>