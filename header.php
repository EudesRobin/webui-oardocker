<?php
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
    <link rel="icon" href="./favicon.ico">

    <title>'.$title.'</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap-3.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="../bootstrap-3.3.2-dist/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>';

echo 
'<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">WEBUI</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">General view</a></li>
            <li><a href="../monika/">Monika</a></li>
            <li><a href="../drawgantt-svg/">Graphe Gant</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>';
}
?>
