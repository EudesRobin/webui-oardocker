<?php
	include('json_functions.php');

	$result = json_submit_job($_POST['resource'],$_POST['name'],$_POST['properties'],$_POST['command'],$_POST['type'],$_POST['reservation'],$_POST['directory']);

		switch($result["code"]){
			case 400:
				header("location:/webui-oardocker/errors.php?pb=ressource_inex");
				break;
			case 500: 
				header("location:/webui-oardocker/errors.php?pb=wrong_param");
				break;
			default:
				if(isset($result["cmd_output"])){
				header("location:/webui-oardocker/success.php?sc=job_cree");
				}else{
				//var_dump($result);
				header("location:/webui-oardocker/errors.php?pb");
				}
		}

?>
