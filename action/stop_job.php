<?php
include '../header.php';
include('json_functions.php');

gen_header("Stop job");
echo '<div class="container theme-showcase" role ="main">
			<div class="jumbotron">
			<h1>Stop job</h1>
			</div>
			<div class="page-header">
			    <h1>Stop job</h1>
			    
			</div>';

	$r = json_stop_job($_GET['id']);

	if(strcmp($r["status"],"Delete request registered")==0){
		header("location:/webui-oardocker/success.php?sc=job_del");
		exit();
	} else {
		var_dump($r);
	}
	echo '</div>';

include '../footer.php';
?>
