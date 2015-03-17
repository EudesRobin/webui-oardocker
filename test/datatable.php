<?php
include '../header.php';
gen_header("Test");
session_start(); ?>
<script type="text/javascript" charset="utf-8">
function getQuerystring(key, default_)
{
  if (default_==null) default_=""; 
  key = key.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
  var regex = new RegExp("[\\?&]"+key+"=([^&#]*)");
  var qs = regex.exec(window.location.href);
  if(qs == null)
    return default_;
  else
    return qs[1];
}
</script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	var core= getQuerystring('core');
	$('#tab').dataTable({
		"ajax": {
			"url" : 'http://localhost:48080/oarapi/resources/'+core+'.json',
			dataSrc: function (data ){
					var x = new Array();
						/*x.push(data.scheduler_priority);
						x.push(data.finaud_decision);
						x.push(data.core);
						x.push(data.deploy);
						x.push(data.besteffort);
						x.push(data.cpuset);
						x.push(data.last_job_date);
						x.push(data.desktop_computing);
						x.push(data.drain);
						x.push(data.state);
						x.push(data.available_upto);
						x.push(data.id);
						x.push(data.cpu);
						x.push(data.api_timestamp);
						x.push(data.expiry_date);
						x.push(data.host);
						x.push(data.network_address);
						x.push(data.suspended_jobs);
						x.push(data.next_finaud_decision);
						x.push(data.last_available_upto);
						x.push(data.mem);
						x.push(data.state_num);
						x.push(data.type);
						x.push(data.next_state);*/
						x.push(data);
					return x;
			}
		},
		"columns": [
		{ "data" : "scheduler_priority","title": "scheduler_priority"},
		{ "data" : "finaud_decision","title": "finaud_decision"},
		{ "data" : "core","title": "core"},
		{ "data" : "deploy","title": "deploy"},
		{ "data" : "besteffort","title": "besteffort"},
		{ "data" : "cpuset","title": "cpuset"},
		{ "data" : "last_job_date","title": "last_job_date"},
		{ "data" : "desktop_computing","title": "desktop_computing"},
		{ "data" : "drain","title": "drain"},
		{ "data" : "state","title": "state"},
		{ "data" : "available_upto","title": "available_upto"},
		{ "data" : "id","title": "id"},
		{ "data" : "cpu","title": "cpu"},
		{ "data" : "api_timestamp","title": "api_timestamp"},
		{ "data" : "expiry_date","title": "expiry_date"},
		{ "data" : "host","title": "host"},
		{ "data" : "network_address","title": "network_address"},
		{ "data" : "suspended_jobs","title": "suspended_jobs"},
		{ "data" : "next_finaud_decision","title": "next_finaud_decision"},
		{ "data" : "last_available_upto","title": "last_available_upto"},
		{ "data" : "mem","title": "mem"},
		{ "data" : "state_num","title": "state_num"},
		{ "data" : "next_finaud_decision","title": "next_finaud_decision"},
		{ "data" : "type","title": "type"},
		{ "data" : "next_state","title": "next_state"},
	
		]
	});
} );
</script>
<div class="container theme-showcase" role ="main">
	<div class="jumbotron">
		<h1>General view of the nodes</h1>
	</div><!--end jumbotron -->
	<div class="page-header">
		<h1>State of each cores </h1>
	</div>
	<div class="row">
		<div class="col-md-6">
		<!--begining table -->
			<table id="tab" class="table table-striped">
			</table>
		</div>
	</div>
<?php include '../footer.php'; ?>

