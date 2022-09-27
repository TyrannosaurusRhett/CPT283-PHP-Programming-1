<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>RhettTProgram1</title>
	<style>
		h1{
			display: flex;
			justify-content: center;
		}
		table{
			border-collapse: collapse;
			width: 100%;
			text-align: center;
		}
		tr{
			border-bottom: 2px solid rgb(25, 25, 112); /*midnight blue*/
		}
		tr:nth-of-type(even){
			background-color: rgb(95, 158, 160, .4); /*cadet blue*/
		}
	</style>
</head>
<body>
	<?php # Program 1
	# Created on Augist 27, 2021
	# Created by Taylor Rhett
	# This script calculates heat index

	//set the constants
	define('TITLE', 'Today\'s Heat Index');
	define('TEMPERATURE', 'Temperature');
	define('HUMIDITY', 'Relative Humidity');
	define('FEELSLIKE', 'Feels Like');

	//set the variables
	$T = 88; //temperature
	$RH = 56; //relative humidity


	//calculations to determine heat index
	$HI = -42.379 + 2.04901523 * $T + 10.14333127 * $RH - .22475541 * $T * $RH - .00683783 * $T * $T - .05481717 * $RH * $RH + .00122874 * $T * $T * $RH + .00085282 * $T * $RH * $RH - .00000199 * $T * $T * $RH * $RH;

	/*outputs
	echo '' . TITLE . '';
	echo '' . TEMPERATURE . '';
	echo "<h1>$T</h1>";
	echo '' . HUMIDITY . '';
	echo "<h1>$RH</h1>";
	echo '' . FEELSLIKE . '';
	echo "<h1>$HI</h1>";*/

	?>
	<h1>Charleston Weather</h1>
	<table>
		<tr>
			<th colspan="3"><?php echo '<h2>' . TITLE . '</h2>'; ?></th>
		</tr>
		<tr>
			<th><?php echo '<h3>' . TEMPERATURE . '</h3>'; ?></th>
			<th><?php echo '<h3>' . HUMIDITY . '</h3>'; ?></th>
			<th><?php echo '<h3>' . FEELSLIKE . '</h3>'; ?></th>
		</tr>
		<tr>
			<td><?php echo "<h3>$T</h3>"; ?></td>
			<td><?php echo "<h3>$RH</h3>"; ?></td>
			<td><?php echo "<h3>$HI</h3>"; ?></td>
		</tr>
	</table>

</body>
</html>