<?php
	include_once("Database.php");
	$Database = new Database();
	$PageTitle = "";
	
	if(isset($_POST["btnRegister"]))
	{
		
		$CustomerDetails = $_POST['customerDetails'];
		
		if(!empty($CustomerDetails[0]) && !empty($CustomerDetails[1]) && !empty($CustomerDetails[2]))
		{
			$Sql = "INSERT INTO Customer(name, username, password) VALUES('$CustomerDetails[0]', '$CustomerDetails[1]', '$CustomerDetails[2]')";
			if($Database->query($Sql) === true)
			{
				header("Location: login.php");
			}
			else
			{
				echo '<script language="javascript">';
			echo 'alert("The username already exists")';
			echo '</script>';
			}
		}
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
 
    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 
</head>
	<body>
	
		<?php include 'navigator.php'; ?>
	<div class="container"/>
	<body>
		<form name="register" method="POST" action="Register.php">
			<center> 
			<p> <h9>Enter your details: </h9></p> 
			<p class = "coffee-text"> Name </p> 
			<input type='text' name='customerDetails[0]' value="" required/>
			<p class = "coffee-text"> Username: </p> 
			<input type='text' name='customerDetails[1]' value="" required/>
			<p class = "coffee-text">Password: </p>  
			<input type='password' name='customerDetails[2]' value="" required/>
		<p> <input type="submit" name="btnRegister" value= "Create account" /> </P>
		
			   </a>
			</p>
			</center>
		</form>
	</body>
	