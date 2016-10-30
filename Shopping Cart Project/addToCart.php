<?php
session_start();
 
// get the product id
$username = isset($_GET['username']) ? $_GET['username'] : "";
$productID = isset($_GET['productID']) ? $_GET['productID'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
$weight = isset($_GET['weight']) ? $_GET['weight'] : "";
$price = isset($_GET['price']) ? $_GET['price'] : "";
$picture = isset($_GET['picture']) ? $_GET['picture'] : "";
//$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : "";
 
/*
 * check if the 'cart' session array was created
 * if it is NOT, create the 'cart' session array
 */
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
?>