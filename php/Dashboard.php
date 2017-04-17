<?php
require 'Session.php';
$conn =null;
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Dashboard</title>
		<meta name="description" content="User profile page where profile details can be updated, test results can be checked and tests can be taken">
		<meta name="author" content="Admin">
		<meta name="keywords" content="my profile, test result, take tests">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
	</head>

	<body>
		<header>
			<div id="headerLogo" class="headerLogo">
				<h1>Simplicity Test Center</h1>
				<div class="logout">
					<button type="submit" onClick="location.href='logout.php'"/>Logout</button>
				</div>
			</div>
		</header>
		<section>
			<div id="tabs">
				<ul class="tabList">
					<li>
						<a href="ProfileDetails.php">My Profile</a>
					</li>
					<li>
						<a href="TestDetails.php">Test Details</a>
					</li>
					<li>
						<a href="TakeTest.php">Take Test</a>
					</li>
				</ul>
				<!-- <div id="tabContent">
				<p>
				We need to load all these content via ajax from php.
				</p>
				</div> -->
			</div>
		</section>
		<footer>
			<div>
				<hr>
				<p>
					&copy; Copyright by Suraj
				</p>
			</div>
		</footer>
		<link rel="stylesheet" href="../css/home.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<script>
			$(function() {
				$("#tabs").tabs({
					heightStyle : "content",
					create : function(event, ui) {

					},
					beforeLoad : function(event, ui) {
						ui.jqXHR.fail(function() {
							ui.panel.html("Couldn't load this tab. We'll try to fix this as soon as possible. " + "If this wouldn't be a demo.");
						});
					}
				});

			});
		</script>
	</body>
</html>

