<?php
require 'Session.php';
require 'GetQuestion.php';
require 'DBHelper.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Take Test</title>
		<meta name="description" content="This wbesite allows user to take certifacate based tests">
		<meta name="author" content="Admin">
		<meta name="keywords" content="my profile,my details,summary of profile, profiles">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
	</head>
		
	<body>
		<header>
		</header>
		<section>		
			<div  class="bodyContent">
				<form class="formTakeTest"  id="formUpdate" name="formUpdate" action="Question.php" method="post">
					<fieldset>
						<legend>
							Please select a test you want to take
						</legend>
						<br />
						<?php  getTest();?>						
						<br>
					</fieldset>
				</form>
			</div>
		</section>
		<link rel="stylesheet" href="../css/home.css">
		<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
	</body>
</html>

