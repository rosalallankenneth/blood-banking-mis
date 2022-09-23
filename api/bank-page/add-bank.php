<?php
    require_once '../dbh.inc.php';

    $bn = mysqli_real_escape_string($con, $_POST['bn']);
    $brgy = mysqli_real_escape_string($con, $_POST['brgy']);
    $cty = mysqli_real_escape_string($con, $_POST['cty']);
    $prov = mysqli_real_escape_string($con, $_POST['prov']);
    $no = mysqli_real_escape_string($con, $_POST['no']);

    $sql = "INSERT INTO tb_blood_banks (id, name, barangay, city, province, phone_no) VALUES (null, '$bn', '$brgy', '$cty', '$prov', '$no')";

    mysqli_query($con, $sql) or die("Unable to record. Error: ".mysqli_error($con));

    echo "A blood bank was successfully added.";

?>


