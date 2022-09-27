<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Form Feedback</title>

</head>
<body>
	<?php #Script 2.2 - handle_form.php
	# Created on September 2, 2021
	# Created by Taylor Rhett
	# This script handles form.html

	//create a shorthand for the form data
	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$comments = $_REQUEST['comments'];

	//creat $gender variable
	if (isset($_REQUEST['gender'])) {
		$gender = $_REQUEST['gender'];
	} else{
		$gender = NULL;
	}

	/*Not used presently:
	$_REQUEST['age'];
	$_REQUEST['submit'];
	*/

	//print the submitted information
	echo "<p>Thank you, <strong>$name</strong>, for the following comments:</p>
	<pre>$comments</pre>
	<p>We will reply to you at <em>$email</em></p>\n";

	//print a message based on the gender value
	if ($gender == 'M') {
		echo '<p><strong>Good day, Sir!</strong></p>';
	} elseif ($gender == 'F') {
		echo '<p><strong>Good day, Madam!</strong></p>';
	} elseif ($gender == 'O') {
		echo '<p><strong>Good day, Captain!</strong></p>';
	} else { //no gender selected
		echo '<p><strong>You forgot to enter your gender!</strong></p>';
	}

	?>
</body>
</html>