<?php

	if(isset($_GET['pb'])){
		if(strcmp($_GET['pb'],"nolog")==0){
			echo '<div class="alert alert-danger" role="alert">
				<strong>Ŷou must be logged to do this action</strong> ( docker user to submit/delete a job, oar user to create/delete a resource)
			</div>';
			//header("refresh:3;/webui-oardocker/index.php");
		}else if(strcmp($_GET['pb'],"wrongauth")==0){
  	      		echo '<div class="alert alert-danger" role="alert">
        			<strong>Invalid Login/password</strong>
      			</div>';
      			//header("refresh:3;/webui-oardocker/auth/login.php");
  		}else if(strcmp($_GET['pb'],"rsc_cmd")==0){
  		  	echo '<div class="alert alert-danger" role="alert">
  			      <strong>Missing parameter(s).</strong> A job submission must target a resource and execute a command.
      			</div>';
      			//header("refresh:3;/webui-oardocker/job.php?core={$_SESSION['job.php']['GET_BACKUP']['core']}");
  		}else if(strcmp($_GET['pb'],"wronguser")==0){
          		echo '<div class="alert alert-danger" role="alert">
        			<strong>Wrong user</strong> for this action
      			</div>';
      		//	header("refresh:3;/webui-oardocker/index.php");
    		}else if(strcmp($_GET['pb'],"ressource_inex")==0){
			echo '<div class="alert alert-danger" role="alert">
      	  			The selected core <strong>does not exist.</strong>
      			</div>';
	 		//header("refresh:3;/webui-oardocker/job.php");
		}else if(strcmp($_GET['pb'],"nocore")==0){
          echo '<div class="alert alert-danger" role="alert">
        <strong>No core selected</strong> so I can display nothing..
      </div>';
      //header("refresh:4;/webui-oardocker/index.php");
    }else if(strcmp($_GET['pb'],"wrong_param")==0){
			echo '<div class="alert alert-danger" role="alert">
      	  			You entered an invalid parameter.
      			</div>';
	 		//header("refresh:3;/webui-oardocker/job.php");
		}else if(strcmp($_GET['pb'],"error_create")==0){
      echo '<div class="alert alert-danger" role="alert">
                You entered an invalid parameter, resource not created.
            </div>';
      //header("refresh:3;/webui-oardocker/index.php");
    }else if(strcmp($_GET['pb'],"no_host")==0){
      echo '<div class="alert alert-danger" role="alert">
                The host targeted was not found , resource creation aborted.
            </div>';
      //header("refresh:3;/webui-oardocker/index.php");
    }else if(strcmp($_GET['pb'],"not_unique")==0){
      echo '<div class="alert alert-danger" role="alert">
                Core ID already existant, resource creation aborted.
            </div>';
      //header("refresh:3;/webui-oardocker/index.php");
    }else if(strcmp($_GET['pb'],"not_log")==0){
      echo '<div class="alert alert-danger" role="alert">
                You must be logged to do that.
            </div>';
      //header("refresh:3;/webui-oardocker/index.php");
    }else{
			echo '<div class="alert alert-danger" role="alert">
        			<strong>Unknow error</strong> Somehow, somewhere, something went terribly wrong :\'(
      			</div>';
		}		

}
?>
