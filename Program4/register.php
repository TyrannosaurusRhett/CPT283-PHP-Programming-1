<?php # Program3 - index.php
# Created September 10, 2021
# Created by Taylor Rhett

$page_title = 'Weather Wizards Registration';
include('includes/header.html');

?>

<h1>Weather Wizards Workshops</h1>

<?php

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
		echo 'Weather Wizard, we need your name and your parent or guardian\'s name, email, phone, and your membership status to send information about our workshops. Enter required information and click the Register button again.';
	}

?>
<p>We host weather wizards workshops throughout the year for kids 6-12.</p>
	<p>Please note that the following workshops are free to members:</p>
	<ul>
		<li>Make a Rain Gauge</li>
		<li>Make a Thermometer</li>
	</ul>

	<form name="register.php" method="post" action="<?php 
	echo $_SERVER['PHP_SELF']; ?>">
		<fieldset><legend><strong>Register Your Interests</strong></legend>
			<input type="checkbox" name="shops[]" value="Make a Rain Gauge"> Make a Rain Gauge<br>
			<input type="checkbox" name="shops[]" value="Make a Thermometer"> Make a Thermometer<br>
			<input type="checkbox" name="shops[]" value="Make a Windsock"> Make a Windsock<br>
			<input type="checkbox" name="shops[]" value="Make Lightning in Your Mouth"> Make Lightning in Your Mouth<br>
			<input type="checkbox" name="shops[]" value="Make a Hygrometer"> Make a Hygrometer

			<p><label>Your Name:<br><input type="text" name="name" size="40" maxlength="60"></label></p>

			<p><label>Your parent or guardian's name:<br><input type="text" name="guardian" size="40" maxlength="60"></label></p>

			<p><label>Your parent or guardian's email:<br><input type="email" name="email" size="40" maxlength="60"></label></p>

			<p><label>Your parent or guadian's phone:<br><input type="tel" name="phone" size="40" maxlength="60"></label></p>

			<p><label>Your closest center:
				<select name="location" class="button">
					<option value="charleston">Charleston</option>
					<option value="summerville">Summerville</option>
					<option value="pleasant">Mt. Pleasant</option>
				</select>
			</label></p>

			<p><label for="member">Are you a member?</label><input type="radio" name="member" value="Y"> Yes <input type="radio" name="member" value="N"> No <input type="radio" name="member" value="S">Sign me up!</p>
		</fieldset>

		<p><input type="submit" name="submit" value="Register" class="button"> <input type="reset" name="reset" value="Reset" class="button"></p>
	</form>

<?php

include('includes/footer.html');

?>