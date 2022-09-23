<?php
    require_once 'dbh.inc.php';

    $sql = "SELECT name FROM tb_blood_banks";
    $result = mysqli_query($con, $sql) or die("Database error: ".mysqli_error($con));

    if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			echo "<option value='".$row['name']."'>".$row['name']."</option>";
        }
    } else {
        echo "0 results";
    }