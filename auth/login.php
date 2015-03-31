<?php
	include './htpasswd.php';
	include '../header.php';
	gen_header("Login");
	 ?>
<script type="text/javascript" language="javascript">
function updatel(data){
	var container = document.getElementById('info');
	if(data=="ok"){
 	container.innerHTML = "<div class=\"alert alert-success\" role=\"alert\"><strong>You have been successfuly logged</strong></div>";
 	window.setTimeout("location=('/webui-oardocker/index.php');",2000);
 	}else{
 	container.innerHTML = "<div class=\"alert alert-danger\" role=\"alert\"><strong>Invalid Login/password</strong></div>";
 	}
}
</script>

<?php

echo '<div class="container theme-showcase" role="main">
        <div class="jumbotron">
                <h1>Login</h1>
        </div>
        <div id="info"></div>
        <div class="page-header">';


	if(!empty($_POST)){
		if(!empty($_POST['login']) && !empty($_POST['password'])){
			if(!test_passwd($_POST['login'],$_POST['password'])){
				echo '<script type="text/javascript"> updatel("no");</script>';
			} else {
				session_start();
				$_SESSION['login'] = $_POST['login'];
				$_SESSION['pwd'] = $_POST['password'];
				echo '<script type="text/javascript"> updatel("ok");</script>';
				include '../footer.php';
				exit();
			}
		} else {
			echo '<script type="text/javascript"> updatel("no");</script>';
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



