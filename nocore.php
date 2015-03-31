<?php
include 'header.php';

gen_header("Logout");
echo '<div class="container theme-showcase" role="main">
<div class="jumbotron">
<h1>Details</h1>
</div>
<div class="page-header">';
echo '<div class="alert alert-danger" role="alert">
      					<strong>No core selected</strong> so I can display nothing...
      				</div>
</div>
</div>';
header("Refresh: 3;/webui-oardocker/index.php");

include 'footer.php';

?>

