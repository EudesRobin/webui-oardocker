<?php
	include 'header.php';

gen_header("Error");

echo '<div class="container theme-showcase" role ="main">
	<div class="jumbotron">
		<h1>Success</h1>
	</div><!--end jumbotron -->';
	if(isset($_GET['sc'])){
		if(strcmp($_GET['sc'],"job_cree")==0){
			echo '<div class="alert alert-success" role="alert">
				<strong>Job has been created</strong>
			</div>';
			header("refresh:3;/webui-oardocker/index.php");
		}
}
echo '</div>';
include 'footer.php';
?>
