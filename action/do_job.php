<?php
include('json_functions.php');
	$result = json_submit_job($_POST['resource'],$_POST['name'],$_POST['properties'],$_POST['command'],$_POST['reservation'],$_POST['directory']);
	if(strpos($result['message'],'reservation')){
		header("location:/webui-oardocker/errors.php?pb=wrong_param");
	} else if(isset($result["cmd_output"])){
		header("location:/webui-oardocker/success.php?sc=job_cree");
	}else{
		header("location:/webui-oardocker/errors.php?pb");
	}

?>
