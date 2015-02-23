<?php
include 'header.php';

include 'json_request.php';

if($_GET['id']==0)
{
	gen_header("General view");
	$url = 'http://localhost/oarapi/resources.json';

	echo '<div class="container theme-showcase" role ="main">
	<div class="jumbotron">
	<h1>General view of the nodes</h1>
	</div>
	<div class="page-header">
	    <h1>State of each cores </h1></div>';

}else{
		gen_header('Details of the node'.$_GET['id']);
		$url = 'http://localhost/oarapi/resources/nodes/node'.$_GET['id'].'.json';

		echo '<div class="container theme-showcase" role ="main">
		<div class="jumbotron">
		<h1>Details of the node'.$_GET['id'].'</h1>
		</div>
		<div class="page-header">
	    	<h1>State of each cores </h1></div>';
}
	$json_array  = json_request($url);

	echo '      <div class="row">
	        <div class="col-md-6">
	          <table class="table table-striped">
	            <thead>
	              <tr>
	                <th>#</th>
	                <th>NET_ADDR</th>
			<th>STATE</th>
	              </tr>
	            </thead>
	            <tbody>';
			//parcours json_array
			$taille = count($json_array['items']);

			$alive = 0;
			$absent = 0;
			$dead =0;
			$id=1;
			$cpt=1;

			foreach ($json_array['items'] as $key => $value) {
			    echo '<tr><td>'.$value['id'].'</td>'.'<td>'.$value['network_address'].'</td>';
			    	if(!strpos($value['state'],'Alive')){
					$alive++;
					echo '<td><a href="info_node.php?id='.$id.'" role="button" class="btn btn-lg btn-success">'.$value['state'].'</a></td></tr>';
				    }else if(!strpos($value['state'],'Absent')){
					$absent++;
					echo '<td><a href="info_node.php?id='.$id.'" role="button" class="btn btn-lg btn-warning">'.$value['state'].'</a></td></tr>';
				    }else{
					$dead++;
					echo '<td><a href="info_node.php?id='.$id.'" role="button" class="btn btn-lg btn-danger">'.$value['state'].'</a></td></tr>';
				    }
				 if($cpt%2==0){
				 	$id++;
				 }
				 $cpt++;
			}
	              echo '
	            </tbody>
	          </table>
	        </div></div>';
	     // Barre de  "vie" des nodes...
	      echo '<div class="page-header"><h1>Current state</h1></div><div class="progress">
	        <div class="progress-bar progress-bar-success" style="width: '.($alive/$taille*100).'%"><span class="sr-only">Complete (success)</span></div>
	        <div class="progress-bar progress-bar-warning" style="width: '.($absent/$taille*100).'%"><span class="sr-only">Complete (warning)</span></div>
	        <div class="progress-bar progress-bar-danger" style="width: '.($dead/$taille*100).'%"><span class="sr-only">Complete (danger)</span></div>
		</div></div></div>';

include 'footer.php';
?>