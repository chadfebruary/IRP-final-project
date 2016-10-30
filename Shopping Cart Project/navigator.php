<?php
//session_start();
//require_once "shoppingCart.php";
//$PageTitle = "";
$cartCount = "";
$username = "";
?>
<!-- navbar -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="RoasteryCoffees.php">Roastery Coffees</a>
        </div>
 
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li <?php echo $PageTitle == "Roastery Coffees" ? "class='active'" : ""; ?> >
                    <a href="RoasteryCoffees.php">Coffees</a>
                </li>
                <li <?php echo $PageTitle == "Shopping Cart" ? "class='active'" : ""; ?> >
                    <a href="shoppingCart.php">
                        <?php
						if(isset($_SESSION["cartItems"]))
						{
							// count products in cart
							$cartCount=count($_SESSION['cartItems']);
                        }
						?>
                        Your shopping cart <span class="badge" id="comparison-count"><?php echo $cartCount; ?></span>
                    </a>
                </li>
				<li <?php echo $PageTitle == "Your orders" ? "class='active'" : "";?>>
					<a href="viewOrders.php">Your orders</a>
				</li>
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
				
				<li <?php echo $PageTitle == "Register" ? "class='active'" : "";?>>
					<a href="register.php">Register</a>
				</li>
				
				<li <?php echo $PageTitle == "Login" ? "class='active'" : "";?>>
					<a href="login.php">Login
					<?php
						if(isset($_SESSION["username"]))
						{
							// count products in cart
							$username=$_SESSION['username'];
                        }
					?>
					<span class="badge" id="comparison-count"><?php echo $username; ?></span>
					</a>
				</li>
				
				<li <?php echo $PageTitle == "Logout" ? "class='active'" : "";?>>
					<a 
						href="logout.php">Logout
					</a>
				</li>
				</ul>
        </div><!--/.nav-collapse -->
 
    </div>
</div>
<!-- /navbar -->