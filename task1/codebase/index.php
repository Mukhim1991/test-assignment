<?php  

if(isset($_POST['submit'])) {
     if(isset($_FILES['uploadFile']['name']) && $_FILES['uploadFile']['name'] != "") {
        $allowedExtensions = array("xls","xlsx");
        $ext = pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION);
		
        if(in_array($ext, $allowedExtensions)) {
				// Uploaded file
               $file = "uploads/".$_FILES['uploadFile']['name'];
               $isUploaded = copy($_FILES['uploadFile']['tmp_name'], $file);
			   // check uploaded file
               if($isUploaded) {
					// Include PHPExcel files and database configuration file
                    $con=mysqli_connect("localhost","root","","task1") or die(mysqli_error()." Unable to connect to the Database.");
					
					
					require_once __DIR__ . '/vendor/autoload.php';
                    include(__DIR__ .'/vendor/phpoffice/phpexcel/Classes/PHPExcel/IOFactory.php');
                    try {
                        // load uploaded file
                        $objPHPExcel = PHPExcel_IOFactory::load($file);
                    } catch (Exception $e) {
                         die('Error loading file "' . pathinfo($file, PATHINFO_BASENAME). '": ' . $e->getMessage());
                    }
                    
                    // Specify the excel sheet index
                    $sheet = $objPHPExcel->getSheet(0);
                    $total_rows = $sheet->getHighestRow();
					$highestColumn      = $sheet->getHighestColumn();	
					$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);		
					
			
					//	loop over the rows
					for ($row = 1; $row <= $total_rows; ++ $row) {
						for ($col = 0; $col < $highestColumnIndex; ++ $col) {
							$cell = $sheet->getCellByColumnAndRow($col, $row);
							$val = $cell->getValue();
							$records[$row][$col] = $val;
						}
					}

					$row_no = 0;
					$inserted_row = 0;
					$msg = '';
					foreach($records as $row){

						$row_no++;
						
						$roll_no = isset($row[0]) ? $row[0] : '';
						$name = isset($row[1]) ? $row[1] : '';
						$phone = isset($row[2]) ? $row[2] : '';
						$email = isset($row[3]) ? $row[3] : '';
						$dob1 = isset($row[4]) ? $row[4] : '';	
						$dob = date("Y-m-d", strtotime($dob1));		
						$address = isset($row[5]) ? $row[5] : '';

						if($name <> 'Student Name')	
						{
							if(empty($name))
							{
								$msg .= 'Name field must be required at row no. : '.$row_no.'<br>';
							}
							elseif(empty($phone))
							{
								$msg .= 'Mobile number field must be required at row no. : '.$row_no.'<br>';
							}		
							else
							{		
								$inserted_row++;
								$res=mysqli_query($con,"insert into student(roll_no,name,phone,email,dob,address) values('".$roll_no."','".$name."','".$phone."','".$email."','".$dob."','".$address."')");
							}	
						}
					}

					$success_msg = $inserted_row." row inserted successfully";
				
                    unlink($file);
                } else {
					$success_msg = "File not uploaded!";
                }
        } else {
			$success_msg = "Please upload excel sheet.";
        }
    } else {
		$success_msg = "Please upload excel file.";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Task 1</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container" style="margin-top:5%">
		<div class="panel panel-success">
			<div class="panel-heading"><h4>Upload Excel File</h4></div>
				<div class="panel-body">
				
					<?php if(isset($msg)) { ?>
					<div class="alert alert-danger"><?php echo $msg;?> </div>
					<?php  	}?>
					
					<?php if(isset($success_msg)) { ?>
					<div class="alert alert-success"><?php echo $success_msg;?> </div>
					<?php  	}?>
					
					<form method="POST" action="" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-8">
								<label>Choose File</label>
								<input type="file" name="uploadFile" class="form-control" accept=".xlsx" required />
							</div>
						
							<div class="col-md-4">
								<button type="submit" name="submit" class="btn btn-success" style="margin-top:25px">Upload</button>
							</div>
						</div>
					</form>
				</div>
		</div>
	</div>
</body>
</html>