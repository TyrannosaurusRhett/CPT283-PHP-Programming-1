<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Form Feedback</title>
	<style type="text/css">
		.error{
			font-weight: bold;
			color: rgb(255, 0, 0); /*red*/
		}
	</style>
	
</head>
<body>
</body>
	<?php # Script 2.4 - handle_form2.php
	# Created on September 3, 2021
	# Created by Taylor Rhett
	# This script handles and validates form2.html

	//validate the name
	if (!empty($_REQUEST['name'])) {
		$name = $_REQUEST['name'];
	} else {
		$name = NULL;
		echo '<p class="error">You forgot to enter your name!</p>';
	}

	//validate the email
	if (!empty($_REQUEST['email'])) {
		$email = $_REQUEST['email'];
	} else {
		$email = NULL;
		echo '<p class="error">You forgot to enter your email address!</p>';
	}

	//validate the comments
	if (!empty($_REQUEST['comments'])) {
		$comments = $_REQUEST['comments'];
	} else {
		$comments = NULL;
		echo '<p class="error">You forgot to enter your comments!</p>';
	}

	//validate the gender
	if (isset($_REQUEST['gender'])) {
		$gender = $_REQUEST['gender'];
		if ($gender == 'M') {
			$greeting = '<p><strong>Good day, Sir!</strong></p>';
		} elseif ($gender == 'F') {
			$greeting = '<p><strong>Good day, Madam!</strong></p>';
		} elseif ($gender == 'O') {
			$greeting = '<p><strong>Good day, Captain!</strong></p>';
		} else { //unacceptable value
			$gender = NULL;
			echo '<p class="error">Gender should be "M", "F", or "O"! </p>';
		}
	} else {// $_REQUEST['gender'] is not set.
		$gender = NULL;
		echo '<p class="error">You forgot to select your gender!</p>';
	}

	//if everything is okay, print the message:
	if ($name && $email && $gender && $comments) {
		echo "<p>Thank you, <strong>$name</strong>, for the following comments:</p>
		<pre>$comments</pre>
		<p>We will reply to you at <em>$email</em></p>\n";

		echo $greeting;
	} else { //missing form value
		echo '<p class="error">Please go back and fill out the form again.</p>';
	}

	?>

</body>
</html>