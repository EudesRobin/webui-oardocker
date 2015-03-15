<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Oar-docker Webui">
	<meta name="author" content="Eudes Robin - Rossi Ombeline">
	<link rel="icon" href="/webui-oardocker/favicon.ico">
	<title>test</title>
	<!-- Bootstrap core CSS -->
	<link href="/webui-oardocker/bootstrap-3.3.2/css/bootstrap.min.css" rel="stylesheet">
	<!-- Bootstrap theme -->
	<link href="/webui-oardocker/bootstrap-3.3.2/css/bootstrap-theme.min.css" rel="stylesheet">
	<!-- Datatable bootstrap integration -->
	<link rel="stylesheet" type="text/css" href="/webui-oardocker/bootstrap-3.3.2/plugins/datatables-1.10/css/dataTables.bootstrap.css">

	<!-- jquery ... -->
	<script type="text/javascript" language="javascript" src="/webui-oardocker/bootstrap-3.3.2/js/jquery-2.1.3.min.js"></script>
	<!-- Bootstrap js -->
	<script src="/webui-oardocker/bootstrap-3.3.2/js/bootstrap.min.js"></script>
	<!-- jquery datatables plugins -->
	<script type="text/javascript" language="javascript" src="/webui-oardocker/bootstrap-3.3.2/plugins/datatables-1.10/js/jquery.dataTables.min.js"></script>
	<!-- datatable bootstrap js-->
	<script type="text/javascript" language="javascript" src="/webui-oardocker/bootstrap-3.3.2/plugins/datatables-1.10/js/dataTables.bootstrap.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- check https://datatables.net/reference/option/columns.data -->
</head>
<body>
			<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#tab').dataTable({
					"ajax": {
						"url" : "http://localhost:48080/oarapi/resources/full.json",
						"dataSrc":"items"
					},
					"columns": [
					{ "data": "host"},
					{ "data" : "core"},
					{ "data" : "cpu"},
					{ "data" : "state"}
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

			<thead>
				<tr>
					<th>Hostname</th>
					<th>CPU ID</th>
					<th>CORE ID</th>
					<th>STATE</th>
				</tr>
			</thead>


		</div>
	</div>
</body>
</html>

