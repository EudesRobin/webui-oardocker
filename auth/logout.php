<?php
include '../header.php';
// Démarrage ou restauration de la session
session_start();
// Réinitialisation du tableau de session
// On le vide intégralement
$_SESSION = array();
// Destruction de la session
session_destroy();
// Destruction du tableau de session
unset($_SESSION);

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

header("Refresh: 1;/webui-oardocker/index.php");
exit();

include '../footer.php';
?>
