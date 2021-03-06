<?php

function check_usr_create($usr){
	return (strcmp("oar",$usr)==0);
}

function check_usr_job($usr){
	return (strcmp("docker",$usr)==0);
}

function check_job($core){

	$result = json_request_simple_url('http://localhost/oarapi/resources/'.$core.'/jobs.json');

	if(strcmp($result["total"],"0")==0){
		return '<button type="button" class="btn btn-lg btn-success">Free</button>';
	}else{
		return '<button type="button" class="btn btn-lg btn-warning">Busy</button>';
	}

}

function json_request_simple_url($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,$url);
	$result=curl_exec($ch);

	curl_close($ch);

	return json_decode($result,true);
}

function json_submit_job($resource,$name,$type,$command,$reservation,$directory){
	
	// $_SESSION not found , but generate a notice
	session_start();
	// you must be logged to do this request ..
	if(!isset($_SESSION['login'])){
		header('location:/webui-oardocker/errors.php?pb=not_log');
		exit();
	}

	// as docker user, only ;)
	if(!check_usr_job($_SESSION['login'])){
		header('location:/webui-oardocker/errors.php?pb=wronguser');
		exit();
	}

	// data field for json
	$data = array();

		$data['resource'] = $resource;
		$data['command'] = $command;
	
	
	if(!empty($name)){
		$data['name'] = $name;
	}

	if(!empty($type)){
		$data['type'] = $type;
	}


	if(!empty($reservation)){
		$data['reservation'] = $reservation;
	}

	if(!empty($directory)){
		$data['directory'] = $directory;
	}

	$data_string = json_encode($data);

	$ch = curl_init('http://'.$_SESSION['login'].':'.$_SESSION['pwd'].'@localhost/oarapi-priv/jobs.json');

	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));

	$result = curl_exec($ch);

	curl_close($ch);
	return json_decode($result,true);
}

function json_create_rsc($hostname,$cpu,$core,$mem,$properties){
	
	// $_SESSION not found , but generate a notice
	session_start();
	// you must be logged to do this request ..
	if(!isset($_SESSION['login'])){
		header('location:/webui-oardocker/errors.php?pb=not_log');
		exit();
	}

	// oar user only
	if(!check_usr_create($_SESSION['login'])){
		header('location:/webui-oardocker/errors.php?pb=wronguser');
		exit();
	}

	// data field for json
	$data = array();

	$hosts = json_request_simple_url("http://localhost/oarapi/resources.json");
	
	// CHECK existence of the host
	$exist = false;
	foreach ($hosts['items'] as $key => $value) {
		$exist = $exist || strcmp($value['network_address'],$hostname)==0;
	}
	
	if(!$exist){
		header('location:/webui-oardocker/errors.php?pb=no_host');
		exit();
	}

	$data['network_address']=$hostname;
	$data['host']=$hostname;

	
	$cpu_def=0;
	$first_id_av=1;


	/*if(empty($_POST['cpu'])){
		// if cpu not specified, new cpu on the host.
		$checkcpu = json_request_simple_url("http://localhost/oarapi/resources/full.json");

		foreach ($checkcpu['items'] as $key => $value) {
			if($value['cpu']>$cpu_def){
				$cpu_def=$value['cpu'];
			}
		}
		$cpu_def=$cpu_def+1;

		$data['cpu']=$cpu_def;
	}else{ */
		
	//}
		$data['cpu']=$cpu;
		$data['core']=$core;

		if(!empty($properties)){
		$tmp = explode(',',$properties);
		foreach ($tmp as $key => $value) {
			$sec = explode('=',$value);
			$data[$sec[0]]=$sec[1];
		}

	}

	$data_string = json_encode($data);

	$ch = curl_init('http://'.$_SESSION['login'].':'.$_SESSION['pwd'].'@localhost/oarapi-priv/resources.json');

	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));

	$result = curl_exec($ch);

	curl_close($ch);

	return json_decode($result,true);
}

function json_delete_rsc($resource){
	
	// $_SESSION not found , but generate a notice
	session_start();

	// you must be logged to do this request ..
	if(!isset($_SESSION['login'])){
		header('location:/webui-oardocker/errors.php?pb=not_log');
		exit();
	}
	// oar user only
	if(!check_usr_create($_SESSION['login'])){
		header('location:/webui-oardocker/errors.php?pb=wronguser');
		exit();
	}

	// data field for json	
	$data = array();
	$datadead = array();

	$data['id']=$resource;
	$datadead['id']=$resource;
	$datadead['state']="Dead";

	$data_string = json_encode($data);
	$datadead_string = json_encode($datadead);

	$ch = curl_init('http://'.$_SESSION['login'].':'.$_SESSION['pwd'].'@localhost/oarapi-priv/resources/'.$resource.'/state.json');
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $datadead_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($datadead_string)));
	$result = curl_exec($ch);
	curl_close($ch);

	$ch = curl_init('http://'.$_SESSION['login'].':'.$_SESSION['pwd'].'@localhost/oarapi-priv/resources/'.$resource.'.json');
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));
	$result = curl_exec($ch);
	curl_close($ch);

	return json_decode($result,true);
}

function json_get_jobs(){

	$data = array();

	$data_string = json_encode($data);

	$ch = curl_init('http://'.$_SESSION['login'].':'.$_SESSION['pwd'].'@localhost/oarapi-priv/jobs/details.json');
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));
	$result = curl_exec($ch);
	curl_close($ch);


	return json_decode($result,true);
}

function json_stop_job($id){

	// $_SESSION not found , but generate a notice
	session_start();
	// you must be logged to do this request ..
	if(!isset($_SESSION['login'])){
		header('location:/webui-oardocker/errors.php?pb=not_log');
		exit();
	}

	// as docker user, only ;)
	if(!check_usr_job($_SESSION['login'])){
		header('location:/webui-oardocker/errors.php?pb=wronguser');
		exit();
	}

	$data = array();
	$data['id']=$id;

	$data_string = json_encode($data);

	$ch = curl_init('http://'.$_SESSION['login'].':'.$_SESSION['pwd'].'@localhost/oarapi-priv/jobs/'.$id.'.json');
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));
	$result = curl_exec($ch);
	curl_close($ch);


	return json_decode($result,true);
}

?>
