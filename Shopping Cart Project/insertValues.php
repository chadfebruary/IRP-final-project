
<?php
	include_once("Database.php"); 
	$Database = new Database(); // db object
	session_start();
	
	$username = isset($_GET['username']) ? $_GET['username'] : "";
$productID = isset($_GET['productID']) ? $_GET['productID'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
$weight = isset($_GET['weight']) ? $_GET['weight'] : "";
$price = isset($_GET['price']) ? $_GET['price'] : "";
$picture = isset($_GET['picture']) ? $_GET['picture'] : "";
	
	if(!isset($_SESSION['cartItems'])){
    $_SESSION['cartItems'] = array();
}
 
// check if the item is in the array, if it is, do not add
if(array_key_exists($productID, $_SESSION['cartItems']))
{
	// redirect to product list and tell the user it was added to cart
	header('Location: RoasteryCoffees.php?action=exists&productID'.$productID.'&name='.$name.'&weight='.$weight.'&price'.$price);
}
// else, add the item to the array
else{
    $_SESSION['cartItems'][$productID] = $name;
 
    // redirect to product list and tell the user it was added to cart
    header('Location: RoasteryCoffees.php?action=added&productID' . $productID . '&name=' . $name);
}
	
	if(isset($_SESSION['cartItems']))
	{
			$username = isset($_GET['username']) ? $_GET['username'] : "";
			$productID = isset($_GET['productID']) ? $_GET['productID'] : "";
			$name = isset($_GET['name']) ? $_GET['name'] : "";
			$weight = isset($_GET['weight']) ? $_GET['weight'] : "";
			$price = isset($_GET['price']) ? $_GET['price'] : "";
			$picture = isset($_GET['picture']) ? $_GET['picture'] : "";	
			$Sql = "INSERT INTO orders VALUES(null,'$productID','$username', '1', '$picture', '$name','$price')";
			//$Sql = "INSERT INTO orders VALUES(null,'test','test', '1', 'test', 'test','1')";
			$Result = $Database->query($Sql);
			var_dump ($Result);
		
			// error handling
			//echo !$Database->query($Sql)?("fail:".$Database->getDb()->error):"succ";
	}
	

	/*$productID = $_POST['productID'] ; // string
	$quantity = $_POST['quantity'] ; // int
	$username = $_SESSION['username'];
	// (OrderID, ProductID, CustomerUsername, Quantity)
	$Sql = "INSERT INTO orders VALUES(null,'$productID','$username','$quantity', null, null, null)";
	
	// error handling
	//echo !$Database->query($Sql)?("fail:".$Database->getDb()->error):"succ";
	echo $Database->query($Sql);
	*/
	
?>