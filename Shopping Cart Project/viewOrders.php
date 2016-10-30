<?php
include_once("Database.php");
$Database = new Database();
session_start();
include 'head.php';

if (isset($_SESSION['username']) == ""){
		header("Location: login.php");
		exit;
	}

	$productID = isset($_GET['productID']) ? $_GET['productID'] : "";
	$name = isset($_GET['name']) ? $_GET['name'] : "error";
	$name = 'error';
	$weight = isset($_GET['weight']) ? $_GET['weight'] : "";
	$price = isset($_GET['price']) ? $_GET['price'] : "";
	$amountAvailable = isset($_GET['amountAvailable']) ? $_GET['amountAvailable'] : "";
	$picture = isset($_GET['picture']) ? $_GET['picture'] : "";
	$transactiondate = isset($_GET['transactiondate']) ? $_GET['transactiondate'] : "";
	$transactionid = isset($_GET['transactionid']) ? $_GET['transactionid'] : "";
	$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
	
	
	$Sql = "SELECT * FROM Transactions WHERE username = '$username' ORDER BY transactiondate";
	$Result = $Database->query($Sql);
	$Number = $Result->num_rows;
	
	if($Number > 0)
	{
		echo "<table class='table table-hover table-responsive table-bordered'>";
		
			echo "<tr>";
				echo "<th class='textAlignLeft'>Product ID</th>";
				echo "<th>Price</th>";
				echo "<th>Transaction Date</th>";
				echo "<th>Transaction ID</th>";
			echo "</tr>";
			
		while($Row = $Result->fetch_assoc())
		{
			echo "<tr>";
					//echo "<td><img src='".$Row['picture']."' border = 0></td>";
					echo "<td><div class='name'>".$Row['productID']."</div></td>";
					echo "<td><div class='price'>R ".$Row["price"]."</div></td>";
					echo "<td><div class='transactiondate'>".$Row['transactiondate']."</div></td>";
					echo "<td><div class='transactionid'>".$Row['transactionID']."</div></td>";
			echo "</tr>";
		}
	}
	else 
	{
		echo "<div class='alert alert-danger'>";
			echo "<strong>No transactions were found</strong> in your order history!";
		echo "</div>";
	}
	
	include "foot.php";
?>