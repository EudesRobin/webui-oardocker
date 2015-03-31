<?php

/*	if(isset($_GET['pb'])){

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

		}*/
		switch($_GET['pb']){
			case "wronguser":
				echo '<div class="alert alert-danger" role="alert">
        				<strong>Wrong user</strong> for this action
      				</div>';
      				break;
      			case "nocore":
      				echo '<div class="alert alert-danger" role="alert">
      					<strong>No core selected</strong> so I can display nothing...
      				</div>';
      				break;
      			case "wrong_param":
      				echo '<div class="alert alert-danger" role="alert">
      					You entered an invalid parameter.
      				</div>';
      				break;
      			case "error_create":
      				echo '<div class="alert alert-danger" role="alert">
      					You entered an invalid parameter, resource not created.
      				</div>';
      				break;
      			case "no_host":
      				echo '<div class="alert alert-danger" role="alert">
      					The host targeted was not found , resource creation aborted.
      				</div>';
      				break;
      			case "not_log":
      				echo '<div class="alert alert-danger" role="alert">
      					You must be logged to do that.
      				</div>';
      				break;
      			default:
      				echo '<div class="alert alert-danger" role="alert">
        				<strong>Unknow error</strong> Somehow, somewhere, something went terribly wrong :\'(
      				</div>';
      		}		
?>
