<?php
function json_request($url){
$ch = curl_init();
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //Disable SSL verification -> useless here ( no https )
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);
$result=curl_exec($ch);
curl_close($ch);
return json_decode($result,true);
}

?>