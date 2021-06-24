<?php
class Rest{
	
	public function insertReimbursement($postData){ 	
		include_once('../DBConnect.php');
		$employee_id=$postData["employee_id"];
		$purpose=$postData["purpose"];
		$reimbursement_dt=$postData["reimbursement_dt"];		
		$amount=$postData["amount"];
		$add_dt=date('Y-m-d');
		
			
		$res=mysqli_query($con,"insert into reimbursement(employee_id, purpose, reimbursement_dt, amount, add_dt) values('$employee_id', '$purpose', '$reimbursement_dt', '$amount', '$add_dt')");
		
		$Response = array();
		if($res)
		{
			$Response['result'] = array(
				'employee_id' => $employee_id,
				'purpose' => $purpose,
				'reimbursement_dt' => $reimbursement_dt,
				'amount' => $amount,
				'add_dt' => $add_dt,
			);
			$Response['message'] = "reimbursement created Successfully.";
			$Response['status'] = 1;
		}
		else
		{
			$Response['message'] = "reimbursement creation failed.";
			$Response['status'] = 0;	
		}

		header('Content-Type: application/json');
		echo json_encode($Response);
	}
	
	
	public function getReimbursement($reimbursement_id) {		
	
		include_once('../DBConnect.php');
		$res=mysqli_query($con,"SELECT * FROM reimbursement WHERE reimbursement_id = '$reimbursement_id' LIMIT 1");
		$reimbursementData = array();
		while( $reimbursementRecord = mysqli_fetch_assoc($res) ) {
			$reimbursementData[] = $reimbursementRecord;
		}
		header('Content-Type: application/json');
		echo json_encode($reimbursementData);	
	}
	
	public function getReimbursementDatewise($from_dt,$to_dt) {		
		
		include_once('../DBConnect.php');
		$res=mysqli_query($con,"SELECT * FROM reimbursement WHERE reimbursement_dt >= '$from_dt' AND reimbursement_dt <= '$to_dt'");
		$reimbursementData = array();
		while( $reimbursementRecord = mysqli_fetch_assoc($res) ) {
			$reimbursementData[] = $reimbursementRecord;
		}
		header('Content-Type: application/json');
		echo json_encode($reimbursementData);	
	}


}

?>