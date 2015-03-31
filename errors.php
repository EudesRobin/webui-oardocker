<?php
		switch($_GET['pb']){
			case "wronguser":
				echo '<div class="alert alert-danger" role="alert">
        				<strong>Wrong user</strong> for this action
      				</div>';
      				break;
      			case "wrong_param":
      				echo '<div class="alert alert-danger" role="alert">
      					You entered an invalid parameter.
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
