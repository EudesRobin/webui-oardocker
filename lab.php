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


echo '<div class="jumbotron">
        <h1>Ensemble des ressources</h1>
        <p>Diverses infos à compléter...</p>
      </div>';

echo '<div class="page-header">
        <h1>Resumé</h1>
      </div>';

echo '      <div class="row">
        <div class="col-md-6">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>NET_ADDR</th>
              </tr>
            </thead>
            <tbody>';
		//parcours json_array
		foreach ($json_array['items'] as $key => $value) {
		    echo '<tr><td>'.$value['id'].'</td>'.'<td>'.$value['network_address'].'</td></tr>';
		}
              echo '
            </tbody>
          </table>
        </div>
</body></html>';


?>
