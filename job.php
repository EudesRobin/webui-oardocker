<?php
include 'header.php';

include 'json_request.php';

gen_header("Submit jobs");

echo '<div class="container theme-showcase" role ="main">
			<div class="jumbotron">
			<h1>General view of the nodes</h1>
			</div>
			<div class="page-header">
			    <h1>State of each cores </h1>
			</div>';


	echo '
	<div class="row">
	    <div class="col-md-6">
			<form action="action_job.php" method="post">
				<table class="table table-striped">
		            <thead>
		              <tr>
		                <th></th>
		                <th>Parameters</th>
		              </tr>
		            </thead>
	            	<tbody>

					 <tr><td>Resources : </td><td><input type="text" name="resource" /></td></tr>
					 <tr><td>Name : </td><td><input type="text" name="name" />/td></tr>
					 <tr><td>Properties : </td><td><input type="text" name="properties" />/td></tr>
					 <tr><td>Program to run : </td><td><input type="text" name="command" />/td></tr>
					 <tr><td>Types : </td><td><input type="text" name="type" />/td></tr>
					 <tr><td>Reservation dates : </td><td><input type="text" name="reservation" />/td></tr>
					 <tr><td>Directory : </td><td><input type="text" name="directory" />/td></tr>
					 <tr><td>/td><td><input type="submit" value="OK">/td></tr>

					</tbody>
	        	</table>
			</form>	
	    </div>
	</div>
</div>';

include 'footer.php';
?>