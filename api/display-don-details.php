<?php
    require_once 'dbh.inc.php';

    $id = mysqli_real_escape_string($con, $_POST['id']);

	$sql = "SELECT tb_blood_donations.id, name, blood_group, lastname, firstname, middlename, sex, date_of_birth, date_of_donation, tb_blood_donors_contact.barangay, tb_blood_donors_contact.city, tb_blood_donors_contact.province, mobile_no, email FROM tb_blood_donations INNER JOIN tb_blood_donors INNER JOIN tb_blood_banks INNER JOIN tb_blood_donors_contact ON tb_blood_donations.id = tb_blood_donors.donation_id AND tb_blood_banks.id = tb_blood_donations.blood_bank_id AND tb_blood_donors.id = tb_blood_donors_contact.donor_id WHERE tb_blood_donations.id=$id";
	
    $result = mysqli_query($con, $sql) or die("Database error: ".mysqli_error($con));
    $count = mysqli_num_rows($result);

	if ($count > 0) {
	
		$response["data"] = array();
        	
		while($row = mysqli_fetch_assoc($result)) {
            
			$re["id"] = $row["id"];
			$re["bn"] = $row["name"];
			$re["bg"] = $row["blood_group"];
			$re["ln"] = $row["lastname"];
			$re["fn"] = $row["firstname"];
			$re["mn"] = $row["middlename"];
			$re["sex"] = $row["sex"];
			$re["dob"] = $row["date_of_birth"];
			$re["dod"] = $row["date_of_donation"];
			$re["brgy"] = $row["barangay"];
			$re["cty"] = $row["city"];
			$re["prov"] = $row["province"];
			$re["mob"] = $row["mobile_no"];
			$re["eml"] = $row["email"];
			
			array_push($response["data"], $re);
		}
		
        echo json_encode($response);
        
    } else {
        echo "Unable to retrieve info. Please refresh.";
    }
