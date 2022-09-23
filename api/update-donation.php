<?php
    require_once 'dbh.inc.php';

    $donation_id = mysqli_real_escape_string($con, $_POST['id']);
    $bn = mysqli_real_escape_string($con, $_POST['bn']);
    $bg = mysqli_real_escape_string($con, $_POST['bg']);
    $dod = mysqli_real_escape_string($con, $_POST['dod']);

    $sql = "SELECT id FROM tb_blood_banks WHERE name='$bn'";
    $result = mysqli_query($con, $sql) or die("Unable to record. Error: ".mysqli_error($con));

    $new_dod = date("Y-m-d", strtotime($dod));
    $bn_id = 1;

    while($row =  mysqli_fetch_array($result)) {
        $bn_id = (int) $row['id'];
        break;
    }

    $sql = "UPDATE tb_blood_donations SET blood_bank_id='$bn_id', blood_group='$bg', date_of_donation='$new_dod' WHERE id='$donation_id'";

    mysqli_query($con, $sql) or die("Unable to record. Error: ".mysqli_error($con));

    $ln = mysqli_real_escape_string($con, $_POST['ln']);
    $fn = mysqli_real_escape_string($con, $_POST['fn']);
    $mn = mysqli_real_escape_string($con, $_POST['mn']);
    $sex = mysqli_real_escape_string($con, $_POST['sex']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);

    $new_dob = date("Y-m-d", strtotime($dob));

    $sql = "UPDATE tb_blood_donors SET lastname='$ln', firstname='$fn', middlename='$mn', sex='$sex', date_of_birth='$dob' WHERE donation_id='$donation_id'";

    mysqli_query($con, $sql) or die("Unable to record. Error: ".mysqli_error($con));

    $brgy = mysqli_real_escape_string($con, $_POST['brgy']);
    $cty = mysqli_real_escape_string($con, $_POST['cty']);
    $prov = mysqli_real_escape_string($con, $_POST['prov']);
    $mob = mysqli_real_escape_string($con, $_POST['mob']);
    $eml = mysqli_real_escape_string($con, $_POST['eml']);

    $sql = "SELECT id FROM tb_blood_donors WHERE donation_id='$donation_id'";
    $result = mysqli_query($con, $sql) or die("Unable to record. Error: ".mysqli_error($con));

    $donor_id = null;

    while($row =  mysqli_fetch_array($result)) {
        $donor_id = (int) $row['id'];
        break;
    }

    $sql = "UPDATE tb_blood_donors_contact SET barangay='$brgy', city='$cty', province='$prov', mobile_no='$mob', email='$eml' WHERE donor_id='$donor_id'";

    mysqli_query($con, $sql) or die("Unable to record. Error: ".mysqli_error($con));

    echo "A record from $bn was successfully updated.";

?>


