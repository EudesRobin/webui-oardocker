<?php
	
	include 'json_functions.php';

	function cmd_add_rsc($hostname,$cpu,$mem,$properties){
	
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
	// value of core id must be = id of rsc , will be set after. -1 -> impossible value.
	$prog = "sudo oarnodesetting -a -h {$hostname} -p cpu={$cpu} -p core=-1 -p mem={$mem} -p host={$hostname}";

	$hosts = json_request_simple_url("http://localhost/oarapi/resources.json");
	
	
	$exist = false;
	foreach ($hosts['items'] as $key => $value) {
		$exist = $exist || strcmp($value['network_address'],$hostname)==0;
	}
	
	if(!$exist){
		header('location:/webui-oardocker/errors.php?pb=no_host');
		exit();
	}

	$uni = false;
	foreach ($hosts['items'] as $key => $value) {
		$uni = $uni || $value['id']==$core;
	}

	if($uni){
		header('location:/webui-oardocker/errors.php?pb=not_unique');
		exit();
	}

	// others prop ( already defined by default )
	if(!empty($properties)){

		$tmp = explode(',',$properties);
		foreach ($tmp as $key => $value) {
			$prog.=" -p ".$value;
		}

	}

	$output = shell_exec($prog);

	

	$check_id = json_request_simple_url("http://localhost/oarapi/resources/nodes/{$hostname}.json");

	foreach ($check_id['items'] as $key => $value) {
		if($value['id']!=$value['core']){
			$output.=shell_exec("sudo oarnodesetting -r {$value['id']} -p core={$value['id']} ");
		}
	}
	
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
	if(!empty($_POST['hostname'])||!empty($_POST['cpu'])||!empty($_POST['core'])){

	// For now, we just dump de json result
	$r = cmd_add_rsc($_POST['hostname'],$_POST['cpu'],$_POST['mem'],$_POST['properties']);
	if(strpos($r,'ERROR')!== false){
		header("location:/webui-oardocker/errors.php?pb=error_create");
		exit();
	}else{
		header("location:/webui-oardocker/success.php?sc=ok_create");
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
