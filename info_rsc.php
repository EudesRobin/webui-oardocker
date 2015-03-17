<?php
	include 'header.php';
	include './action/json_functions.php';

  if(!empty($_GET['network_id'])){
    $title = 'Details of core(s) of host'.$_GET['network_id'];
    $url = 'http://localhost/oarapi/resources/nodes/'.$_GET['network_id'].'.json';
    $json_grp  = json_request_simple_url($url);
  }else if(!empty($_GET['core'])){
    $title = 'Details of core'.$_GET['core'];
    $url = 'http://localhost/oarapi/resources/'.$_GET['core'].'.json';
    $json_grp  = json_request_simple_url($url);
  }
	
	gen_header($title);

  session_start();

	
	
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
		<table class="table table-striped">
			<thead>
				<tr>
					<th></th>
					';



  if(!empty($_GET['network_id'])){
      // First, we get for each resource identified by id some specifics informations
  $array_rsc = array();
	for($i=0;$i<$json_grp['total'];$i++){
		$details = 'http://localhost/oarapi/resources/'.$json_grp['items'][$i]['id'].'.json';
		$array_rsc[] = json_request_simple_url($details);
	}
/*
	for($i=0;$i<$json_grp['total'];$i++){
		echo '<th><a href="job.php?id='.$array_rsc[$i]['id'].'&cpu='.$array_rsc[$i]['cpu'].'" role="button" class="btn btn-lg btn-primary">Submit a job</a></th>
					';
	}*/

	echo '
				</tr>
			</thead>
			<tbody>
	';
   // And now, we can display, in line, for each rsc the value of the propriety...
   echo '			<tr><th>scheduler_priority</th>';
   for($i=0;$i<$json_grp['total'];$i++){
   	echo '<td>'.$array_rsc[$i]['scheduler_priority'].'</td>';
   }
   echo '</tr>
';

   echo '				<tr><th>finaud_decision</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['finaud_decision'].'</td>';
   }
   echo '</tr>
';

   echo '				<tr><th>core</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['core'].'</td>';
   }
   echo '</tr>
';

   echo '				<tr><th>deploy</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['deploy'].'</td>';
   }
   echo '</tr>
';

   echo '				<tr><th>besteffort</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['besteffort'].'</td>';
   }
   echo '</tr>
';

   echo '				<tr><th>cpuset</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['cpuset'].'</td>';
   }
   echo '</tr>
';

   echo '				<tr><th>last_job_date</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['last_job_date'].'</td>';
   }
   echo '</tr>
';

   echo '				<tr><th>desktop_computing</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['desktop_computing'].'</td>';
   }
   echo '</tr>
';

   echo '				<tr><th>drain</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['drain'].'</td>';
   }
   echo '</tr>
';

   echo '				<tr><th>state</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['state'].'</td>';
   }
   echo '</tr>
';

   echo '				<tr><th>available_upto</th>';
   for($i=0;$i<$json_grp['total'];$i++){
	switch($array_rsc[$i]['available_upto']){
		case 0:
			echo '<td>'.'0'.'</td>';
			break;
		case 1:
			echo '<td>'.'1'.'</td>';
			break;
		case 2147483647:
			echo '<td>'.'Forever waking-up'.'</td>';
			break;
		case 2147483646:
			echo '<td>'.'Forever'.'</td>';
			break;
	}
   }
   echo '</tr>
';

   echo '				<tr><th>id</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['id'].'</td>';
   }
   echo '</tr>
';

   echo '				<tr><th>cpu</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['cpu'].'</td>';
   }
   echo '</tr>
';

   echo '				<tr><th>api_timestamp</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.date('d/m/y',$array_rsc[$i]['api_timestamp']).'</td>';
   }
   echo '</tr>
';

   echo '				<tr><th>expiry_date</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['expiry_date'].'</td>';
   }
   echo '</tr>
';

   echo '				<tr><th>host</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['host'].'</td>';
   }
   echo '</tr>
';

   echo '				<tr><th>network_address</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['network_address'].'</td>';
   }
   echo '</tr>
';

   echo '				<tr><th>suspended_jobs</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['suspended_jobs'].'</td>';
   }
   echo '</tr>
';

   echo '				<tr><th>next_finaud_decision</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['next_finaud_decision'].'</td>';
   }
   echo '</tr>
';

   echo '				<tr><th>last_available_upto</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['last_available_upto'].'</td>';
   }
   echo '</tr>
';

   echo '				<tr><th>mem</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['mem'].'</td>';
   }
   echo '</tr>
';

   echo '				<tr><th>state_num</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['state_num'].'</td>';
   }
   echo '</tr>
';

   echo '				<tr><th>type</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['type'].'</td>';
   }
   echo '</tr>
';

   echo '				<tr><th>next_state</th>';
   for($i=0;$i<$json_grp['total'];$i++){
        echo '<td>'.$array_rsc[$i]['next_state'].'</td>';
   }
   echo '</tr>
';

	echo '
			</tbody>
		</table>
		</div><!-- end col-md-6 -->
	</div><!-- end row -->
</div><!-- end container theme-showcase -->
';
}else{
  echo '</tr></thead>';
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
      echo '<td>'.'0'.'</td>';
      break;
    case 1:
      echo '<td>'.'1'.'</td>';
      break;
    case 2147483647:
      echo '<td>'.'Forever waking-up'.'</td>';
      break;
    case 2147483646:
      echo '<td>'.'Forever'.'</td>';
      break;
  }
  echo '</tr>';
  echo '<tr><td>id</td><td>'.$json_grp['id'].'</td></tr>';
  echo '<tr><td>cpu</td><td>'.$json_grp['cpu'].'</td></tr>';
  echo '<tr><td>api_timestamp</td><td>'.$json_grp['api_timestamp'].'</td></tr>';
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
      </tbody>
    </table>
    </div><!-- end col-md-6 -->
  </div><!-- end row -->
</div><!-- end container theme-showcase -->
';
}
	// end table

include 'footer.php';
?>
