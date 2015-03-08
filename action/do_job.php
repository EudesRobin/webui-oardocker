<?php
	// def functions for json
	include('json_functions.php');
	include('../header.php');
	gen_header('Command Output');
	
	if(!isset($_SESSION['login'])){
		header("location:/webui-oardocker/errors.php?pb=nolog");
		exit();
	}
	if(strcmp($_SESSION['login'],"docker")!=0){
		header("location:/webui-oardocker/errors.php?pb=wronguser");
		exit();
	}
	if(!empty($_POST['command'])&&!empty($_POST['resource'])){

	// For now, we just dump de json result
	$r = json_request_post($_POST['resource'],$_POST['name'],$_POST['properties'],$_POST['command'],$_POST['type'],$_POST['reservation'],$_POST['directory']);
	var_dump($r);
	}else{
	// minimals parameters for the json request
		header("location:/webui-oardocker/errors.php?pb=rsc_cmd");
		exit();
	}

include '../footer.php';
?>
