<?php
	include 'header.php';

gen_header("Error");

echo '
<div class="container theme-showcase" role ="main">
	<div class="jumbotron">
		<h1>Error</h1>
	</div><!--end jumbotron -->
';
	if(isset($_GET['pb'])){
	if(strcmp($_GET['pb'],"nolog")==0){
      echo '<div class="alert alert-danger" role="alert">
        <strong>Ŷou must be logged to do this action</strong> ( docker user to submit/delete a job, oar user to create/delete a resource)
      </div>';
      header("refresh:2;/webui-oardocker/index.php");
  }else if(strcmp($_GET['pb'],"wrongauth")==0){
  	      echo '<div class="alert alert-danger" role="alert">
        <strong>Invalid Login/password</strong>
      </div>';
      header("refresh:2;/webui-oardocker/auth/login.php");
  }else if(strcmp($_GET['pb'],"rsc_cmd")==0){
  	  	echo '<div class="alert alert-danger" role="alert">
        <strong>Missing parameter(s)</strong> A job submission mst target a resource and do something (execute a command)
      </div>';
      header("refresh:2;/webui-oardocker/job.php?id={$_SESSION['job.php']['GET_BACKUP']['id']}&cpu={$_SESSION['job.php']['GET_BACKUP']['cpu']}");
  }

}else{
	echo '<div class="alert alert-danger" role="alert">
        <strong>Unknow error</strong>Somehow, somewhere, something went terribly wrong :\'(
      </div>';
      header("refresh:2;/webui-oardocker/index.php");
}

echo '</div>';
include 'footer.php';
?>