<?php
include 'header.php';

include 'json_request.php';
session_start();

gen_header("Submit jobs");

echo '<div class="container theme-showcase" role ="main">
			<div class="jumbotron">
			<h1>Submit jobs</h1>
			</div>
			<div class="page-header">
			    <h1>Submit jobs</h1>
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

					 <tr><td>Resources : </td><td><input type="text" name="resource" size="50" value="/nodes=1/cpu=1,walltime=00:30:00"/></td></tr>
					 <tr><td>Name : </td><td><input type="text" name="name" size="50" value="test_job"/></td></tr>
					 <tr><td>Properties : </td><td><input type="text" name="properties" size="50" value ="" /></td></tr>
					 <tr><td>Program to run : </td><td><input type="text" name="command" size="50" value="/bin/sleep 500"/></td></tr>
					 <tr><td>Types : </td><td><input type="text" name="type" size="50" value=""/></td></tr>
					 <tr><td>Reservation dates : </td><td><input type="text" name="reservation" size="50" value=""/></td></tr>
					 <tr><td>Directory : </td><td><input type="text" name="directory" size="50" value=""/></td></tr>
					 <tr><td></td><td><input type="submit" value="OK"></td></tr>

					</tbody>
	        	</table>
			</form>	
	    </div>
	</div>
</div>';

include 'footer.php';
?>
