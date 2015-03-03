<?php
	include('json_request.php');
	if(!empty($_POST['command'])&&!empty($_POST['resource'])){

	$r = json_post($_POST['resource'],$_POST['name'],$_POST['properties'],$_POST['command'],$_POST['type'],$_POST['reservation'],$_POST['directory']);
	var_dump($r);
	}else{
	echo 'job invalide, il faut cibler une resource, soumettre une cmd au min';
	}
?>
