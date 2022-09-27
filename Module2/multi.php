<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Multidimensional Array</title>
	
</head>
<body>
	<p>Some North American States, Provinces, and Territories:</p>
	<?php # Script 2.7 - multi.php
	# Created on September 3, 2021
	# Created by Taylor Rhett

	//create one array
	$mexico = [
		'YU' => 'Yucatan',
		'BC' => 'Baja California',
		'OA' => 'Oaxaca'
	];

	//create another array
	$us = [
		'SC' => 'South Carolina',
		'IL' => 'Illinois',
		'CO' => 'Colorado',
		'AK' => 'Alaska',
		'WA' => 'Washington'
	];

	//create a third array
	$canada = [
		'QC' => 'Quebec',
		'AB' => 'Alberta',
		'NT' => 'Northwest Territories',
		'YT' => 'Yukon',
		'PE' => 'Prince Edward Island'
	];

	//combine arrays
	$n_america = [
		'Mexico' => $mexico,
		'United States' => $us,
		'Canada' => $canada
	];

	//loop through the countries:
	foreach ($n_america as $country => $list) {
		//print a heading
		echo "<h2>$country</h2><ul>";

		//print each state, provence, or territory
		foreach ($list as $k => $v) {
			echo "<li>$k - $v</li>\n";
		}

		//close the list
		echo '</ul>';
	} //end of main foreach

	?>

</body>
</html>