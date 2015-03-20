<?php

	function cmd_add_rsc($hostname,$cpu,$core,$mem,$properties){
	
	// you mist be logged to do this request ..
	if(!isset($_SESSION['login'])){
		header('location:/webui-oardocker/auth/redirect_login.php');
		exit();
	}

	// as oar user, only ;)
	if(strcmp($_SESSION['login'],"oar")!=0){
		header('location:/webui-oardocker/auth/redirect_login.php');
		exit();
	}

	// empty param already checked before we call this fct
	$prog = "sudo oarnodesetting -a -h {$hostname} -p cpu={$cpu} -p core={$core} -p mem={$mem} -p host={$hostname}";

	// others prop ( already defined by default )
	if(!empty($properties)){

		$tmp = explode(',',$properties);
		foreach ($tmp as $key => $value) {
			$prog.=" -p ".$value;
		}

	}

	$output = shell_exec($prog);
	return $output;
}

	include'../header.php';
	gen_header('Ressource créée');
echo '<div class="container theme-showcase" role ="main">
			<div class="jumbotron">
			<h1>Ressource créée</h1>
			</div>
			<div class="page-header">
			    <h1>Ressource créée</h1>
			</div>';
	
	if(!isset($_SESSION['login'])){
		header("location:/webui-oardocker/errors.php?pb=nolog");
		exit();
	}
	if(strcmp($_SESSION['login'],"oar")!=0){
		header("location:/webui-oardocker/errors.php?pb=wronguser");
		exit();
	}
	if(!empty($_POST['hostname'])||!empty($_POST['cpu'])||!empty($_POST['core'])||!empty($_POST['core'])){

	// For now, we just dump de json result
	$r = cmd_add_rsc($_POST['hostname'],$_POST['cpu'],$_POST['core'],$_POST['mem'],$_POST['properties']);
	if(strpos($r,'ERROR')!== false){
		header("location:/webui-oardocker/errors.php?pb=error_create");
		exit();
	}else{
		header("location:/webui-oardocker/success.php?pb=ok_create");
		exit();
	}
	}else{
	// minimals parameters for the json request
		header("location:/webui-oardocker/errors.php?pb=rsc_cmd");
		exit();
	}

echo '</div>';

include '../footer.php';
?>
