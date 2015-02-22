<?php
include 'json_request.php';
<script>
	function getnode(id){
		$.ajax({
			type:"GET",
			url='./info_node.php',
			data:"id="+id,
			success: function(data){
				$('content_center').html(data);
			}
		})
	}
</script>

if($_GET['id']==0)
{
	$url = 'http://localhost/oarapi/resources.json';
}else{
	$url = 'http://localhost/oarapi/resources/nodes/node'.$_GET['id'].'.json';
}
	$json_array  = json_request($url);

	echo '<div id="content_center" class="container theme-showcase" role ="main">
	<div class="jumbotron">
	<h1>Ensemble des ressources</h1>
	<p> EN cours de complétion</p>
	</div>
	<div class="page-header">
	        <h1>Resumé</h1></div>';

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

			foreach ($json_array['items'] as $key => $value) {
			    echo '<tr><td>'.$value['id'].'</td>'.'<td>'.$value['network_address'].'</td>';
			    if(!strpos($value['state'],'Alive')){
				$alive++;
				echo '<td><button type="button" class="btn btn-lg btn-success" onclick="getnode('.$value['id'].')">'.$value['state'].'</button></td></tr>';
			   }else if(!strpos($value['state'],'Absent')){
				$absent++;
				echo '<td><button type="button" class="btn btn-lg btn-warning">'.$value['state'].'</button></td></tr>';
			  }else{
				$dead++;
				echo '<td><button type="button" class="btn btn-lg btn-danger">'.$value['state'].'</button></td></tr>';
			  }
			}
	              echo '
	            </tbody>
	          </table>
	        </div></div>';
	     // Barre de  "vie" des nodes...
	      echo '<div class="page-header"><h1>PROG BRRE</h1></div><div class="progress">
	        <div class="progress-bar progress-bar-success" style="width: '.($alive/$taille*100).'%"><span class="sr-only">Complete (success)</span></div>
	        <div class="progress-bar progress-bar-warning" style="width: '.($absent/$taille*100).'%"><span class="sr-only">Complete (warning)</span></div>
	        <div class="progress-bar progress-bar-danger" style="width: '.($dead/$taille*100).'%"><span class="sr-only">Complete (danger)</span></div>
		</div></div></div>';
}else{
	echo '<p> ERROR PARAM UNKWON<p>';
}

?>