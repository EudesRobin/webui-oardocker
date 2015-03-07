<?php
session_start();
function gen_header($title)
{
echo '<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Oar-docker Webui">
	<meta name="author" content="Eudes Robin - Rossi Ombeline">
	<link rel="icon" href="/webui-oardocker/favicon.ico">
	<title>'.$title.'</title>
	<!-- Bootstrap core CSS -->
	<link href="/webui-oardocker/bootstrap-3.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Bootstrap theme -->
	<link href="/webui-oardocker/bootstrap-3.3.2-dist/css/bootstrap-theme.min.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>';

echo '
<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/webui-oardocker/index.php">WEBUI</a>
		</div><!--end navbar-header -->
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li><a href="/webui-oardocker/index.php">General view</a></li>
				<li><a href="/monika/">Monika</a></li>
				<li><a href="/drawgantt-svg/">Graphe Gant</a></li>';
				if (isset($_SESSION['login'])) {
					echo '<li><a href="/webui-oardocker/auth/deconnexion.php">Se déconnecter ('.($_SESSION['login']).')</a></li>';
				}else{
					echo '<li><a href="/webui-oardocker/auth/authentification.php">Authentification</a></li>';
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
