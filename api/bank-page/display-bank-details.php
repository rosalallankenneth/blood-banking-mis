<?php
    require_once '../dbh.inc.php';

    $id = mysqli_real_escape_string($con, $_POST['id']);

	$sql = "SELECT * FROM tb_blood_banks WHERE id=$id";
	
    $result = mysqli_query($con, $sql) or die("Database error: ".mysqli_error($con));
    $count = mysqli_num_rows($result);

	if ($count > 0) {
	
		$response["data"] = array();
        	
		while($row = mysqli_fetch_assoc($result)) {

			$re["id"] = $row["id"];            
			$re["bn"] = $row["name"];
			$re["brgy"] = $row["barangay"];
			$re["cty"] = $row["city"];
			$re["prov"] = $row["province"];
			$re["no"] = $row["phone_no"];
			
			array_push($response["data"], $re);
		}
		
        echo json_encode($response);
        
    } else {
        echo "Unable to retrieve info. Please refresh.";
    }
