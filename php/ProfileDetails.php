<?php
require 'DBHelper.php';
require 'Constants.php';
session_start();
if (!empty($_POST)) {
	if ($conSuccess) {
		$email = $_SESSION[userSessionEmail];
		$password = $_POST[password];
		$phone = $_POST[phone];
		$address = $_POST[addr];
		$sql = "UPDATE users SET password=?, phone=?, address=? where email_id=?";
		$stmt = $conn -> prepare($sql);
		$stmt -> execute(array(
			$password,
			$phone,
			$address,
			$email
		));
		if ($stmt) {			
			$conn = null;
			header("location:Dashboard.php");
		}
		else {
			$conn = null;
			echo error;
		}
	}
	else {
		//connection not successfull
		$conn = null;
		echo "fail";
	}
}
else {
	if ($conSuccess) {
		$email = $_SESSION[userSessionEmail];
		$sql = "SELECT * FROM users where email_id=?";
		$stmt = $conn -> prepare($sql);
		$stmt -> execute(array($email));
		$result = $stmt -> fetch(PDO::FETCH_ASSOC);
		if (count($result) > 1) {
			$conn = null;
		}
		else {
			$conn = null;
			echo error;
		}
	}
	else {
		//connection not successfull
		$conn = null;
		echo "fail";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Profile Details</title>
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
				<form class="formUpdate"  id="formUpdate" name="formUpdate" action="ProfileDetails.php" method="post">
					<fieldset>
						<legend>
							<!-- <button class="ui-button ui-widget ui-corner-all" onclick="editEnable();">Edit</button> -->						
							<?php echo "Welcome " . $result[fname] . "!! Check out your profile below"; ?>
							</legend>
						<input type="hidden" name="myProfile" value="myProfile">

						<input type="text" id="f_name" name="f_name" placeholder='<?php echo $result[fname]; ?>' required pattern="[a-zA-Z]+" readonly="readonly">
						<!-- <br> -->
						<input type="text" id="l_name" name="l_name" placeholder='<?php echo $result[lname]; ?>' required pattern="[a-zA-Z]+" title="No numbers in Last Name" readonly="readonly">
						<!-- <br> -->
						<input type="email" id="emailReg" name="email_id" required placeholder='<?php echo $result[email]; ?>' readonly="readonly">
						<!-- <br> -->
						<input type="password" id="passwordReg" name="password" value='<?php echo $result[password]; ?>' required placeholder="new strong password" pattern="[a-zA-Z0-9]\w{3,14}" title="Enter between 4-14 characters excluding special characters">
						<!-- <br> -->
						<input type="text" id="phone" name="phone" value='<?php echo $result[phone]; ?>' required placeholder="phone number" pattern="^[2-9]\d{2}\d{3}\d{4}$" title="Enter phone number as 6478881111">
						<!-- <br> -->
						<input type="text" id="address" name="address" placeholder='Downtown Toronto' value='<?php echo $result[addr]; ?>' required title="Address cannot be blank">
						<br>
						<label for="gender">Gender:</label>
						<label id="gender"><?php echo strcasecmp($result[gender],"m")?"Female":"Male"; ?></label>
						<br>
						<br>
						<input type="submit" class="ui-button ui-widget ui-corner-all" id="updateProfile" value="Update Profile">
						<br>
					</fieldset>
				</form>
			</div>
		</section>

		<link rel="stylesheet" href="../css/home.css">
		<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<script>
			function editEnable() {
				alert("hi rhre");
				document.getElementById('phone').readOnly = true;
				document.getElementById('address').readOnly = true;
			}
		</script>
	</body>
</html>

