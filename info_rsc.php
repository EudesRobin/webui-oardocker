<?php
	include 'header.php';
	include 'json_request.php';

	$title = 'Details of '.$_GET['network_id'];
	gen_header($title);
	
	// On recup toute les rsc associées au network_id
	$url_grp_rsc = 'http://localhost/oarapi/resources/nodes/'.$_GET['network_id'].'json';	
	$json_grp  = json_request($url_grp_src);


	echo '<div class="row">
	        <div class="col-md-6">
	          <table class="table table">
	            <thead>
	                <tr>';

	$array_rsc = array();

	for($i=0;$i<$json_grp['total'];$i++){
		echo '<th>'.$i.'</th>';
		$url_rsc_details = 'http://localhost:48080/oarapi/resources/'.$i.'json';
		$array_rsc[] = json_request($url_rsc_details);
	}

	echo '</tr></thead><tbody>';

	
   
   echo '<tr><th>scheduler_priority</th>';
   for($i=0;$i<$json_grp['total'];$i++){
   	echo '<td>'.$array_rsc[$i]['scheduler_priority'].'</td>';
   }
   echo '<tr><th>finaud_decision</th></tr>';
   echo '<tr><th>core</th></tr>';
   echo '<tr><th>deploy</th></tr>';
   echo '<tr><th>besteffort</th></tr>';
   echo '<tr><th>cpuset</th></tr>';
   echo '<tr><th>last_job_date</th></tr>';
   echo '<tr><th>desktop_computing</th></tr>';
   echo '<tr><th>drain</th></tr>';
   echo '<tr><th>state</th></tr>';
   echo '<tr><th>available_upto</th></tr>';
   echo '<tr><th>id</th></tr>';
   echo '<tr><th>links_grappe</th></tr>';
   echo '<tr><th>links_core</th></tr>';
   echo '<tr><th>links_jobs</th></tr>';
   echo '<tr><th>cpu</th></tr>';
   echo '<tr><th>api_timestamp</th></tr>';
   echo '<tr><th>expiry_date</th></tr>';
   echo '<tr><th>host</th></tr>';
   echo '<tr><th>network_address</th></tr>';
   echo '<tr><th>suspended_jobs</th></tr>';
   echo '<tr><th>next_finaud_decision</th></tr>';
   echo '<tr><th>last_available_upto</th></tr>';
   echo '<tr><th>mem</th></tr>';
   echo '<tr><th>state_num</th></tr>';
   echo '<tr><th>type</th></tr>';
   echo '<tr><th>next_state</th></tr>';

	echo '		
			</tbody>
	    </table>
	</div></div>';
	
include 'footer.php';
?>
