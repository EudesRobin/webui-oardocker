<?php
	//phpinfo();

$url="http://localhost/oarapi/resources.json";
//  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
// Execute
$result=curl_exec($ch);
// Closing
curl_close($ch);

// Will dump a beauty json :3
$json_array = json_decode($result,true);

foreach ($json_array['items'] as $key => $value) {
    echo 'ID: '.$value['id'].'<->'.'NETWORK_ADDR : '.$value['network_address'].'</br>';
}

?>
