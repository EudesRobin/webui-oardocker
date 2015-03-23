<?php
include 'header.php';
gen_header("Info Node");
session_start(); ?>


<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	$('#tab').dataTable({
		"ajax": {
			"url" : "http://localhost:48080/oarapi/resources/full.json",
			"dataSrc":"items"
		},
		"columns": [
		{ "data": "host","title": "Hostname",
			"render": function ( data, type, full, meta ) {
				return '<button type="button" class="btn btn-lg btn-default">'+data+'</button>';
		    }
		},
		{ "data" : "cpu","title": "CPU ID",
		"render": function ( data, type, full, meta ) {
				return '<button type="button" class="btn btn-lg btn-default">'+data+'</button>';
		    }
		},
		{ "data" : "core","title": "Core ID",
		"render": function ( data, type, full, meta ) {
				return '<button type="button" class="btn btn-lg btn-default">'+data+'</button>';
		    }
		},
		{ "data" : "id","title": "RSC ID",
		"render": function ( data, type, full, meta ) {
				return '<button type="button" class="btn btn-lg btn-default">'+data+'</button>';
		    }
		},
		{ "data" : "state", "title": "State",
			"render": function ( data, type, full, meta ) {
				if(data=='Alive'){
					return '<button type="button" class="btn btn-lg btn-success">'+data+'</button>';
				}else if(data=='Absent'){
					return '<button type="button" class="btn btn-lg btn-warning">'+data+'</button>';
				}
				return '<button type="button" class="btn btn-lg btn-danger">'+data+'</button>';
		    }
		},
		{"data":"id","title": "Properties","orderable":false,
			"render": function ( data, type, full, meta ){
				return '<a href="/webui-oardocker/info_rsc.php?core='+data+'"><button type="button" class="btn btn-lg btn-info">Details</button></a>';
			}
		},
		{"data":"id", "title": "Action","orderable":false,
			"render": function ( data, type, full, meta ){
				return '<a href="/webui-oardocker/job.php?core='+data+'"><button type="button" class="btn btn-lg btn-primary">Send a job to this core</button></a>';
			}	
		},
		{"data":"id","title": "","orderable":false,
			"render": function ( data, type, full, meta ){
				return '<a href="/webui-oardocker/delete_rsc.php?core='+data+'" onclick="window.open(this.href); return false;"><button type="button" class="btn btn-lg btn-danger">Delete this core</button></a>';
	}
		},
		],
		"order": [[ 0, "asc" ]],
	});
} );
</script>
<div class="container theme-showcase" role ="main">
	<div class="jumbotron">
		<h1>General view of the nodes</h1>
	</div><!--end jumbotron -->
	<div class="page-header">
		<h1>State of each core </h1>
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

