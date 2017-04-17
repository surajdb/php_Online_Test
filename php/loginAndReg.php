<?php
require 'Constants.php';
require 'DBHelper.php';
session_start();
$formName = $_POST["formName"];
if ($formName == "formLogin") {
	// login action taken
	if ($conSuccess) {
		//conn is active
		$email = trim($_POST[email]);
		$password = trim($_POST[password]);
		$stmt = $conn -> prepare('SELECT id,f_name FROM users WHERE email_id = ? AND password=?');
		$stmt -> execute(array(
			$email,
			$password
		));
		$result = $stmt -> fetch(PDO::FETCH_ASSOC);
		if (count($result) > 1) {
			// user exists
			echo "exists";
			$_SESSION[userSessionEmail] = $email;
			$_SESSION[userId] = $result["id"];
			echo "id here---->" . $result["id"];
			header("Location: Dashboard.php");
			$conn = null;
		}
		else {
			//no match found
			$conn = null;
			header("Location: Home.php");
		}
	}
	else {
		//connection not successfull
		$conn = null;
	}
}
else {
	// register Logic

	$fname = trim($_POST[fname]);
	$lname = trim($_POST[lname]);
	$email = trim($_POST[email]);
	$password = trim($_POST[password]);
	$phone = trim($_POST[phone]);
	$addr = trim($_POST[addr]);
	$gender = trim($_POST[gender]);
	$date = date("Y-m-d");

	if ($conSuccess) {
		try {
			//conn is active
			//check if user already exists in DB
			$stmt = $conn -> prepare('SELECT id,f_name FROM users WHERE email_id = ?');
			$stmt -> execute(array($email));
			$result = $stmt -> fetch(PDO::FETCH_ASSOC);
			if (count($result) > 1) {
				// user email already exists in DB
				header('location:Home.php?action=emailexists');
			}
			else {
				// create a new user
				$sql = "INSERT INTO users (f_name,l_name,email_id,password,phone,address,gender,start_dte) VALUES (:fname,:lname,:email,:password,:phone,:address,:gender,:start_dte) ";

				$stmt = $conn -> prepare($sql);
				$stmt -> bindParam(":fname", $fname);
				$stmt -> bindParam(":lname", $lname);
				$stmt -> bindParam(":email", $email);
				$stmt -> bindParam(":password", $password);
				$stmt -> bindParam(":phone", $phone);
				$stmt -> bindParam(":address", $addr);
				$stmt -> bindParam(":gender", $gender);
				$stmt -> bindParam(":start_dte", $date);
				$stmt -> execute();
				$_SESSION[userSessionEmail] = $email;
				$_SESSION[userId] = $result['id'];

				header('location:Dashboard.php');
			}
		}
		catch (PDOException $e) {
			echo "Error: " . $e -> getMessage();
		}
		$conn = null;
	}
}
?>