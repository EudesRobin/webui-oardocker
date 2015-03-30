<?php
include('json_functions.php');

	$result = json_delete_rsc($_GET['core']);

	if(strcmp($result["status"],"deleted")==0){
		header("location:/webui-oardocker/success.php?sc=rsc_del");
	} else {
		header("location:/webui-oardocker/errors.php?pb");
		//var_dump($r);
	}

?>
