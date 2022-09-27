<?php # Script 3.7 - index.php
# Created September 9, 2021
# Created by Taylor Rhett

//function outputs theoretical html for adding ads to web page
function create_ad() {
	echo '<div class="alert alert-info" role="alert"><p>This is an annoying ad! This is an annoying ad! This is an annoying ad! This is an annoying ad!</div>';
}

$page_title = 'Welcome to this Site!';
include('includes/header.html');

//call the function
create_ad();

?>

<div class="page-header">
	<h1>Content Header</h1>
	<p>This is where the page-specific content goes. This section, and the corresponding header, will change from one page to the next.</p>

	<p>Volutpat at varius sed sollicitudin et, arcu. Vivamus viverra. Nullam turpis. Vestibulum sed etiam. Lorem ipsum sit amet dolore. Nulla facilisi. Sed tortor. Aenean felis. Quisque eros. Cras lobortis commodo metus. Vestibulum vel purus. In eget odio in sapien adipiscing blandit. Quisque augue tortor, facilisis sit amet, aliquam, suscipit vitae, cursus sed, arcu lorem ipsum dolor sit amet.</p>
	
</div>

<?php

//call the function again
create_ad();

include('includes/footer.html');
?>