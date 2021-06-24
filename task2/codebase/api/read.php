<?php
$requestMethod = $_SERVER["REQUEST_METHOD"];
include('Rest.php');
$api = new Rest();
switch($requestMethod) {
	case 'GET':
		$reimbursement_id = '';	
		if($_GET['reimbursement_id']) {
			$reimbursement_id = $_GET['reimbursement_id'];
		}
		$api->getReimbursement($reimbursement_id);
		break;
	default:
	header("HTTP/1.0 405 Method Not Allowed");
	break;
}
?>