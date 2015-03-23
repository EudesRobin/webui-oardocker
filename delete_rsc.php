<?php
include 'header.php';

gen_header("Delete resource");
echo '<div class="container theme-showcase" role ="main">
			<div class="jumbotron">
			<h1>Delete this resource</h1>
			</div>
			<div class="page-header">
			    <h1>Delete a resource</h1>
			    
			</div>';


	echo 'This cannot be undone! Do you really want to delete the core '.$_GET['core'].'?
	';

include 'footer.php';
?>
