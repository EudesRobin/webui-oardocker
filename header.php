<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Oar-docker Webui">
	<meta name="author" content="Eudes Robin - Rossi Ombeline">
	<link rel="icon" href="/webui-oardocker/favicon.ico">
	

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

	<script type="text/javascript" language="javascript" src="http://malsup.github.com/jquery.form.js"></script> 
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<!-- Script - update info logout ... -->
<script type="text/javascript" language="javascript">

function update(){
	var container = document.getElementById('info');
 	container.innerHTML = "<div class=\"alert alert-success\" role=\"alert\"><strong>You have been successfuly logout</strong></div>";
 	window.setTimeout("location=('/webui-oardocker/index.php');",2000);
}

function kill_session(){
	if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

    xmlhttp.open("GET","/webui-oardocker/auth/logout.php",false);
    xmlhttp.send();
    update(); 
}
</script>

<?php
session_start();

function gen_header($title){
echo "<title>${title}</title></head><body>";
echo '
<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			
			</button>
			<a class="navbar-brand" href="/webui-oardocker/index.php">WEBUI</a>
		</div><!--end navbar-header -->
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li><a href="/webui-oardocker/index.php">General view</a></li>
				<li><a href="/monika/">Monika</a></li>
				<li><a href="/drawgantt-svg/">Graphe Gant</a></li>
				<li><a href="/webui-oardocker/create.php">Add a resource</a></li>
				<li><a href="/webui-oardocker/job.php">Create job</a></li>
				<li><a href="/webui-oardocker/job_running.php">See current jobs</a></li>';
				if (isset($_SESSION['login'])) {
					echo '<li><a href="#" onclick="kill_session()">Logout  ('.($_SESSION['login']).')</a></li>';
				}else{
					echo '<li><a href="/webui-oardocker/auth/login.php">Log in</a></li>';
				}
				echo '
			</ul>
		</div><!--end navbar -->
	</div><!--end container -->
</nav>
<!--end fixed-navbar -->
';
}
?>
