<!doctype HTML>
<html>
<head>
       <title>Registration </title>
	  	<style type="text/css">
			body {
				font-family: Arial, Verdana, sans-serif;
				font-size: 90%;
				color: #666;
				background-color: #f8f8f8;}
			li {
				list-style-image: url("images/icon-plus.png");
				line-height: 1.6em;}
			table {
				border-spacing: 0px;}
			th, td {
				padding: 5px 30px 5px 10px;
				border-spacing: 0px;
				font-size: 90%;
				margin: 0px;}
			th, td {
				text-align: left;
				background-color: #e0e9f0;
				border-top: 1px solid #f1f8fe;
				border-bottom: 1px solid #cbd2d8;
				border-right: 1px solid #cbd2d8;}
			tr.head th {
				color: #fff;
				background-color: #90b4d6;
				border-bottom: 2px solid #547ca0;
				border-right: 1px solid #749abe;
				border-top: 1px solid #90b4d6;
				text-align: center;
				text-shadow: -1px -1px 1px #666666;
				letter-spacing: 0.15em;}
			td {
				text-shadow: 1px 1px 1px #ffffff;}
			tr.even td, tr.even th {
				background-color: #e8eff5;}
			tr.head th:first-child {
				-webkit-border-top-left-radius: 5px;
				-moz-border-radius-topleft: 5px;
				border-top-left-radius: 5px;}
			tr.head th:last-child {
				-webkit-border-top-right-radius: 5px;
				-moz-border-radius-topright: 5px;
				border-top-right-radius: 5px;}
			fieldset {
				width: 310px;
				margin-top: 20px;
				border: 1px solid #d6d6d6;
				background-color: #ffffff;
				line-height: 1.6em;}
			legend {
				font-style: italic;
				color: #666666;}
			input[type="text"] {
				width: 120px;
				border: 1px solid #d6d6d6;
				padding: 2px;
				outline: none;}
			input[type="text"]:focus,
			input[type="text"]:hover {
				background-color: #d0e2f0;
				border: 1px solid #999999;}
			.title {
				float: left;
				width: 160px;
				clear: left;}
		</style>
	</head>
	<body>
<?php
$degree[] = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	//save response in $firstName if entered otherwise set $firstName to NULL
	if (!empty($_REQUEST['firstName'])) 
	{
		$firstName = $_REQUEST['firstName'];
	} 
	else 
	{
		$firstName = NULL;
	}
	
	//save response in $lastName if entered otherwise set $lastName to NULL
	if (!empty($_REQUEST['lastName'])) 
	{
		$lastName = $_REQUEST['lastName'];
	} 
	else 
	{
		$lastName = NULL;
	}
	
	//save response in $status if entered otherwise set $status to NULL
	if (!empty($_REQUEST['status'])) 
	{
		$status = $_REQUEST['status'];
	} 
	else 
	{
		$status= NULL;
	}
	
	//save response in $email if entered otherwise set to NULL
	if (!empty($_REQUEST['email'])) 
	{
		$email = $_REQUEST['email'];
	} 
	else 
	{
		$email = NULL;
	}
	
	//save response in $phone if entered otherwise set to NULL
	if (!empty($_REQUEST['phone'])) 
	{
		$phone = $_REQUEST['phone'];
	} 
	else 
	{
		$phone = NULL;
	}
	
	//save response in $method if entered otherwise set to NULL
	if (!empty($_REQUEST['method'])) 
	{
		$method = $_REQUEST['method'];
	} 
	else 
	{
		$method = NULL;
	}
	
	 //save response in $degree if entered otherwise set to NULL
	if(isset($_POST['degree']))
	{
		foreach ($_POST['degree'] as $value)
		{
			$degree[] = $value;
		}  
	}     

	
	
	//The if statement below checks for NULL $firstName OR NULL $lastName, see lines 174 for the else side.
	if (($firstName != NULL && $lastName != NULL)) 
	{
		//At this point, we are sure that the firstName and lastName have been provided but we must test for empty email and phone and display message if empty.
		//This program requires both because a college wants to reach students and needs a way to do so. Your Program 5 does not require an email address.
		if (($email == NULL || $phone == NULL))
		{	
			echo "Please provide an email and phone number where you can be reached.";
		} 
		else //Now, we have the phone and email and can continue with processing.
		{
			//Process the student status with messages that echo the student status including student first and last name.
			if ($status == "potential")
			{	
					echo "<p>Welcome $firstName $lastName, thank you for your interest in our college.</p>"; //Messages include firstName and lastName
			}
			else if ($status == "certificate")
			{
					echo "<p>Good choice, $firstName $lastName. Career Studies Certificates help you to quickly gain knowledge and skills in a particular career for students who already have degrees and want to switch careers or seek specialization in a certain area of Information Technology.</p>";
			}
			else if ($status == "associate")
			{
					echo "<p>Great choice, $firstName $lastName. Associate in Applied Science degrees help you to go to work or continue your education at a B.S. degree granting college or university.</p>";
			}
			else
			{
				echo "<p>Thank you $firstName $lastName for your interest in our college. We will help you find classes to suit your interests.</p>";
			}
			
			if (isset($degree)) //processes the checkboxes where the student chooses the degree he/she wants to take.
			{
				echo "<p>You have chosen the following degree options.</p>";
				foreach ($degree as $value) 
				{
					echo "<p>$value</p>";
				}
			} 
			else //if the student doesn't choose a degree, we display the message below.
			{
				echo "<p>You have not chosen a degree option but we know it is hard to decide.</p>";
			}
			
			echo "An advisor will contact you shortly."; //Message appears to all students who have provided firstName, lastName, email, phone at the very least
		}

	} 
	else
	{
		echo "<span style='color: red'>You did not enter a first name and last name.</span>";
	}
}
?>
		<form method="post" action="formexample.php"
			<fieldset>
				<legend>Student Name:</legend>
				<p>
				<label>First Name: <input type="text" name="firstName" size="30" maxlength="50" value="<?php if (isset($_POST['firstName'])) echo $_POST['firstName']; ?>"></label>
				</p>
				<p>
				<label>Last Name: <input type="text" name="lastName" size="30" maxlength="50" value="<?php if (isset($_POST['lastName'])) echo $_POST['lastName']; ?>"></label>
				</p>
			</fieldset>
			<fieldset>
			
				<legend>Student Information:</legend>
				<p>
					<label for="status">Student Status?</label>
					<select name="status" id="status">
						<option value="potential" <?php if (isset($_POST['status']) && ($_POST['status'] == 'potential')) echo 'selected = "selected"'; ?>>Potential Student</option>
						<option value="certificate" <?php if (isset($_POST['status']) && ($_POST['status'] == 'certificate')) echo 'selected = "selected"'; ?>>Student enrolled in Career Studies Certificate (C.S.C.)</option>
						<option value="associate" <?php if (isset($_POST['status']) && ($_POST['status'] == 'associate')) echo 'selected = "selected"'; ?>>Student enrolled in Associate in Applied Science (A.A.S.)</option>
					</select>
				</p>
				<legend>Please check from the degree options below:</legend>
				<table id="cars">
				<tr>
				<th colspan="9">Degree Options</th>
				</tr>
				<tr>
				<th class="second">Please check one or more:</th><th class="second">Degree Description</th><th class="second">Degree Type</th>
				</tr>

				<tr>
				<td>
				<input type="checkbox" name="degree[]" id="csc" value="Website Design Certificate" <?php if (in_array('Website Design Certificate', $degree)) echo(' CHECKED '); ?>
				</td>
				<td>Website Design Certificate</td><td>C.S.C.</td></tr>
				<tr><td><input type="checkbox" name="degree[]" id="iss" value="Information Systems Specialist" <?php if (in_array('Information Systems Specialist', $degree)) echo(' CHECKED '); ?>></td><td>Information Systems Specialist</td><td>A.A.S.</td></tr>
				<tr><td><input type="checkbox" name="degree[]" id="cp" value="Computer Programming" <?php if (in_array('Computer Programming', $degree)) echo(' CHECKED '); ?>></td><td>Computer Programming</td><td>A.A.S.</td></tr>
				</table>
				<legend>Preferred Method of Advising</legend>
				<p>
					<label><input type="radio" name="method" value="meet" <?php if (isset($_POST['method']) && ($_POST['method'] == 'meet')) echo 'checked="checked"'; ?>/>Meet With Advisor</label>
					<label><input type="radio" name="method" value="phone" <?php if (isset($_POST['method']) && ($_POST['method'] == 'phone')) echo 'checked="checked"'; ?> />Phone Call </label>
					<label><input type="radio" name="method" value="email" <?php if (isset($_POST['method']) && ($_POST['method'] == 'email')) echo 'checked="checked"'; ?>/>Email</label>
				</p>
				<legend>Student Contact Information:</legend>
				<p>
					<label>Email: (Required)<input type="email" name="email" size="30" maxlength="100" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"></label>
				</p>
				<p>
					<label>Phone: (Required)<input type="phone" name="phone" size="30" maxlength="100" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>"></label>
				</p>
				<label><input type="checkbox" name="subscribe" checked="checked"> Sign me up for email updates</label><br />
				<input type="submit" value="Submit Advising Request">
				<input type="reset"  value="Clear the Form">
			</fieldset>
		</form>

</body>
</html>
