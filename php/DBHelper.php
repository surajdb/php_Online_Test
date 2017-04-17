<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="simplicity";
$conSuccess=false;
try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// set the PDO error mode to exception
	$conSuccess=true;
	$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//echo "Connected successfully";
} catch(PDOException $e) {
	echo "Connection failed: " . $e -> getMessage();
}
?>