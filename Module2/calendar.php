<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Calendar</title>

</head>
<body>
	<form action="calendar.php" method="post">
	<?php # Script 2.9 - calendar.php
	# Created September 3, 2021
	# Created by Taylor Rhett
	# This script creates three pull-down menus for an html form

	//make months array
	$months = [1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

	//make months pull-down menu
	echo '<select name="month">';
	foreach ($months as $key => $value) {
		echo "<option value=\"$key\"> $value </option>\n";
	}
	echo '</select>';

	//make days pull-down menu
	echo '<select name="day">';
	for ($day=1; $day <= 31; $day++) { 
		echo "<option value=\"$day\">$day</option>\n";
	} echo '</select>';

	//make years pull-down menu
	echo '<select name="year">';
	for ($year=2017; $year <= 2027; $year++) { 
		echo "<option value=\"$year\">$year</option>\n";
	} echo '</select>';

	?>
	</form>

</body>
</html>