<?php
include 'header.php';

gen_header("Add resources");
?>
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
 	if(formData[0].value.length<=0 || formData[1].value.length<=0 || formData[2].value.length<=0 || formData[3].value.length<=0 ){
 		var container = document.getElementById('output');
 		container.innerHTML = "<div class=\"alert alert-danger\" role=\"alert\"><strong>Missing or invalid parameter(s).</strong> Resource not created.</div>";
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
echo '<div class="container theme-showcase" role ="main">
			<div class="jumbotron">
			<h1>Add a resource</h1>
			</div>
			<div class="page-header">
			    <h1>Add a resource</h1>
			    <p>For now, you can only add a cpu/core to an existing host.
			    cpu, mem are integers.
			    
			    others prop have this format : prop1=value,prop2=value ...</p>

			    <p>If you target an unexistant host, the resource will be created,
			    but the docker container associated with the new host will not be created,
			    and the resource will be seen as "suspected" and will be "unusable".</p>
				<p> You can also only target an existing host, and the cpu id will be automatically selected.</p>
			</div>
		<div id="output" ></div>';


	echo '
	<div class="row">
	    <div class="col-md-6">
			<form id="myform" action="/webui-oardocker/action/do_create.php" method="post">
				<table class="table table-striped">
		            <thead>
		              <tr>
		                <th></th>
		                <th>Parameters</th>
				<th></th>
		              </tr>
		            </thead>
	            	<tbody>

					 <tr><td>network_address (hostname) </td><td><input type="text" name="hostname" size="50" value=""/></td><td><img src="Help.png" title ="for exemple: node1"></td></tr>
					 <tr><td>CPU ID</td><td><input type="text" name="cpu" size="50" value=""/></td><td><img src="Help.png" title ="for exemple: 1, could be a new cpu id"></td></tr>
					 <tr><td>CORE ID</td><td><input type="text" name="core" size="50" value=""/></td><td></td></tr>
					 <tr><td>MEM of this core</td><td><input type="text" name="mem" size="50" value="4"/></td><td></td></tr>
					 <tr><td>Others properties</td><td><input type="text" name="properties" size="50" value=""/></td><td></td></tr>
					 <tr><td></td><td><input type="submit" value="OK"></td></tr>

					</tbody>
	        	</table>
			</form>	
	    </div>
	</div>
</div>';

include 'footer.php';
?>
