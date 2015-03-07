<?php

function json_request_simple_url($url){

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);
$result=curl_exec($ch);

curl_close($ch);

return json_decode($result,true);
}

function json_request_post($resource,$name,$properties,$command,$type,$reservation,$directory){

$data = array();
session_start();
// you mist be logged to do this request ..
if(!isset($_SESSION['login'])){
	header('location:/webui-oardocker/auth/redirect_login.php');
	exit();
}

// as docker user, only ;)
if(strcmp($_SESSION['login'],"docker")!=0){
	header('location:/webui-oardocker/auth/redirect_login.php');
	exit();
}

if(!empty($resource) && !empty($command) ){
$data['resource'] = $resource;
$data['command'] = $command;
}

if(!empty($name)){
$data['name'] = $name;
}

if(!empty($properties)){
$data['property'] = $properties;
}

if(!empty($type)){
$data['type'] = $type;
}

if(!empty($reservation)){
$data['reservation'] = $reservation;
}

if(!empty($directory)){
$data['directory'] = $directory;
}

$data_string = json_encode($data);

$ch = curl_init('http://'.$_SESSION['login'].':'.$_SESSION['pwd'].'@localhost/oarapi-priv/jobs.json');

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));

$result = curl_exec($ch);

curl_close($ch);
return json_decode($result,true);
}

?>