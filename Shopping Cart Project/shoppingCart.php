
<html>
<body>
<link rel= "stylesheet" href = "css/style.css" type="text/css" media="screen" />



<?php
session_start();
 //print_r(get_declared_classes());
$PageTitle="Cart";
//require_once 'Database.php';
include 'head.php';





$action = isset($_GET['action']) ? $_GET['action'] : "";
$productID = isset($_GET['productID']) ? $_GET['productID'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "error";
$name = 'error';
$weight = isset($_GET['weight']) ? $_GET['weight'] : "";
$price = isset($_GET['price']) ? $_GET['price'] : "";
$amountAvailable = isset($_GET['amountAvailable']) ? $_GET['amountAvailable'] : "";
$picture = isset($_GET['picture']) ? $_GET['picture'] : "";
$customerID = '5'; // username






foreach($_POST AS $key =>$post_var) {
//echo "Key: $key  Index: $post_var";	
	if(isset($key) && strpos($key, 'btnChange') !== false && isset($post_var)) { 
		$id = substr($key, strpos($key, 'btnChange') + strlen('btnChange')); 
		//echo "$key";	
		echo "$id";		
		$quantity = $_POST['qnt'];
		echo $quantity;
		if ($quantity > 0)
		{
			$Sql = "UPDATE orders SET Quantity = '$quantity' WHERE ProductID = '$id'";
			$Database->query($Sql);
		}
	} 
}

if($action=='removed'){
    echo "<div class='alert alert-info'>";
        echo "<strong>Item was removed successfully.</strong>";
    echo "</div>";
} 
else if($action=='quantityUpdated'){
    echo "<div class='alert alert-info'>";
        echo "<strong>".$name."</strong> quantity was updated!";
    echo "</div>";
}

if(isset($_SESSION["cartItems"]))
{
	if(count($_SESSION['cartItems'])>0){
	 
		// get the product ids
		$productIDs = "";
		foreach($_SESSION['cartItems'] as $productID=>$value){
			$productIDs = $productIDs."'". $productID."',";
		}
	//	addToHistory();
	 //echo $productIDs."\n";
		// remove the last comma
		$productIDs = rtrim($productIDs, ',');
		//echo $productIDs;
		//start table
		echo "<table class='table table-hover table-responsive table-bordered'>";
		
			// our table heading
			echo "<tr>";
				echo "<th class='textAlignLeft'>Picture</th>";
				echo "<th>Coffee name</th>";
				echo "<th>Weight</th>";
				echo "<th>Price</th>";
				echo "<th>Amount available</th>";
				echo "<th>Action</th>";
				echo "<th>Quantity</th>";
			    
				
			echo "</tr>";
			
			$Sql = "SELECT productID, name, weight, price, picture, amountAvailable FROM Inventory WHERE productID IN (".$productIDs.") ORDER BY name";
			
			$Result = $Database->query($Sql);
			$Number = $Result->num_rows;
		
	 
			$TotalPrice=0;

			while ($Row = $Result->fetch_assoc()){
				//extract($Row);
				
				echo "<tr>";
					echo "<td><img src='".$Row['picture']."' border = 0></td>";
					echo "<td>".$Row['name']."</td>";
					echo "<td>".$Row['weight']."</td>";
					echo "<td>R ".$Row['price']."</td>";
					echo "<td><div class='amountAvailable'>".$Row["amountAvailable"]."</div></td>";
					echo "<td>";
						echo "<a href='removeFromCart.php?productID=".$productID."&name=".$name."&weight=".$weight."&price=".$price."&picture=".$picture."' class='btn btn-danger'>";
						echo "<span class='glyphicon glyphicon-remove'></span> Remove from cart";
						echo "</a>";
					echo "</td>";
					echo "<td>";
					
					$quantity = "SELECT Quantity from orders WHERE ProductID = '$Row[productID]'";
					$result = $Database->query($quantity);
					
					while ($row = $result->fetch_assoc()) {
						$quantity =$row['Quantity']; 
					}
					//var_dump($quantity);
					//echo $quantity;

					echo '<form name="quantityForm" method="POST" >';
						echo '<input type="hidden" value="quantity" name=$productID>';
						echo '<input type="number" min="1" class="form-control" id="qnt" name="qnt" value= '.$quantity.'  >';
						echo '<input type="submit" name="btnChange'.$Row['productID'].'".  value= "Change" />';
						echo "</form>";
					echo "</td>";
		
				echo "</tr>";
	 
				$TotalPrice = $TotalPrice + ($Row['price'] * $quantity);
			}
	 
			echo "<tr>";
					echo "<td><b>Total</b></td>";
					echo "<td>R ".$TotalPrice."</td>";
					echo "<td>";
						echo "<a onclick='buyItem()' href='Success.php' class='btn btn-success'>";
							echo "<span class='glyphicon glyphicon-shopping-cart'></span> Checkout";
							
						echo "</a>";
					echo "</td>";
				echo "</tr>";
	 
		echo "</table>";
	}
	else{
		echo "<div class='alert alert-danger'>";
			echo "<strong>No products found</strong> in your cart!";
		echo "</div>";
	}
 }
 	?>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
	function buyItem(){
		$.ajax({
			type: "POST",
			url: "addTransaction.php",
			success: function(data) {
			//	alert("Successfully saved" + data);
			},
			error: function(data){
				//alert("Alert");
			}
		});
	};
</script>
<?php
  
include 'foot.php';
?>
</body>
	</html>