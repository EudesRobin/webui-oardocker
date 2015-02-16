<?php
include 'header.php';
gen_header("General view");

include 'nav.php';


$url="http://localhost/oarapi/resources.json";
//  Initiate curl

$ch = curl_init();

// Disable SSL verification // useless here ( no https )
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
// Execute
$result=curl_exec($ch);
// Closing
curl_close($ch);

// Save json in an array :)
$json_array = json_decode($result,true);



echo '<div class="container theme-showcase" role ="main">
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
			echo '<td><button type="button" class="btn btn-lg btn-success">'.$value['state'].'</button></td></tr>';
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
	echo '</body></html>';


?>
