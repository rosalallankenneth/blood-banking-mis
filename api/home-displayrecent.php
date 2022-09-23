<?php
    require_once 'dbh.inc.php';

    $sql = "SELECT tb_blood_donations.id, lastname, firstname, blood_group FROM tb_blood_donations INNER JOIN tb_blood_donors ON tb_blood_donations.id = tb_blood_donors.donation_id ORDER BY id DESC LIMIT 3";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));

    if(mysqli_num_rows($result) > 0) {
        echo "<thead><tr><th scope='col'>ID</th><th scope='col'>Last Name</th><th scope='col'>First Name</th><th scope='col'>Blood Group</th></tr></thead>";

        echo "<tbody>";
		while($row = mysqli_fetch_assoc($result)) {
            echo "<tr data-toggle='modal' data-target='.bd-example-modal-lg'><th scope='row'>".$row['id']."</th><td>".$row['lastname']."</td><td>".$row['firstname']."</td><td>".$row['blood_group']."</td></tr>";
        }
        echo "</tbody>";

    } else {
        echo "0 results";
    }

?>