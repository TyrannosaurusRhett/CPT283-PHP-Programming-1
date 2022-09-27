<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>RhettTProgram2</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">

	<style type="text/css">
		body{
			background-color: rgb(255, 255, 224); /*light yellow*/
			font-family: 'Varela Round', sans-serif;
			color: rgb(25, 25, 112); /*midnight blue*/
		}
	</style>
	
</head>
<body>
	<?php # Program 2 - checkform.php
	#Created September 2, 2021
	#Created by Taylor Rhett
	#this script handles and validates the form in RhettTProgram2.html

	//page heading
	echo '<h1>Weather Wizards Registration Verification Form</h1>';

	//validate child's name
	if (!empty($_POST['name'])) {
		$name = $_POST['name'];
	} else {
		$name = NULL;
		echo '<p class="error">You forgot to enter your name!</p>';
	}

	//validate parent/guardian's name
	if (!empty($_POST['guardian'])) {
		$guardian = $_POST['guardian'];
	} else {
		$guardian = NULL;
		echo '<p class="error">You forgot to enter your parent or guardian\'s name!</p>';
	}

	//validate parent/guardian' email
	if (!empty($_POST['email'])) {
		$email = $_POST['email'];
	} else {
		$email = NULL;
		echo '<p class="error">You forgot to enter your parent or guardian\'s email!</p>';
	}

	//validate parent/guardian's phone
	if (!empty($_POST['phone'])) {
		$phone = $_POST['phone'];
	} else {
		$phone = NULL;
		echo '<p class="error">You forgot to enter your parent or guardian\'s phone!</p>';
	}

	//validate membership status
	if (!empty($_POST['member'])) {
		$member = $_POST['member'];
		if (isset($_POST['member'])) {
			if ($member == 'Y') {
				$greeting = "Welcome back, $name! Thank you for being a member of Weather Wizards.";
			} elseif ($member == 'N') {
				$greeting = "Hi $name, we hope you'll join Weather Wizards. We have more fun than a jar full of lightning bugs!";
			} elseif ($member == 'S'){
				$greeting = "Hi $name, Welcome to Weather Wizards where the forecast is always a 99% chance of fun!";
			}
		}
	} else {
		$member = NULL;
		echo '<p class="error">You forgot to enter your membership status!</p>';
	}

	//validate the location
	if (isset($_POST['location'])) {
		$location = $_POST['location'];
		if ($location == 'charleston') {
			$place = '<p>You are nearest to our Charleston SC location, the Holy City! Go River Dogs!</p>';
		} elseif ($location == 'summerville') {
			$place = 'You are nearest to our Summerville SC location, the Birthplace of Sweet Tea! Refreshing!';
		} elseif ($location == 'pleasant'){
			$place = 'You are nearest to our Mt. Pleasant, SC location that has a historical and beachy vibe!';
		}
	} else $location = NULL;

	//print submitted information
	if (!empty($_POST['name']) && !empty($_POST['guardian']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['member'])) {

		echo "<p>$greeting</p>
		<p>$place</p>";
	} else { //missing form value
		echo 'Weather Wizard, we need your name and your parent or guardian\'s name, email, phone, and your membership status to send information about our workshops. Hit the back button on the browser and try again.';
	}



	//loop through workshop selections
	if (!empty($_POST['shops'])) {
		echo "<p>You have chosen the following workshops:</p>";
		foreach ($_POST['shops'] as $shops) {

			//print workshops
			echo "<p>$shops</p>";
		}
	} else {
		$shops = NULL;
		echo 'You have not chosen a workshop, but we add new workshops all the time. We\'ll keep you updated by e-mail.';
	}

	?>

</body>
</html>