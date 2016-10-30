<?php
	include "Database.php";
	$Database = new Database();
	session_start();
	
	$productID = isset($_GET['productID']) ? $_GET['productID'] : "";
	$name = isset($_GET['name']) ? $_GET['name'] : "";
	$username = $_SESSION['username'];
	
	$Sql = "DELETE FROM Orders WHERE username = '$username'";
$Database->query($Sql);
?>