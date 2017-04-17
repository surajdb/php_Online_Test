<?php
//fetch all the tests from database
function getTest() {
	global $conn;
	$stmt = $conn -> prepare('SELECT id
									,test_name 
								FROM tests');
	$stmt -> execute();
	$result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
	foreach ($result as $key => $value) {
		print("<input type='submit' name='test' value='" . $value['test_name'] . "' ><br />");
	}
};

function getRandomArray ()
{
	$randomArray = array();
		for ($i = 1; $i <= 20; $i++) {
		$randomQ = rand(1, 20);
		if (count($randomArray) == 10) {
			break;
		}
		if (!in_array($randomQ, $randomArray)) {
			array_push($randomArray, $randomQ);
		}
	}
		return $randomArray;
}
//fetch all the questions from database
function getQuestion() {
	global $conn;
	$test_name = $_POST['test'];
	$stmt1 = $conn -> prepare('SELECT tq.option_val 
							 	 FROM test_question  tq
							    INNER JOIN tests t ON
									  t.id = tq.test_id
							    WHERE tq.option      = 0 
							      AND t.test_name    = ? 
							      AND tq.question_no = ?');
	$stmt2 = $conn -> prepare('SELECT tq.option_val 
								 FROM test_question tq
							    INNER JOIN tests t ON
									  t.id = tq.test_id
	 						    WHERE tq.option      = ? 
	 						      AND t.test_name    = ? 
	 						      AND tq.question_no = ?');
	// loop through all the questions
	$randomArray = getRandomArray();
	for ($i = 0; $i < 10; $i++) {
		$stmt1 -> execute(array(
			$test_name,
			$randomArray[$i]
		));
		$result = $stmt1 -> fetch(PDO::FETCH_ASSOC);
		$question = str_replace("\n", "<br />", $result['option_val']);

		print('<div id="tabs-' . ($i+1) . '">
						<h2 id="'.$randomArray[$i].'">Question ' .($i+1)  . '</h2>
						<h4>' . $question . '</h4>
						<div ><br>');
		// loop through all the options
		for ($j = 1; $j <= 4; $j++) {
			$stmt2 -> execute(array(
				$j,
				$test_name,
				$randomArray[$i]
			));
			$result2 = $stmt2 -> fetch(PDO::FETCH_ASSOC);
			$option = str_replace("\n", "<br />", $result2['option_val']);
			print('<code>');
			print('<input type="radio"  name="' .($i+1) . '" value="' . $j . '">' . $option . '<br><br />');
			print('</code>');
		}
		// to assign a hidden input tag to makeout the question number of a question==> ***refer CalculateScore.php line number 58
		print('<input  type="hidden" name="'.($i+11). '" value="'.$randomArray[$i].'" readonly  style="border: hidden">');
		print('	</div></div>');
	}
};
?>
