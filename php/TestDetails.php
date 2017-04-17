<?php
require 'DBHelper.php';
require 'Constants.php';
session_start();

if (!empty($_POST)) {
	// form has been submitted.
	$testName = $_POST["tests"];
	echo "test --" . $testName;
}
else {

	if ($conSuccess) {
		$email = $_SESSION[userSessionEmail];
		$sql = "SELECT t.test_name
					  ,us.score_desc
					  ,us.score
					  ,us.user_attempts 
			     FROM user_score us JOIN tests t 
			       ON us.test_id = t.id 
			    INNER JOIN users u ON
			       u.id = us.user_id
			     WHERE u.email_id = ?";

		$stmt = $conn -> prepare($sql);
		$stmt -> execute(array($email));
		$result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
		//print_r($result);
		if (count($result) > 0) {			
			$conn = null;
		}
		else {
			$conn = null;
			echo "You have Not taken any tests";
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
		<title>Test Details</title>
		<meta name="description" content="This wbesite allows user to take certifacate based tests">
		<meta name="author" content="Admin">
		<meta name="keywords" content="test scores, test marks, test results">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<script>
		// script to fetch corresponding result for drop down
			function onSelect() {
				var prodlist = [];
				var x = document.getElementById("tests").selectedIndex;
				document.getElementById("grades").value = 
				document.getElementById("tests")[x].getAttribute("vartestgrade");
				document.getElementById("score").value = 
				document.getElementById("tests")[x].getAttribute("vartestscore");
				document.getElementById("attempt").value = 
				document.getElementById("tests")[x].getAttribute("vartestattempt");
			}
		</script>
	</head>

	<body>
		<header></header>
		<section>
			<div class="bodyContent">
				<form class="formUpdate"  id="formTestDetails" name="formTestDetails" action="TestDetails.php" method="post">
					<fieldset>
						<legend>
							View your Performance metrics
						</legend>
						<label for="speed">Select a Test:</label>
						<select id="tests" onchange="onSelect();">
							<option selected="selected">Select any test</option>
							<?php
							foreach ($result as $array) 
							{
								$test = $array['test_name'];
								$grade = $array['score_desc'];
								$score =  $array['score'];
								$attempt =  $array['user_attempts'];
								echo "<option value='" .$test. "' 
								vartestgrade='" . $grade . "'
								vartestscore='" . $score . "'
								vartestattempt='" . $attempt . "
								'>" . $test . "</option>";
							};
							?>							
						</select><br/><br/><br/>
						<label for="score">&nbsp;&nbsp;Score for this Test :</label>						
						<input type="text" id="score"  value="" readonly style="width:200px" ><br />
						<label for="attempt" >Number of Attempts  :</label>						
						<input type="text" id="attempt"  value="" readonly style="width:200px" ><br />
						---===Remarks===---<br />
						<textarea  id="grades" cols="50" rows="2" readonly="readonly"></textarea>
						
						</fieldset>
				</form>
			</div>
		</section>
		<link rel="stylesheet" href="../css/home.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
	</body>
</html>
