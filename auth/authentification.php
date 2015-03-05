<?php
	include './htpasswd.php';
	$errorMessage = '';
	if(!empty($_POST)){
		if(!empty($_POST['login']) && !empty($_POST['password'])){
			if(!test_passwd($_POST['login'],$_POST['password'])){
				$errorMessage = 'Mauvais login ou password !';
			} else {
				session_start();
				$_SESSION['login'] = $_POST['login'];
				$_SESSION['pwd'] = $_POST['password'];
				header('Location: http://localhost:48080/webui-oardocker/index.php');
				exit();
			}
		} else {
			$errorMessage = 'Veuillez inscrire vos identifiants !';
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<title>Formulaire d'authentification</title>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<fieldset>
<legend>Identifiez-vous</legend>
<?php
// Rencontre-t-on une erreur ?
if(!empty($errorMessage))
{
echo '<p>', htmlspecialchars($errorMessage) ,'</p>';
}
?>
       <p>
<label for="login">Login :</label>
<input type="text" name="login" id="login" value="" />
</p>
<p>
<label for="password">Password :</label>
<input type="password" name="password" id="password" value="" />
<input type="submit" name="submit" value="Se logguer" />
</p>
</fieldset>
</form>
</body>
</html>


