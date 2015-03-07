<?php
	// def functions for json
	include('json_functions.php');
	if(!empty($_POST['command'])&&!empty($_POST['resource'])){

	// For now, we just dump de json result
	$r = json_request_post($_POST['resource'],$_POST['name'],$_POST['properties'],$_POST['command'],$_POST['type'],$_POST['reservation'],$_POST['directory']);
	var_dump($r);
	}else{
	// minimals parameters for the json request
	echo 'Invalid job, you must submit a request with at least a targeted resource and a command to do';
	}
?>
