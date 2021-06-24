<!DOCTYPE html>
<html lang="en">
<head>
  <title>Reimbursement</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" style="margin-top:5%">
		<div class="panel panel-success">
			<div class="panel-heading"><h4>Reimbursement List</h4></div>
				<div class="panel-body">
          
				  <table class="table">
					<thead>
					  <tr>
						<th>#</th>
						<th>Employee Name</th>
						<th>Purpose</th>
						<th>Reimbursement Date</th>
						<th>Amount</th>
					  </tr>
					</thead>
					<tbody>
					<?php	
						include_once('DBConnect.php');
						$res=mysqli_query($con,"SELECT reimbursement.*, employee.name FROM reimbursement JOIN employee ON reimbursement.employee_id = employee.employee_id;");
						if(mysqli_num_rows($res)>0)
						{
							$n = 1;
							while($row=mysqli_fetch_array($res))
							{										   
					?>	
					  <tr>
						<td><?php echo $n++;?></td>
						<td><?php echo $row['name'];?></td>
						<td><?php echo $row['purpose'];?></td>
						<td><?php echo $row['reimbursement_dt'];?></td>
						<td><?php echo $row['amount'];?></td>
					  </tr>
					<?php
								$n++;
							}
						}
					?>	  
					</tbody>
				  </table>

			</div>
		</div>
	</div>
</div>

</body>
</html>
