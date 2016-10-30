<?php
	session_start();
	include_once("Database.php"); 
	$Database = new Database();
	$PageTitle = "";
	$username = "";
	$password = "";
	$usernameError="";
	$passwordError = "";
	
	if (isset($_SESSION['username']) != ""){
		header("Location: RoasteryCoffees.php");
		exit;
	}/*
	else if(isset($_SESSION['username']) == "")
	{
		header("Location: Login.php");
		exit;
	}*/
	
	$error = false;

	if(isset($_POST['btnlogin']))
	{
		$username = trim($_POST['username']);
		$username = strip_tags($username);
		$username = htmlspecialchars($username);
		
		$password = trim($_POST['password']);
		$password = strip_tags($password);
		$password = htmlspecialchars($password);
		
		if(empty($username))
		{
			$error = true;
			$usernameError = "Please enter your username.";
		}
		if(empty($password))
		{
			$error = true;
			$passwordError = "Please enter your password.";
		}
		
		if(!$error)
		{
			//$password = hash('sha256', $password);
			
			$Sql = "SELECT username, password from customer where username='$username'";
			$Result = $Database->query($Sql);
			$Number = $Result->num_rows;
			$Row = $Result->fetch_assoc();
			
			if($Number == 1)
			{
				$username = $Row['username'];
				//$password = $Result['password'];
				$_SESSION['username'] = $username;
				header("location: roasteryCoffees.php");
			}
			else
			{
				$errorMessage = "Your details are incorrect. Please try again.";
			}
		}
		
		//$username = $_POST['username'];
		//$password = $_POST['password'];
		
		
		
		/*else
		{
			echo '<script language="javascript">';
			echo 'alert("Username or Password is invalid")';
			echo '</script>';
			
		//echo $error;
		}*/	
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
 
    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 
</head>
	<body>
	
		<?php include 'navigator.php'; ?>
 
		<!-- container -->
		<div class="container">
		<form name="login" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<center>
			<p> <h9>Please log in: </h9></p> 
			
			<?php
				if(isset($errorMessage))
				{
			?>
				<div class="alert alert-danger">
					<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errorMessage; ?>
                </div>
			<?php
				}
			?>
			<div class="form-group">
				<p class = "coffee-text"> Your user name:</p> 
				<input type="text" name="username" class="form-control" value="<?php echo $username?>">
				<span class="text-danger"><?php echo $usernameError?></span>
			</div>
			
			<div class="form group">
				<p class = "coffee-text"> Your password:</p> 
				<input type="password" name="password" class="form-control" value="<?php echo $password?>">
				<span class="text-danger"><?php echo $passwordError?></span>
			</div>
			
			<div class="form-group">
			<p> <button type="submit" class="btn btn-primary" name="btnlogin">Login</button></p>
			<div>
			
			<div class="form-group">
			<p><a href="Register.php"> Not registered? Create an account!</a></p>
			</div>
		</center>
		</form>
		
	</body>


<?php
$Database->__destruct();
?>
</body>
</html>