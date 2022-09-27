<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sorting Array</title>
	
</head>
<body>
	<table border="0" cellspacing="3" cellpadding="3" align="center">
		<thead>
			<tr>
				<th><h2>Rating</h2></th>
				<th><h2>Title</h2></th>
			</tr>
		</thead>
		<tbody>
		<?php # Script 2.8 - sorting.php
		# Created on September 3, 2021
		# Created by Taylor Rhett

		//create the array
		$movies = [
			'Casablanca' => 10,
			'To Kill a Mockingbird' => 10,
			'The English Patient' => 2,
			'Stranger Than Ficiton' => 9,
			'Story of the Weeping Camel' => 5,
			'Donnie Darko' => 7
		];

		//display movies in original order
		echo '<tr><td colspan="2"><strong>In their original order:</strong></td></tr>';
		foreach ($movies as $title => $rating) {
			echo "<tr><td>$rating</td><td>$title</td></tr>";
		}

		//display movies sorted alphabetically
		ksort($movies);
		echo '<tr><td colspan="2"><strong>Sorted by title:</strong></td></tr>';
		foreach ($movies as $title => $rating) {
			echo "<tr><td>$rating</td><td>$title</td></tr>";
		}

		//display movies sorted by rating
		arsort($movies);
		echo '<tr><td colspan="2"><strong>Sorted by rating:</strong></td></tr>';
		foreach ($movies as $title => $rating) {
			echo "<tr><td>$rating</td><td>$title</td></tr>";
		}

		?>
	</tbody>
	</table>

</body>
</html>