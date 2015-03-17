<?php
	// def functions for json
	include('json_functions.php');
	include('../header.php');
	gen_header('Command Output');
	echo '
<div class="container theme-showcase" role ="main">
	<div class="jumbotron">
		<h1>Output cmd</h1>
	</div><!--end jumbotron -->
';
	
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
	$r = json_submit_job($_POST['resource'],$_POST['name'],$_POST['properties'],$_POST['command'],$_POST['type'],$_POST['reservation'],$_POST['directory']);
	if($r["code"]==400){
		header("location:/webui-oardocker/errors.php?pb=ressource_inex");
		exit();
	} else if(isset($r["cmd_output"])){
		header("location:/webui-oardocker/success.php?sc=job_cree");
		exit();
	}
		
	 else {var_dump($r);}
	}else{
	// minimals parameters for the json request
		header("location:/webui-oardocker/errors.php?pb=rsc_cmd");
		exit();
	}
echo '</div>';
include '../footer.php';
?>
