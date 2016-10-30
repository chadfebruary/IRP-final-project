
<?php
	session_start();
	include_once("Database.php"); 
	$Database = new Database(); // db object
	
	$username = $_SESSION['username'];
	$Sql = "SELECT ProductID, username, Quantity from orders";
	$price = 0;
	//	var_dump($Sql);
	$result = $Database->query($Sql);
	while ($row = $result->fetch_assoc()) {
		
		$ProductID = $row['ProductID']; 
		$username = $row['username']; 
		$quantity =$row['Quantity']; 
		$date = date("Y/m/d")." ".date("h:i:sa");
		 //  $price = "50";
		
		$Sqlprice = "SELECT price from inventory WHERE productID = '$ProductID' ";
		//var_dump($Sqlprice);
		$resultprice = $Database->query($Sqlprice);
		//var_dump($resultprice);
		while ($row = $resultprice->fetch_assoc()) {
			$price = $row['price'];
			
			$insert = "INSERT into TRANSACTIONS Values(null,'$quantity','$price','$ProductID','$username', '$date')";
			//var_dump($insert);
			$Database->query($insert);
		}

		//var_dump($insert);
		//$Database->query($insert );
	}
	
	$Sql = "DELETE FROM Orders WHERE username = '$username'";
	$Database->query($Sql);
	unset($_SESSION['cartItems']);
	//$productID = $_POST['productID'] ; // string
	//$quantity = $_POST['quantity'] ; // int
	// (OrderID, ProductID, CustomerUsername, Quantity)
	//$Sql = "INSERT INTO orders VALUES(null,'$productID','username',$quantity)";
	
	// error handling
	//echo !$Database->query($Sql)?("fail:".$Database->getDb()->error):"succ";
	
	//echo "hello?";
	
?>