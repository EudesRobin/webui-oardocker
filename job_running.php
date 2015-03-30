<?php
include 'header.php';
gen_header("Currents Jobs");
session_start(); ?>

 <script type="text/javascript">
   function Supp(link){
    if(confirm('Confirmer la suppression ?')){
     document.location.href = link;
    }
   }
   function timeConverter(UNIX_timestamp){
  var a = new Date(UNIX_timestamp*1000);
  var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
  var year = a.getFullYear();
  var month = months[a.getMonth()];
  var date = a.getDate();
  var hour = a.getHours();
  var min = a.getMinutes();
  var sec = a.getSeconds();
  var time = date + ' ' + month + ' ' + year + ' ; ' + hour + ':' + min + ':' + sec ;
  return time;
}
  </script>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	$('#tab').dataTable({
		"ajax": {
			"url" : "http://localhost:48080/oarapi/jobs/details.json",
			"dataSrc":"items"
		},
		"columns": [
		{ "data": "owner","title": "Owner",
			"render": function ( data, type, full, meta ) {
				return data;
		    }
		},
		{ "data" : "name","title": "Name",
		"render": function ( data, type, full, meta ) {
				return data;
		    }
		},
		{ "data" : "command","title": "Command",
		"render": function ( data, type, full, meta ) {
				return data;
		    }
		},
		{ "data" : "state","title": "State",
		"render": function ( data, type, full, meta ) {
				return data;
		    }
		},
		{ "data" : "submission_time","title": "Submission date",
		"render": function ( data, type, full, meta ) {
				return timeConverter(data);
				//return data;
		    }
		},
		{"data":"id","title": "Stop","orderable":false,
			"render": function ( data, type, full, meta ){
				return '<a href="/webui-oardocker/action/stop_job.php?id='+data+'" onclick="Supp(this.href); return false;"><button type="button" class="btn btn-lg btn-danger">Stop this job</button></a>';
	}
		},
		],
		"order": [[ 0, "asc" ]],
	});
} );
</script>
<div class="container theme-showcase" role ="main">
	<div class="jumbotron">
		<h1>Currents Jobs</h1>
	</div><!--end jumbotron -->
	<div class="page-header">
		<h1>Currents Jobs</h1>
	</div>
	<div class="row">
		<div class="col-md-6">
		<!--begining table -->
			<table id="tab" class="table table-striped">
			</table>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>

