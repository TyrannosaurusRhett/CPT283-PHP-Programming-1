<?php # Program 3 - heat.php
	# Created on September 8, 2021
	# Created by Taylor Rhett
	# This script calculates heat index using a self-validating form

$page_title = 'Welcome to the Weather Wizards Site!';
include('includes/header.html');

?>


	<h1>Heat Index</h1>
	<p>In the Summer, when people say "It’s not the heat, it’s the humidity", what do they mean? There are 2 factors that make a hot day feel really hot. The first is the air temperature and the second is relative humidity. After taking measurements for temperature and relative humidity, we can calculate a heat index that is called our “feels like” temperature.</p>

	<p>HI means Heat Index (the “Feels Like” Temperature).</p>

	<p>T means the air temperature (This  formula works when temperatures are in the range of 80 to 112).</p>

	<p>RH means relative humidity (This  formula works when relative humidity is in the range of 13 to 85)</p>

	<?php 

	//function calculates heat index
	function calculate_heat_index($temperature, $humidity) {

		//calculate heat index
		$heat_index = -42.379 + 2.04901523 * $temperature + 10.14333127 * $humidity - .22475541 * $temperature * $humidity - .00683783 * $temperature * $temperature - .05481717 * $humidity * $humidity + .00122874 * $temperature * $temperature * $humidity + .00085282 * $temperature * $humidity * $humidity - .00000199 * $temperature * $temperature * $humidity * $humidity;

		//return the result
		return number_format($heat_index, 7);

	} //end of calculate_heat_index



	//check relative hunidity values are within acceptable range
	// if (($_POST['humidity'] >= 13) && ($_POST['humidity'] <= 85)) {
	// 	$humidity = $_POST['humidity'];
	// } else { //form value outside of acceptable range
	// 	echo '<p class="error">The humidity should be a number between 13 and 85.</p>';

	// }

	//print the submitted information
	if (!empty($_POST['temperature']) && !empty($_POST['humidity']) && is_numeric($_POST['temperature']) && is_numeric($_POST['humidity']) && ($_POST['temperature'] >= 80) && ($_POST['temperature'] <= 112) && ($_POST['humidity'] >= 13) && ($_POST['humidity'] <= 85)) {

		//calculate the heat index
		$heat = calculate_heat_index($_POST['temperature'], $_POST['humidity']);

		//print the results
		echo '<br><p class="index">The Heat Index is ' . $heat . '!</p>';

	} else { //missing form value
		echo '<p class="error">Please try again.</p>';
	}



	?>

	<form name="heat.php" method="post" action="<?php 
	echo $_SERVER['PHP_SELF']; ?>">
		<fieldset><legend>Get the Heat Index</legend>
			<table id="heat">
				<tr>
					<td><label>Temperature:</label></td>
					<td><input type="number" name="temperature" value="<?php echo $temperature; ?>"></td>
				</tr>
				<tr>
					<td><label>Humidity</label></td>
					<td><input type="number" name="humidity" value="<?php echo $humidity; ?>"></td>
				</tr>
			</table>

			<p><input type="submit" name="submit" value="Gimme the Heat Index"></p>
			
		</fieldset>	
	</form>

	<p>If you need to take the temperature, but don't have a Thermometer, then see our <a href="workshops.php">Weather Workshops</a> to find a workshop on How to make a Thermometer.</p>

	<p>If you need to measure the relative humidity, but don't have a Hygrometer. Don't worry, we have a <a href="workshops.php">Weather Workshops</a> that shows you how to make a Hygrometer too!</p>

	<p>(You can go to the website for those other guys <a href="https://weather.com/" target="_blank">The Weather Channel</a> to get these measurements, but taking measurements from them isn't as much fun as doing it yourself.)</p>

	<?php

	include('includes/footer.html');
	?>