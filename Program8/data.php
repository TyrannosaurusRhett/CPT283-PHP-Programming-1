<?php //Program8 - data.php
	# Created October 7, 2021
	# Created by Taylor Rhett
	# This script displays weather statistics for various cities

$page_title = 'Climate Data For All Cities';
include('includes/header.html');

//Require inclusion of database
require('mysqli_connect.php');

?>

<h1>Climate Data For All Cities</h1>

<?php 

//Make the query
$query = "SELECT * FROM city_stats
ORDER BY city ASC";
$record = @mysqli_query ($dbc, $query);

//Count number of entries
$num = mysqli_num_rows($record);

if ($record) { //display records if query works
	//start table
	echo '<table class="cities"> 
	<thead>
		<tr>
			<th>City</th>
			<th>State</th>
			<th>High</th>
			<th>Low</th>
			<th>Days Clear </th>
			<th>Days Cloudy</th>
			<th>Days With Precip</th>
			<th>Days With Snow</th>
		</tr>
		<tbody>
	';

	//print number of entries
	echo "<p>There are currently $num cities in the database.</p>";

	//fetch and print records
	while ($row = mysqli_fetch_array($record, MYSQLI_ASSOC)) {
		echo '<tr><td>' . $row['city'] . '</td><td>' . $row['state'] . '</td><td>' . $row['record_high'] . '</td><td>' . $row['record_low'] . '</td><td>' . $row['days_clear'] . '</td><td>' . $row['days_cloudy'] . '</td><td>' . $row['days_with_precip'] . '</td><td>' . $row['days_with_snow'] . '</td></tr>';
	}

	echo '</tbody></table>'; //end table

	mysqli_free_result($record); //free the resources

} else { //if it didn't run

	//error message
	echo '<p class="error">There are currently no cities in the database.</p>';

} //end of if

mysqli_close($dbc); //close connection to database

include('includes/footer.html');

?>