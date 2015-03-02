<?php
	include 'header.php';
	include 'json_request.php';

	$title = 'Details of '.$_GET['network_id'];
	gen_header($title);
	
	// On recup toute les rsc associées au network_id
	$url_grp_rsc = 'http://localhost/oarapi/resources/nodes/'.$_GET['network_id'].'json';	
	$json_grp  = json_request($url_grp_src);

	// gen array
	echo '      <div class="row">
	        <div class="col-md-6">
	          <table class="table table">
	            <thead>
	                <tr>
   <th>scheduler_priority</th>
   <th>finaud_decision</th>
   <th>core</th>
   <th>deploy</th>
   <th>besteffort</th>
   <th>cpuset</th>
   <th>last_job_date</th>
   <th>desktop_computing</th>
   <th>drain</th>
   <th>state</th>
   <th>available_upto</th>
   <th>id</th>
   <th>links_grappe</th>
   <th>links_core</th>
   <th>links_jobs</th>
   <th>cpu</th>
   <th>api_timestamp</th>
   <th>expiry_date</th>
   <th>host</th>
   <th>network_address</th>
   <th>suspended_jobs</th>
   <th>next_finaud_decision</th>
   <th>last_available_upto</th>
   <th>mem</th>
   <th>state_num</th>
   <th>type</th>
   <th>next_state</th>
	              </tr>';

			for($i=0;$i<$json_grp['total'];$i++){
				$url_rsc_details = 'http://localhost:48080/oarapi/resources/'.$i.'json';
				$json_rsc_details = json_request($url_rsc_details);
				echo '<tr>';
				foreach ($json_rsc_details as $key => $value) {
					echo '<td>'.$value.'</td>';
				}
				echo '</tr>';		
			}
	              
	            echo '</thead>
			</tbody>
	          </table>
	        </div></div>';
	
include 'footer.php';
?>
