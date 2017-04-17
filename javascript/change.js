//to auto submit the test
min = 10;
secs = 00;
timer = setInterval(function() {
	var element = document.getElementById("status");
	// element.innerHTML = "<h3 style='color:red'>You have <b>"+min+":"+secs+"</b> remaining !</h3>";
	element.innerHTML = "You have <b>" + min + ":" + secs + "</b> remaining !";

	if (secs < 1) {
		if (min < 1) {
			clearInterval(timer);
			document.getElementById("form").submit();
		}
		min--;
		secs = 60;
	}
	secs--;
}, 1000);

// to change color for marked question
function changeColor() {
	for (var $j = 1; $j <= 10; $j++) {
		var elements = document.getElementsByName($j);
		for ( $i = 0; $i < elements.length; $i++) {
			if (elements[$i].checked) {
				document.getElementById($j).style.color = "#FFFF00";
				// forecolor
			}
		}
	}
}
