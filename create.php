<?php
include 'header.php';

gen_header("Create resources");
echo '<div class="container theme-showcase" role ="main">
			<div class="jumbotron">
			<h1>Create resources</h1>
			</div>
			<div class="page-header">
			    <h1>Create a resource</h1>
			</div>';


	echo '
	<div class="row">
	    <div class="col-md-6">
			<form action="/webui-oardocker/action/do_create.php" method="post">
				<table class="table table-striped">
		            <thead>
		              <tr>
		                <th></th>
		                <th>Parameters</th>
		              </tr>
		            </thead>
	            	<tbody>

					 <tr><td>network_address (hostname) </td><td><input type="text" name="hostname" size="50" value="new_node"/></td></tr>
					 <tr><td>properties</td><td><input type="text" name="properties" size="50" value=""/></td></tr>
					 <tr><td></td><td><input type="submit" value="OK"></td></tr>

					</tbody>
	        	</table>
			</form>	
	    </div>
	</div>
</div>';

include 'footer.php';
?>
