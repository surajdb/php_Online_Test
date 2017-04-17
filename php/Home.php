<?php
if (isset($_GET['action'])) {
	$user = $_GET['action'];
	echo "<script type='text/javascript'>alert('User with the same email already exists!!');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Home Page</title>
		<meta name="description" content="This wbesite allows user to take certifacate based tests">
		<meta name="author" content="Admin">
		<meta name="keywords" content="course,test,certifcate,exam,preparation,modules">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
	</head>

	<body>
		<header>
			<div id="headerLogo" class="headerLogo">
				<h1>Simplicity Test Center</h1>

				<form class="formLogin" id="formLogin" name="formLogin" action="LoginAndReg.php" method="post">
					<input type="email" id="email_id" name="email_id" required placeholder="example@gmail.com">
					<input type="password" id="password" name="password" required placeholder="your password" pattern="^[a-zA-Z0-9]\w{3,14}$" title="Enter between 4-14 characters excluding special characters">

					<input type="hidden" name="formName" value="formLogin">
					<input class="ui-button ui-widget ui-corner-all" type="submit" id="loginUser" value="Login" name="submitLogin">
					<input class="ui-button ui-widget ui-corner-all" type="reset" id="resetUser" value="Reset">
					<br>
				</form>

			</div>
		</header>
		<section>
			<div  class="bodyContent">
				<div id="contentLeft" class="contentLeft">
					<h2>
					<p align="center">
						Test with Us
					</p></h2>
					<p>
						Most popular tests taken by users:
					</p>
					<ul>

						<li>
							Basic level Swift
							<ul type="circle">
								<li>
									Enums,Optionals
								</li>
								<li>
									Variables and Functions
								</li>
							</ul>
						</li>
						<li>
							Basic level Php
							<ul type="circle">
								<li>
									Variables and functions
								</li>
								<li>
									Mysql DB
								</li>
							</ul>
						</li>
						</li>
					</ul>

					<p>
						Upcoming Tests
					</p>
					<ul>

						<li>
							Basic Java
						</li>
						<li>
							Basic Python
						</li>
					</ul>
				</div>

				<form class="formReg"  id="formReg" name="formReg" action="LoginAndReg.php" method="post">

					<fieldset>
						<legend>
							Register Yourself
						</legend>
						<input type="hidden" name="formName" value="formReg">

						<input type="text" id="f_name" name="f_name" placeholder="First Name" required pattern="[a-zA-Z]+">
						<!-- <br> -->
						<input type="text" id="l_name" name="l_name" placeholder="Last Name" required pattern="[a-zA-Z]+" title="No numbers in Last Name">
						<!-- <span>*</span> -->
						<!-- <br> -->
						<input type="email" id="emailReg" name="email_id" required placeholder="example@gmail.com">
						<!-- <span>*</span> -->
						<!-- <br> -->
						<input type="password" id="passwordReg" name="password" required placeholder="a strong password" pattern="[a-zA-Z0-9]\w{3,14}" title="Enter between 4-14 characters excluding special characters">
						<!-- <span>*</span> -->
						<!-- <br> -->
						<input type="text" id="phone" name="phone" required placeholder="your number here" value="" pattern="^[2-9]\d{2}\d{3}\d{4}$" title="Enter phone number as 6478881111">
						<!-- <span>*</span> -->
						<!-- <br> -->
						<input type="text" id="address" name="address" placeholder="full address">
						<!-- <span>*</span> -->
						<br>
						<br>
						<label for="female">Female</label>
						<input type="radio" name="gender" id="female" value="f" required>
						<label for="male">Male</label>
						<input type="radio" name="gender" id="male" value="m" required>
						<br>
						<br>
						<input type="submit" id="registerUser" value="Register">
						<input type="reset" id="resetReg" value="Reset">
						<br>
						<br>
					</fieldset>

				</form>

			</div>
		</section>

		<footer>
			<div>
				<hr>
				<p>
					&copy; Copyright Suraj
				</p>
			</div>
		</footer>

		<link rel="stylesheet" href="../css/home.css">
		<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
	</body>
</html>
