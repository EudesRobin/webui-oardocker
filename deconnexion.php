<?php
// Démarrage ou restauration de la session
session_start();
// Réinitialisation du tableau de session
// On le vide intégralement
$_SESSION = array();
// Destruction de la session
session_destroy();
// Destruction du tableau de session
unset($_SESSION);

echo'Vous avez ete correctement deconnecte.';
header("Refresh: 5; http://localhost:48080/webui-oardocker/index.php");
exit();

?>
