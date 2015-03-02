<?php
	include 'header.php';
	include 'json_request.php';

	$title = 'Details of '.$_GET['network_id'];
	gen_header($title);

	// On recup toute les rsc associées au network_id
	$url = 'http://localhost/oarapi/resources/nodes/'.$_GET['network_id'].'.json';
	
	$json_grp  = json_request($url);
	
	echo '<div class="jumbotron">
        <h1>Details</h1>
        </div>';

	echo '<div class="container theme-showcase" role ="main">';
	echo '<div class="page-header">
	    <h1>State of each cores </h1></div>';

	echo '<div class="row">
	        <div class="col-md-6">
	          <table class="table table">
	            <thead>
	                <tr>';

	$array_rsc = array();
	for($i=0;$i<$json_grp['total'];$i++){
		echo'<th></th>';
		echo '<th>'.$json_grp['items'][$i]['id'].'</th>';
		$details = 'http://localhost/oarapi/resources/'.$json_grp['items'][$i]['id'].'.json';
		$array_rsc[] = json_request($details);
	}

	echo '</tr></thead><tbody>';

   echo '<tr><th>scheduler_priority</th>';
   for($i=0;$i<$json_grp['total'];$i++){
   	echo '<td>'.$array_rsc[$i]['scheduler_priority'].'</td>';
   }
   echo '</tr>';

   echo '<tr><th>finaud_decision</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['finaud_decision'].'</td>';
   }
   echo '</tr>';

   echo '<tr><th>core</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['core'].'</td>';
   }
   echo '</tr>';

   echo '<tr><th>deploy</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['deploy'].'</td>';
   }
   echo '</tr>';

   echo '<tr><th>besteffort</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['besteffort'].'</td>';
   }
   echo '</tr>';

   echo '<tr><th>cpuset</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['cpuset'].'</td>';
   }
   echo '</tr>';

   echo '<tr><th>last_job_date</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['last_job_date'].'</td>';
   }
   echo '</tr>';

   echo '<tr><th>desktop_computing</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['desktop_computing'].'</td>';
   }
   echo '</tr>';

   echo '<tr><th>drain</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['drain'].'</td>';
   }
   echo '</tr>';

   echo '<tr><th>state</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['state'].'</td>';
   }
   echo '</tr>';

   echo '<tr><th>available_upto</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['available_upto'].'</td>';
   }
   echo '</tr>';

   echo '<tr><th>id</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['id'].'</td>';
   }
   echo '</tr>';

   //echo '<tr><th>links_grappe</th></tr>';
   //echo '<tr><th>links_core</th></tr>';
   //echo '<tr><th>links_jobs</th></tr>';
   echo '<tr><th>cpu</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['cpu'].'</td>';
   }
   echo '</tr>';

   echo '<tr><th>api_timestamp</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['api_timestamp'].'</td>';
   }
   echo '</tr>';

   echo '<tr><th>expiry_date</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['expiry_date'].'</td>';
   }
   echo '</tr>';

   echo '<tr><th>host</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['host'].'</td>';
   }
   echo '</tr>';

   echo '<tr><th>network_address</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['network_address'].'</td>';
   }
   echo '</tr>';

   echo '<tr><th>suspended_jobs</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['suspended_jobs'].'</td>';
   }
   echo '</tr>';

   echo '<tr><th>next_finaud_decision</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['next_finaud_decision'].'</td>';
   }
   echo '</tr>';

   echo '<tr><th>last_available_upto</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['last_available_upto'].'</td>';
   }
   echo '</tr>';

   echo '<tr><th>mem</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['mem'].'</td>';
   }
   echo '</tr>';

   echo '<tr><th>state_num</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['state_num'].'</td>';
   }
   echo '</tr>';

   echo '<tr><th>type</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['type'].'</td>';
   }
   echo '</tr>';

   echo '<tr><th>next_state</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['next_state'].'</td>';
   }
   echo '</tr>';

	echo '
		</tbody>
	    </table>
	</div></div></div>';
	
include 'footer.php';
?>
