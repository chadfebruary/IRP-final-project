<?php
class Database
{
	protected $Host = "localhost";
	protected $User = "root";
	protected $Password = "";
	protected $DatabaseName = "CoffeeShop";
	protected $DatabaseConnection = "";
	protected $CreateDatabase = "CREATE DATABASE IF NOT EXISTS CoffeeShop;";
	
	function __construct()
	{
		//$this->DatabaseConnection = @new mysqli($this->Host, $this->User, $this->Password, $this->DatabaseName);
		$this->DatabaseConnection = mysqli_connect($this->Host, $this->User, $this->Password, $this->DatabaseName);
		if($this->DatabaseConnection->connect_error)
		{
			die ("Connection failed: ".$this->DatabaseConnection->connect_error);
		}
		$this->createTables();
	}
	
	function __destruct()
	{
		//$this->DatabaseConnection->close();
	}
	
	function __wakeup()
	{
		$this->DatabaseConnection = $DatabaseConnection;
	}
	
	function connectToDatabase()
	{
		$this->DatabaseConnection = @new mysqli($this->Host, $this->User, $this->Password, $this->DatabaseName);
		return $this->DatabaseConnection;
	}
	
	/*function createDatabase()
	{
		$this->DatabaseConnection->query($this->CreateDatabase);
	}*/
	
	function createTables()
	{
		$CustomerTable = "CREATE TABLE IF NOT EXISTS Customer(
							CustomerID INT AUTO_INCREMENT PRIMARY KEY,
							Name VARCHAR(30),
							MembershipID INT,
							Username VARCHAR(30),
							Password VARCHAR(30),
							CONSTRAINT FOREIGN KEY(MembershipID) REFERENCES Membership);";
							
		$MembershipTable = "CREATE TABLE IF NOT EXISTS Membership(
							MembershipID INT AUTO_INCREMENT PRIMARY KEY,
							Name VARCHAR(30),
							RegistrationDate DATETIME,
							MembershipType VARCHAR(30)
							);";
							
		$OrderTable = "CREATE TABLE IF NOT EXISTS Orders(
						OrderID INT AUTO_INCREMENT PRIMARY KEY,
						ItemID INT,
						CustomerID INT,
						Total FLOAT,
						CONSTRAINT FOREIGN KEY(ItemID) REFERENCES Item,
						CONSTRAINT FOREIGN KEY(CustomerID) REFERENCES Customer
						);";
													
		$ItemTable = "CREATE TABLE IF NOT EXISTS Item(
						ItemID INT AUTO_INCREMENT PRIMARY KEY,
						MenuID INT,
						CONSTRAINT FOREIGN KEY (MenuID) REFERENCES MenuID
						);";
		
		$MenuTable = "CREATE TABLE IF NOT EXISTS Menu(
						MenuID INT AUTO_INCREMENT PRIMARY KEY,
						ItemName VARCHAR(30),
						ItemPrice FLOAT,
						Quantity INT,
						Description VARCHAR(30)
						);";
												
		$TransactionTable = "CREATE TABLE IF NOT EXISTS Transaction(
							TransactionID INT AUTO_INCREMENT PRIMARY KEY,
							OrderID INT,
							CustomerID INT,
							TransactionDate DATETIME,
							Total FLOAT,
							CONSTRAINT FOREIGN KEY(OrderID) REFERENCES Orders,
							CONSTRAINT FOREIGN KEY(CustomerID) REFERENCES Customer
							);";
		
		//$this->createDatabase();
		$this->connectToDatabase();
		
		if($this->DatabaseConnection->query($MembershipTable) === true)
		{
			//echo "<p>Membership table created.";
		}
		else
		{
			echo "<p>Error creating Membership table: ".$this->DatabaseConnection->error."</p>";
		}
		
		if($this->DatabaseConnection->query($MenuTable) === true)
		{
			//echo "<p>Menu table created.";
		}
		else
		{
			echo "<p>Error creating Menu table: ".$this->DatabaseConnection->error;
		}
		
		if($this->DatabaseConnection->query($ItemTable) === true)
		{
			//echo "<p>Item table created.";
		}
		else
		{
			echo "<p>Error creating Item table: ".$this->DatabaseConnection->error;
		}
		
		if($this->DatabaseConnection->query($CustomerTable) === true)
		{
			//echo "<p>Customer table created.";
		}
		else
		{
			echo "<p>Error creating Customer table: ".$this->DatabaseConnection->error;
		}
		
		if($this->DatabaseConnection->query($OrderTable) === true)
		{
			//echo "<p>Order table created.";
		}
		else
		{
			echo "<p>Error creating Order table: ".$this->DatabaseConnection->error;
		}
		
		if($this->DatabaseConnection->query($TransactionTable) === true)
		{
			//echo "<p>Transaction table created.";
		}
		else
		{
			echo "<p>Error creating Transaction table: ".$this->DatabaseConnection->error;
		}
		
		//$this->DatabaseConnection->close();
	}
	
	function query($Sql)
	{
		return $this->DatabaseConnection->query($Sql);
	}
	
	/*function selectAllQuery()
	{
		private $selectAll = "SELECT * FROM Products";
		$Result = $this->DatabaseConnection->query($selectAll);
		
		if($Result->num_rows > 0)
		{
			while($Row = $Result->fetch_assoc())
			{
				
			}
		}
	}*/
}
?>