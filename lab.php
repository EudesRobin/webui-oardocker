<?php
echo '
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./favicon.ico">

    <title>Page Lab - Test JSON </title>

    <!-- Bootstrap core CSS -->
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="../node_modules/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>';

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

echo '<div class="page-header">
        <h1>Ensemble des ressources</h1>
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
