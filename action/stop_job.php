<?php
include('json_functions.php');

	$result = json_stop_job($_GET['id']);

	if(strcmp($result["status"],"Delete request registered")==0){
		header("location:/webui-oardocker/success.php?sc=job_del");
	} else {
		header("location:/webui-oardocker/errors.php?pb");
		//var_dump($r);
	}
?>
