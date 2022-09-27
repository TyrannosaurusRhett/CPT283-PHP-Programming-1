<?php # Program3 - index.php
# Created September 8, 2021
# Created by Taylor Rhett

//function outputs theoretical html for adding ads to web page
function create_ad() {
	echo '<p>Don’t forget to <a href="register.php">Register</a> to become a Weather Wizard!</p>';
}

$page_title = 'Welcome to the Weather Wizards Site!';
include('includes/header.html');

//call the function
create_ad();

?>


<div class="page-header">
	<h1>Weather Wizards</h1>
	<p>Welcome to the Weather Wizards website for budding meteorologists in the South Carolina Lowcountry area.</p>

	<p>Our website is flooded with information about local weather, workshops, and more. So check back often.</p>
	
</div>

<?php

//call the function again
create_ad();

include('includes/footer.html');
?>