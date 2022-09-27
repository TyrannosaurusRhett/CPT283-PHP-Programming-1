<link rel="stylesheet" href="styles.css">

<?php //Program8 - data.php
	# Created October 7, 2021
	# Created by Taylor Rhett
	# This script displays weather statistics for various cities

$page_title = 'Climate Data For All Cities';
include('includes/header.html');

//Require inclusion of database
require('mysqli_connect.php');

//determine number of records shown per page
$display = 15;

//determine number of pages
if (isset($_GET['p']) && is_numeric($_GET['p'])) { //already determined
	$pages = $_GET['p'];
} else { //need to determine

	//count the number of entries
	$query = "SELECT COUNT(city) FROM city_stats";
	$record = @mysqli_query($dbc, $query);
	$row = @mysqli_fetch_array($record, MYSQLI_NUM);
	$entries = $row[0];

	//calculate number of pages
	if ($entries > $display) { //more than one page
		$pages = ceil ($entries/$display);
		} else {
			$pages = 1;
			}
	} //end of p if

//determine where to start returning results
if (isset($_GET['s']) && is_numeric($_GET['s'])) {
	$start = $_GET['s'];
} else {
	$start = 0;
	}

//determine sort
//default is city name
$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'ct';

//determine sort order
switch ($sort) {
	case 'st':
		$order_by = 'state ASC';
		break;
	case 'hi':
		$order_by = 'record_high ASC';
		break;
	case 'lo':
		$order_by = 'record_low ASC';
		break;
	case 'cle':
		$order_by = 'days_clear ASC';
		break;
	case 'clo':
		$order_by = 'days_cloudy ASC';
		break;
	case 'pr':
		$order_by = 'days_with_precip ASC';
		break;
	case 'sn':
		$order_by = 'days_with_snow ASC';
		break;
	default:
		$order_by = 'city ASC';
		$sort = 'ct';
		break;
}

?>

<h1>Climate Data For All Cities</h1>

<?php 

//Make the query
$query = "SELECT * FROM city_stats
ORDER BY $order_by LIMIT $start, $display";
$record = @mysqli_query ($dbc, $query);

//Count number of entries
$num = mysqli_num_rows($record);

if ($record) { //display records if query works
	//start table
	echo '<table class="cities"> 
	<thead>
		<tr>
			<th><a href="data.php?sort=ct">City</a></th>
			<th><a href="data.php?sort=st">State</a></th>
			<th><a href="data.php?sort=hi">High</a></th>
			<th><a href="data.php?sort=lo">Low</a></th>
			<th><a href="data.php?sort=cle">Days Clear</a></th>
			<th><a href="data.php?sort=clo">Days Cloudy</a></th>
			<th><a href="data.php?sort=pr">Days With Precip</a></th>
			<th><a href="data.php?sort=sn">Days With Snow</a></th>
		</tr>
		<tbody>
	';

	//print number of entries
	echo "<p>There are currently $num cities in the database.</p>";

	//fetch and print records
	while ($row = mysqli_fetch_array($record, MYSQLI_ASSOC)) {
		echo '<tr><td>' . $row['city'] . '</td><td>' . $row['state'] . '</td><td align="right">' . $row['record_high'] . '</td><td align="right">' . $row['record_low'] . '</td><td align="right">' . $row['days_clear'] . '</td><td align="right">' . $row['days_cloudy'] . '</td><td align="right">' . $row['days_with_precip'] . '</td><td align="right">' . $row['days_with_snow'] . '</td></tr>';
	}

	echo '</tbody></table>'; //end table

	mysqli_free_result($record); //free the resources

} else { //if it didn't run

	//error message
	echo '<p class="error">There are currently no cities in the database.</p>';

} //end of if

mysqli_close($dbc); //close connection to database

//make links to other pages
if ($pages > 1) {
	
	echo '<br><p>';

	//determine what page script is on
	$current_page = ($start/$display) + 1;

	//make "previous" link if not on first page
	if ($current_page != 1) {
		echo '<a href="data.php?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a> ';
	}

	//make numbered pages
	for ($i = 1; $i <= $pages; $i++) {
		if ($i != $current_page) {
			echo '<a href="data.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a> ';
		} else {
			echo $i . ' ';
			}
		} //end of for loop

	//make "next" button if not on last page
	if ($current_page != $pages) {
		echo '<a href="data.php?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a> ';
	}

	echo '</p>'; //close paragraph
} //end of database links

include('includes/footer.html');

?>