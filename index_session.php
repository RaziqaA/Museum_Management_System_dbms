<?php

$conn = mysqli_connect("localhost", "root", "", "museumsys");
session_start();

$id_check = $_SESSION['login_id'];
//sql to fetch complete info of the user

$query = "SELECT ad_id FROM admin WHERE ad_id = '$id_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['ad_id'];

?>