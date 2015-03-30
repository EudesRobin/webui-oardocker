<?php
include '../header.php';
include('json_functions.php');

gen_header("Delete resource");
echo '<div class="container theme-showcase" role ="main">
			<div class="jumbotron">
			<h1>Delete this resource</h1>
			</div>
			<div class="page-header">
			    <h1>Delete a resource</h1>
			    
			</div>';

	$r = json_delete_rsc($_GET['core']);

	if(strcmp($r["status"],"deleted")==0){
		header("location:/webui-oardocker/success.php?sc=rsc_del");
		exit();
	} else {
		var_dump($r);
	}
	echo '</div>';

include '../footer.php';
?>
