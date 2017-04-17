<?php
require 'Constants.php';
require 'DBHelper.php';

session_start();
$email = $_SESSION[userSessionEmail];
$test_name = $_POST['test_name'];
$score = checkAnswer();	
	
	function getUserbyEmail($email)
	{
			global $conn; 
			$stmt = $conn -> prepare('SELECT id 
  										FROM users  
  									   WHERE email_id = ?');
			$stmt -> execute(array( $email ));	
			$result = $stmt -> fetch(PDO::FETCH_ASSOC);
			return $result['id'];
	};
	
	function getUserNamebyEmail($email)
	{
			global $conn; 
			$stmt = $conn -> prepare('SELECT f_name 
  										FROM users  
  									   WHERE email_id = ?');
			$stmt -> execute(array( $email ));	
			$result = $stmt -> fetch(PDO::FETCH_ASSOC);
			return $result['f_name'];
	};
	
	function getTestidbyName($test_name)
	{
			global $conn; 
			$stmt = $conn -> prepare('SELECT id 
  										FROM tests  
  									   WHERE test_name = ?');
			$stmt -> execute(array( $test_name ));	
			$result = $stmt -> fetch(PDO::FETCH_ASSOC);
			return $result['id'];
	};
	function calculateGrade($score)
	{
		global $test_name;
		if ($score>=8)
				$grade ="You have successfully passed the test. You are now	certified in".$test_name;
		
		else 	$grade = "Unfortunately you did not pass the test. Please try again later!";
		return $grade;
	};
	
	function checkAnswer(){
	    $counter = 0;
		global $conn; 
		$test_name = $_POST['test_name'];
		for ( $i=1;$i<=10;$i++)
		{
			if(isset($_POST[$i]))	{
			$answer = $_POST[$i];
			$question_no =	$_POST[$i+10]; // ***becuase question is taken 11-20
			$stmt = $conn -> prepare('SELECT a.id 
										FROM test_question a INNER JOIN 
											 test_question b 
									  	 ON( a.test_id     = b.test_id 
			 						 	 AND a.question_no = b.question_no)  
			 						   INNER JOIN tests t ON
											 t.id = a.test_id										 
									   WHERE a.option = b.option_val
									     AND b.option = 5
									     AND t.test_name   = ?
									     AND a.question_no = ?
									     AND a.option      = ?');
				$stmt -> execute(array($test_name, $question_no, $answer));	
				$result = $stmt -> fetch(PDO::FETCH_ASSOC);
					if (!is_null($result['id'])) {
						$counter= $counter+1;
						
					}
			}		
		}
		return $counter;
	};

	function updateResult(){
			//global $counter;
			global $conn; 
			global $test_name;
			global $email;
			global $score;
			$grade = calculateGrade(checkAnswer());
			$user_id = getUserbyEmail($email);
			$test_id = getTestidbyName($test_name);
			$stmt = $conn -> prepare('SELECT user_attempts 
  										FROM user_score 
									   WHERE user_id = ?
									     AND test_id = ?');
			$stmt -> execute(array($user_id, $test_id ));	
			$result = $stmt -> fetch(PDO::FETCH_ASSOC);
			$attempts = $result['user_attempts'];
			//update the number of attempts
			if (!is_null($attempts)) {
					$stmt = $conn -> prepare('UPDATE user_score 
		  										 SET  user_attempts = ?
		  										     ,score_desc    = ?	
		  										     ,score         = ?
											   WHERE user_id 		= ?
											     AND test_id 		= ?');
					$stmt -> execute(array( ($attempts+1), $grade,$score, $user_id, $test_id ));
					
					print("Your total attempts so far : ".($attempts+1)) ;									
				}
			//If not exist then insert new row
			else{
				$stmt = $conn -> prepare(' INSERT INTO user_score 
													 (user_id
													 ,test_id
													 ,score
													 ,score_desc
													 ,user_attempts)
										   VALUES (  ? , ? , ? , ? , ?)');
				$stmt -> execute(array( $user_id, $test_id, checkAnswer(), $grade, 1 ));	
				print("Hello ".getUserNamebyEmail($email)." this was your first attempt!") ;		
				}
		
	}	;
	//update the number of attempts
?>

<body>
	<section>
	<div  class="bodyContent">
			<form class="formResult"  id="formResult" name="formResult" action="Dashboard.php" method="post">
				<fieldset>
					<legend>
						 Results
					</legend>
					<?php 	
						print("<h4>".getUserNamebyEmail($email)." your score for ".$test_name."  is : ".checkAnswer()."/10</h4>") ; 
						updateResult();
						print("<br/><h4>".calculateGrade(checkAnswer())."</h4>");
						print("<br>")?>
					<input type="submit" class="ui-button ui-widget ui-corner-all" id="" value="Go to Dashboard">
					<br>
				</fieldset>
			</form>
	</div>
			<link rel="stylesheet" href="../css/home.css">
</body>
