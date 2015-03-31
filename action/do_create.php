<?php
	
	include 'json_functions.php';
	include'../header.php';
	gen_header("Creation ressource");

		$result = json_create_rsc($_POST['hostname'],$_POST['cpu'],$_POST['core'],$_POST['mem'],$_POST['properties']);
		if(strpos($result['message'][0],'ERROR')){
			header("location:/webui-oardocker/errors.php?pb=wrong_param");
		}else{
			header("location:/webui-oardocker/success.php?sc=ok_create");
		}
		//var_dump($result);
?>
