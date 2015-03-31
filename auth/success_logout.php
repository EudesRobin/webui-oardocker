<?php
include '../header.php';

gen_header("Logout");
echo '<div class="container theme-showcase" role="main">
<div class="jumbotron">
<h1>Logout</h1>
</div>
<div class="page-header">';
echo '<div class="alert alert-success" role="alert">
<strong>You have been successfuly logout</strong>
</div>';
echo '</div>
</div>';
header("Refresh: 3;/webui-oardocker/index.php");

include '../footer.php';

?>

