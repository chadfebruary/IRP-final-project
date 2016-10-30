<?php
//session_start();
//define('__ROOT__', dirname(dirname(__FILE__)));
	//require_once (__ROOT__.'\Shopping Cart Project\Database.php');
	//echo dirname(__FILE__)."\Database.php";
	//include dirname(__FILE__)."\Database.php";
	require_once ('Database.php');
	$Database = new Database();
$PageTitle = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title><?php echo isset($PageTitle) ? $PageTitle : "Roastery Coffees"; ?></title>
 
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	
 
    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]  <echo $extras;  --> 
 
</head>
<body>
 
    <?php include 'navigator.php'; ?>
 
    <!-- container -->
    <div class="container">
 
        <div class="page-header">
            <h1><?php echo isset($PageTitle) ? $PageTitle : "Roastery Coffees"; ?></h1>
        </div>