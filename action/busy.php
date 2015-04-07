<?php
include('json_functions.php');

	//$url="http://localhost/oarapi/resources/".$_GET['core']."/jobs.json";

	$result = json_request_simple_url('http://localhost/oarapi/resources/'.$_GET['core'].'/jobs.json');

	if(strcmp($result["total"],"0")==0){
		echo '<button type="button" class="btn btn-lg btn-success">Free</button>';
	}else{
		echo '<button type="button" class="btn btn-lg btn-warning">Busy</button>';
	}


	/*if(strcmp($result["status"],"deleted")==0){
		header("location:/webui-oardocker/success.php?sc=rsc_del");
	} else {
		header("location:/webui-oardocker/errors.php?pb");
		//var_dump($r);
	}*/
	//var_dump($result);
?>

