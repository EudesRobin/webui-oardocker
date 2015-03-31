<?php
	include 'header.php';
	include './action/json_functions.php';

	if(!empty($_GET['core'])){
    		$title = 'Details of core'.$_GET['core'];
    		$url = 'http://localhost/oarapi/resources/'.$_GET['core'].'.json';
    		$json_grp  = json_request_simple_url($url);
    		gen_header($title);
?>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    	$('#tab').DataTable({
      		"iDisplayLength": 25
    	});
} );
</script>
<?php

echo '
<div class="container theme-showcase" role ="main">
	<div class="jumbotron">
		<h1>Details</h1>
	</div><!--end jumbotron -->
	<div class="page-header">
		<h1>Properties</h1>
	</div>
	<div class="row">
		<div class="col-md-6">
			<!--begining table -->
			<a href="/webui-oardocker/job.php?core='.$_GET['core'].'"><button type="button" class="btn btn-lg btn-primary">Send a job to this core</button></a>
			<br />
			<br />
			<br />
			<table id="tab" class="table table-striped">
				<thead>
					<tr>
						<th>Property</th>
        					  <th>Value</th>
        				</tr>
      				</thead>';

  			echo '<tr><td>scheduler_priority</td><td>'.$json_grp['scheduler_priority'].'</td></tr>';
  			echo '<tr><td>finaud_decision</td><td>'.$json_grp['finaud_decision'].'</td></tr>';
  			echo '<tr><td>core</td><td>'.$json_grp['core'].'</td></tr>';
  			echo '<tr><td>deploy</td><td>'.$json_grp['deploy'].'</td></tr>';
  			echo '<tr><td>besteffort</td><td>'.$json_grp['besteffort'].'</td></tr>';
  			echo '<tr><td>cpuset</td><td>'.$json_grp['cpuset'].'</td></tr>';
  			echo '<tr><td>last_job_date</td><td>'.$json_grp['last_job_date'].'</td></tr>';
  			echo '<tr><td>desktop_computing</td><td>'.$json_grp['desktop_computing'].'</td></tr>';
  			echo '<tr><td>drain</td><td>'.$json_grp['drain'].'</td></tr>';
  			echo '<tr><td>state</td><td>'.$json_grp['state'].'</td></tr>';
  			echo '<tr><td>available_upto</td>';
  			switch($json_grp['available_upto']){
  				  case 0:
  				    echo '<td>'.'0'.'</td></tr>';
  				    break;
  				  case 1:
  				    echo '<td>'.'1'.'</td></tr>';
  				    break;
  				  case 2147483647:
  				    echo '<td>'.'Forever waking-up'.'</td></tr>';
  				    break;
  				  case 2147483646:
  				    echo '<td>'.'Forever'.'</td></tr>';
  				    break;
  			}
  			echo '<tr><td>id</td><td>'.$json_grp['id'].'</td></tr>';
  			echo '<tr><td>cpu</td><td>'.$json_grp['cpu'].'</td></tr>';
  			echo '<tr><td>api_timestamp</td><td>'.date('d/m/y',$json_grp['api_timestamp']).'</td></tr>';
  			echo '<tr><td>expiry_date</td><td>'.$json_grp['expiry_date'].'</td></tr>';
  			echo '<tr><td>host</td><td>'.$json_grp['host'].'</td></tr>';
  			echo '<tr><td>network_address</td><td>'.$json_grp['network_address'].'</td></tr>';
  			echo '<tr><td>suspended_jobs</td><td>'.$json_grp['suspended_jobs'].'</td></tr>';
  			echo '<tr><td>next_finaud_decision</td><td>'.$json_grp['next_finaud_decision'].'</td></tr>';
  			echo '<tr><td>last_available_upto</td><td>'.$json_grp['last_available_upto'].'</td></tr>';
  			echo '<tr><td>mem</td><td>'.$json_grp['mem'].'</td></tr>';
  			echo '<tr><td>state_num</td><td>'.$json_grp['state_num'].'</td></tr>';
  			echo '<tr><td>type</td><td>'.$json_grp['type'].'</td></tr>';
  			echo '<tr><td>next_state</td><td>'.$json_grp['next_state'].'</td></tr>';
			echo '
  			</table>
  		</div><!-- end col-md-6 -->
	</div><!-- end row -->
</div><!-- end container theme-showcase -->';
include 'footer.php';
}else{

  header("location:/webui-oardocker/nocore.php");
  exit();
}


?>
