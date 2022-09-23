<?php
    require_once 'dbh.inc.php';

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

    $sql = "INSERT INTO tb_blood_donations (id, blood_bank_id, blood_group, date_of_donation) VALUES (null, '$bn_id', '$bg', '$new_dod')";

    mysqli_query($con, $sql) or die("Unable to record. Error: ".mysqli_error($con));

    $ln = mysqli_real_escape_string($con, $_POST['ln']);
    $fn = mysqli_real_escape_string($con, $_POST['fn']);
    $mn = mysqli_real_escape_string($con, $_POST['mn']);
    $sex = mysqli_real_escape_string($con, $_POST['sex']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);

    $sql = "SELECT id FROM tb_blood_donations ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($con, $sql) or die("Unable to record. Error: ".mysqli_error($con));

    $new_dob = date("Y-m-d", strtotime($dob));
    $don_id = null;

    while($row =  mysqli_fetch_array($result)) {
        $don_id = (int) $row['id'];
        break;
    }

    $sql = "INSERT INTO tb_blood_donors (id, donation_id, lastname, firstname, middlename, sex, date_of_birth) VALUES (null, '$don_id', '$ln', '$fn', '$mn', '$sex', '$dob')";

    mysqli_query($con, $sql) or die("Unable to record. Error: ".mysqli_error($con));

    $brgy = mysqli_real_escape_string($con, $_POST['brgy']);
    $cty = mysqli_real_escape_string($con, $_POST['cty']);
    $prov = mysqli_real_escape_string($con, $_POST['prov']);
    $mob = mysqli_real_escape_string($con, $_POST['mob']);
    $eml = mysqli_real_escape_string($con, $_POST['eml']);

    $sql = "SELECT id FROM tb_blood_donors ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($con, $sql) or die("Unable to record. Error: ".mysqli_error($con));

    $donor_id = null;

    while($row =  mysqli_fetch_array($result)) {
        $donor_id = (int) $row['id'];
        break;
    }

    $sql = "INSERT INTO tb_blood_donors_contact (id, donor_id, barangay, city, province, mobile_no, email) VALUES (null, '$donor_id', '$brgy', '$cty', '$prov', '$mob', '$eml')";

    mysqli_query($con, $sql) or die("Unable to record. Error: ".mysqli_error($con));

    echo "A record was successfully added to $bn.";

?>


