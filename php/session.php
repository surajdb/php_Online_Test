<?php
require 'DBHelper.php';
require 'Constants.php';
session_start();
if (empty($_SESSION[userSessionEmail]) && !isset($_SESSION[userSessionEmail])) {

	header("location:Home.php");
	$conn = null;
}
else $conn = null;
?>