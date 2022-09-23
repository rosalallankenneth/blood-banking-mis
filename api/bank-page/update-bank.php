<?php
    require_once '../dbh.inc.php';

    $id = mysqli_real_escape_string($con, $_POST['id']);
    $bn = mysqli_real_escape_string($con, $_POST['bn']);
    $brgy = mysqli_real_escape_string($con, $_POST['brgy']);
    $cty = mysqli_real_escape_string($con, $_POST['cty']);
    $prov = mysqli_real_escape_string($con, $_POST['prov']);
    $no = mysqli_real_escape_string($con, $_POST['no']);

    $sql = "UPDATE tb_blood_banks SET name='$bn', barangay='$brgy', city='$cty', province='$prov', phone_no='$no' WHERE id='$id'";

    mysqli_query($con, $sql) or die("Unable to record. Error: ".mysqli_error($con));

    echo "A blood bank was successfully updated.";

?>


