<?php
include 'header.php';

gen_header("Create resources");
echo '<div class="container theme-showcase" role ="main">
			<div class="jumbotron">
			<h1>Create resources</h1>
			</div>
			<div class="page-header">
			    <h1>Create a resource</h1>
			    <p>For now, you can only add a cpu/core to an existing host.
			    cpu,core, mem are integers.
			    others prop have this format : prop1=value,prop2=value ...</p>

			    <p>If you target an unexistant host, the resource will be created,
			    but the docker container associated with the new host will not be created,
			    and the resource will be seen as "suspected" and will be "unusable".</p>
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

					 <tr><td>network_address (hostname) </td><td><input type="text" name="hostname" size="50" value="an existing hostname for now !"/></td></tr>
					 <tr><td>CPU ID</td><td><input type="text" name="cpu" size="50" value="existing or new cpu id on this host"/></td></tr>
					 <tr><td>CORE ID</td><td><input type="text" name="core" size="50" value="must be unique"/></td></tr>
					 <tr><td>MEM of this core</td><td><input type="text" name="mem" size="50" value=""/></td></tr>
					 <tr><td>Others properties</td><td><input type="text" name="properties" size="50" value=""/></td></tr>
					 <tr><td></td><td><input type="submit" value="OK"></td></tr>

					</tbody>
	        	</table>
			</form>	
	    </div>
	</div>
</div>';

include 'footer.php';
?>
