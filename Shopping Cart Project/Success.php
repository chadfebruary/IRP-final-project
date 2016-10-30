<?php
include_once("Database.php");
$Database = new Database();
session_start();
include 'head.php';

	$productID = isset($_GET['productID']) ? $_GET['productID'] : "";
	$name = isset($_GET['name']) ? $_GET['name'] : "error";
	$name = 'error';
	$weight = isset($_GET['weight']) ? $_GET['weight'] : "";
	$price = isset($_GET['price']) ? $_GET['price'] : "";
	$amountAvailable = isset($_GET['amountAvailable']) ? $_GET['amountAvailable'] : "";
	$picture = isset($_GET['picture']) ? $_GET['picture'] : "";
	$transactiondate = isset($_GET['transactiondate']) ? $_GET['transactiondate'] : "";
	$transactionid = isset($_GET['transactionid']) ? $_GET['transactionid'] : "";
	
?>	
	
	<form name="register" method="POST" action="viewOrders.php">
			<center> 
			<p> <h9>Successful Purchase made! </h9></p>
			
		<p> <input type="submit" name="btnView" value= "View Orders." /> </P>
		
			   </a>
			</p>
			</center>
		</form>
	
	
	
	
	<?php
echo "";
	//echo "Hello?";
	include "foot.php";
?>