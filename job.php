<?php
include 'header.php';
gen_header("Submit jobs");
;?>
<script type="text/javascript" language="javascript">
// prepare the form when the DOM is ready 
$(document).ready(function() { 
    var options = { 
        target:        '#output',   // target element(s) to be updated with server response 
        beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse  // post-submit callback 
 
        // other available options: 
        //url:       url         // override for forms action  attribute 
        //type:      type        // get or post, override for forms method attribute 
        //dataType:  null        // xml, script, or json (expected server response type) 
        //clearForm: true        // clear all form fields after successful submit 
        //resetForm: true        // reset the form after successful submit 
 
        // $.ajax options can be used here too, for example: 
        //timeout:   3000 
    }; 
 
    // bind to the forms submit event 
    $('#myform').submit(function() { 
        // inside event callbacks this is the DOM element so we first 
        // wrap it in a jQuery object and then invoke ajaxSubmit 
        $(this).ajaxSubmit(options); 
 
        // !!! Important !!! 
        // always return false to prevent standard browser submit and page navigation 
        return false; 
    }); 
}); 
 
// pre-submit callback 
function showRequest(formData, jqForm, options) { 
 	if(formData[0].value.length<=0 || formData[3].value.length<=0 ){
 		var container = document.getElementById('output');
 		container.innerHTML = "<div class=\"alert alert-danger\" role=\"alert\"><strong>Missing parameter(s).</strong> A job submission must target a resource and execute a command.</div>";
    	return false;
	}else{
    return true;
	}
} 
 
// post-submit callback 
function showResponse(responseText, statusText, xhr, $form)  { 
    // for normal html responses, the first argument to the success callback 
    // is the XMLHttpRequest objects responseText property 
 
    // if the ajaxSubmit method was passed an Options Object with the dataType 
    // property set to xml then the first argument to the success callback 
    // is the XMLHttpRequest objects responseXML property 
 
    // if the ajaxSubmit method was passed an Options Object with the dataType 
    // property set to json then the first argument to the success callback 
    // is the json data object returned by the server 
 
    //alert('status: ' + statusText + '\n\nresponseText: \n' + responseText + 
     //   '\n\nThe output div should have already been updated with the responseText.'); 
}
</script>

<?php

$_SESSION['job.php']['GET_BACKUP'] = $_GET;
echo '<div class="container theme-showcase" role ="main">
		<div class="jumbotron">
			<h1>Submit jobs</h1>
			</div>
			<div id="output" ></div>
			<div class="page-header">
			    <h1>Submit jobs</h1>
			</div>';


	echo '
	<div class="row">
	
	    <div class="col-md-6">
			<form id="myform" action="/webui-oardocker/action/do_job.php" method="post">
				<table class="table table-striped">
		            <thead>
		              <tr>
		                <th></th>
		                <th>Parameters</th>
				<th></th>
		              </tr>
		            </thead>
	            	<tbody>';
			if(empty($_GET['core'])){
				echo '<tr><td>Resources : </td><td><input type="text" name="resource" size="50" value=""/></td><td><img src="Help.png" title ="for example: core=1,walltime=00:30:00"></td></tr>
				';
			} else {
				echo '<tr><td>Resources : </td><td><input type="text" name="resource" size="50" value="core='.$_GET['core'].',walltime=00:30:00"/></td></tr>';
			}

					 
					echo ' <tr><td>Name : </td><td><input type="text" name="name" size="50" value="nouveau_job"/></td><td></td></tr>
					 <tr><td>Type : </td><td><input type="text" name="properties" size="50" value ="" /></td><td><img src="Help.png" title ="for example: besteffort"></td></tr>
					 <tr><td>Program to run : </td><td><input type="text" name="command" size="50" value="/bin/sleep 500"/></td><td></td></tr>
					 
					 <tr><td>Reservation dates : </td><td><input type="text" name="reservation" size="50" value=""/></td><td><img src="Help.png" title ="for example: 2007-03-25 17:32:12"></td></tr>
					 <tr><td>Directory : </td><td><input type="text" name="directory" size="50" value=""/></td><td><img src="Help.png" title ="for example: /bin"></td></tr>
					 <tr><td></td><td><input type="submit" value="OK"></td><td></td></tr>

					</tbody>
	        	</table>
			</form>	
	    </div>
	</div>
</div>';

include 'footer.php';
?>
