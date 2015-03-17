<?php
	include './htpasswd.php';
	include '../header.php';
	gen_header("Login");
echo '<div class="container theme-showcase" role="main">
        <div class="jumbotron">
                <h1>Login</h1>
        </div>
        <div class="page-header">';

	if(!empty($_POST)){
		if(!empty($_POST['login']) && !empty($_POST['password'])){
			if(!test_passwd($_POST['login'],$_POST['password'])){
				header("location:/webui-oardocker/errors.php?pb=wrongauth");
			} else {
				session_start();
				$_SESSION['login'] = $_POST['login'];
				$_SESSION['pwd'] = $_POST['password'];
				header('location:/webui-oardocker/success.php?sc=login');
				exit();
			}
		} else {
			header("location:/webui-oardocker/errors.php?pb=wrongauth");
		}
	}
?>
        <div class="row">
            <div class="col-md-6">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<table class="table table">

<tr><td>Login :</td><td><input type="text" name="login" id="login" value="" /></td></tr>
<tr><td>Password :</td><td><input type="password" name="password" id="password" value="" /></td></tr>
<tr><td><input type="submit" name="submit" value="Log in" /></td></tr>
</table>
</form>
</div></div>
<?php include '../footer.php'; ?>


