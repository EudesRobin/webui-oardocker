<?php
include 'header.php';
include('action/json_functions.php');

gen_header("Delete resource");
echo '<div class="container theme-showcase" role ="main">
			<div class="jumbotron">
			<h1>Delete this resource</h1>
			</div>
			<div class="page-header">
			    <h1>Delete a resource</h1>
			    
			</div>';

	
	if(!isset($_SESSION['login'])){
		header("location:/webui-oardocker/errors.php?pb=nolog");
		exit();
	}
	if(strcmp($_SESSION['login'],"oar")!=0){
		header("location:/webui-oardocker/errors.php?pb=wronguser");
		exit();
	}

	$r = json_delete_rsc($_POST['resource']);

	var_dump($r);
	echo 'Toto.</div>';

include 'footer.php';
?>
