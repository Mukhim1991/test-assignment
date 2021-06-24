<?php
$requestMethod = $_SERVER["REQUEST_METHOD"];
include('Rest.php');
$api = new Rest();
switch($requestMethod) {
	case 'GET':
		$from_dt = '';	
		$to_dt = '';	
		if($_GET['from_dt'] && $_GET['to_dt']) {
			$from_dt = $_GET['from_dt'];
			$to_dt = $_GET['to_dt'];
		}
		$api->getReimbursementDatewise($from_dt,$to_dt);
		break;
	default:
	header("HTTP/1.0 405 Method Not Allowed");
	break;
}
?>