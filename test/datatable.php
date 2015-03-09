
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		
		<title>DataTables test - info_node.php table</title>

		<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css">

		<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable();
			} );
		</script>
	</head>
	<body>
<?php
include '../action/json_functions.php';
$url = 'http://localhost/oarapi/resources.json';
$json_array  = json_request_simple_url($url);

echo '
<div class="container theme-showcase" role ="main">
	<div class="jumbotron">
		<h1>General view of the nodes</h1>
	</div><!--end jumbotron -->
	<div class="page-header">
		<h1>State of each cores </h1>
	</div>
	<div class="row">
		<div class="col-md-6">
		<!--begining table -->
			<table id="example" class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>NETWORK ADDRESS</th>
						<th>STATE</th>
						<th>OTHERS</th>
					</tr>
				</thead>
				<tbody>';

$alive = 0;
$absent = 0;
$dead =0;

foreach ($json_array['items'] as $key => $value) {
echo '
					<tr><td>'.$value['id'].'</td>'.'<td>'.$value['network_address'].'</td>';

	if(strcmp($value['state'],"Alive")==0){
		$alive++;
			echo '<td><button type="button" class="btn btn-lg btn-success">'.$value['state'].'</button></td>
				<td><a href="../info_rsc.php?network_id='.$value['network_address'].'"><button type="button" class="btn btn-lg btn-success">Details & submit job</button></a></td></tr>';
	}else if(strcmp($value['state'],"Absent")==0){
		$absent++;
		echo '<td><button type="button" class="btn btn-lg btn-warning">'.$value['state'].'</button></td>
				<td><a href="../info_rsc.php?network_id='.$value['network_address'].'"><button type="button" class="btn btn-lg btn-warning">Details & submit job</button></a></td></tr>';
	}else{
		$dead++;
		echo '<td><button type="button" class="btn btn-lg btn-danger">'.$value['state'].'</button></td>
				<td><a href="../info_rsc.php?network_id='.$value['network_address'].'"><button type="button" class="btn btn-lg btn-danger">Details & submit job</button></a></td></tr>';
	}
}
echo '
				</tbody>
			</table>
		</div><!--end col-md-6 -->
	</div><!--row -->';

?>

		</div>

<script type="text/javascript">
	// For demo to fit into DataTables site builder...
	$('#example')
		.removeClass( 'display' )
		.addClass('table table-striped table-bordered');
</script>
	</body>
</html>
