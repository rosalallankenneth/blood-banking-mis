<?php
    require_once 'dbh.inc.php';

    $sql = "SELECT * FROM tb_blood_banks ORDER BY id LIMIT 3";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));

    if(mysqli_num_rows($result) > 0) {
        echo "<thead><tr><th scope='col'>ID</th><th scope='col'>Bank Name</th></tr></thead>";

        echo "<tbody>";
		while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><th scope='row'>".$row['id']."</th><td>".$row['name']."</td></tr>";
        }
        echo "</tbody>";

    } else {
        echo "0 results";
    }

?>