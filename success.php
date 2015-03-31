<?php

	switch($_GET['sc']){
		case "job_cree":
			echo '<div class="alert alert-success" role="alert">
				<strong>Job has been created.</strong>
			</div>
			<script type="text/javascript" language="javascript">
				window.setTimeout("location=(\'job.php\');",2000);
			</script>';
			break;
		case "ok_create":
			echo '<div class="alert alert-success" role="alert">
				<strong>Resource successfully created.</strong>
				
			</div>
			<script type="text/javascript" language="javascript">
				window.setTimeout("location=(\'create.php\');",2000);
			</script>';
			break;
		case "rsc_del":
			echo '<div class="alert alert-success" role="alert">
				<strong>Resource successfully deleted.</strong>
			</div>';
			break;
		case "job_del":
			echo '<div class="alert alert-success" role="alert">
				<strong>Job successfully stopped.</strong>
			</div>';
			break;
		default:
			echo '<div class="alert alert-success" role="alert">
				<strong>You\'ve done something wonderful, but we don\'t know what.</strong>
			</div>';
			
}
?>
