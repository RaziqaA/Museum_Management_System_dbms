<?php
session_start();
if(session_destroy())
{
header("location: emp_login.php");
}
?>