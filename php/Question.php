<?php
require 'GetQuestion.php';
require 'Session.php';
require 'DBHelper.php';
if (!isset($_POST['test'])) {
	header("location:Dashboard.php");
}
$test_name = $_POST['test'];
?>
<!doctype html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Simplicity Test Series-Test in Progress</title>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="../css/home.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script type='text/javascript' src="../javascript/change.js"></script>
		<script>
			$(function() {
				$("#tabs").tabs().addClass("ui-tabs-vertical ui-helper-clearfix");
				$("#tabs li").removeClass("ui-corner-top").addClass("ui-corner-left");
			});
		</script>
		<style>
			.ui-tabs-vertical {
				width: 55em;
				margin: 0 auto;
			}
			.ui-tabs-vertical .ui-tabs-nav {
				padding: .2em .2em .2em .2em;
				float: left;
				width: 12em;
			}
			.ui-tabs-vertical .ui-tabs-nav li {
				background: #08ae9e;
				clear: left;
				width: 100%;
				border-bottom-width: 3px !important;
				border-right-width: 0 !important;
				margin: 0 -1px .2em 0;
			}
			.ui-tabs-vertical .ui-tabs-nav li a {
				display: block;
			}
			.ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active {
				padding-bottom: 0;
				padding-right: .1em;
				border-right-width: 1px;
			}
			.ui-tabs-vertical .ui-tabs-panel {
				padding: 1em;
				float: right;
				width: 35em;
			}
		</style>
	</head>
	<body>
		<div id="status"></div>
		<form  class="questionTab" name="question" action="CalculateScore.php" id ="form" method="post">
			<fieldset>
				<legend>
					<?php echo "Current test: " . $test_name; ?>
				</legend>

				<div id="tabs" style="background: #E0E0E0;">
					<ul >
						<?php
						for ($i = 1; $i <= 10; $i++) {
							print('<li><a href="#tabs-' . $i . '" id ="' . ($i) . '" onclick="changeColor();">Question ' . $i . '</a></li>');
						}
						?>
					</ul>
					<?php getQuestion(); ?>
				</div>
				<br>
				<input type="hidden" name="test_name" value="<?php echo $test_name; ?>">
				<input type="submit" name="go" id ="completeTest" value="Submit Answer"/>
			</fieldset>
		</form>
	</body>
</html>