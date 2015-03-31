<?php
//	include 'header.php';

//gen_header("Success");

/*echo '<div class="container theme-showcase" role ="main">
	<div class="jumbotron">
		<h1>Success</h1>
	</div><!--end jumbotron -->';*/
	if(isset($_GET['sc'])){
		if(strcmp($_GET['sc'],"job_cree")==0){
			echo '<div class="alert alert-success" role="alert">
				<strong>Job has been created.</strong>
			</div>
			<script type="text/javascript" language="javascript">
				window.setTimeout("location=(\'job.php\');",2000);
			</script>';
			//header("refresh:3;/webui-oardocker/index.php");
		}else if(strcmp($_GET['sc'],"login")==0){
			echo '<div class="alert alert-success" role="alert">
				<strong>Valid user/password</strong>You are logged!
			</div>';
			//header("refresh:3;/webui-oardocker/index.php");
		}else if(strcmp($_GET['sc'],"logout")==0){
			echo '<div class="alert alert-success" role="alert">
				<strong>Sucess logout!</strong>
			</div>';
			//header("refresh:2;/webui-oardocker/index.php");
		}else if(strcmp($_GET['sc'],"ok_create")==0){
			echo '<div class="alert alert-success" role="alert">
				<strong>Resource successfully created.</strong>
				
			</div>
			<script type="text/javascript" language="javascript">
				window.setTimeout("location=(\'create.php\');",2000);
			</script>';
			//header("refresh:2;/webui-oardocker/index.php");
		}else if(strcmp($_GET['sc'],"rsc_del")==0){
			echo '<div class="alert alert-success" role="alert">
				<strong>Resource successfully deleted.</strong>
			</div>';
			//header("refresh:2;/webui-oardocker/index.php");
		}else if(strcmp($_GET['sc'],"job_del")==0){
			echo '<div class="alert alert-success" role="alert">
				<strong>Job successfully stopped.</strong>
			</div>';
			//header("refresh:2;/webui-oardocker/job_running.php");
		}
}
//echo '</div>';
//include 'footer.php';
?>
