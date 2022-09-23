<?php
    require_once '../dbh.inc.php';

    $sql = "SELECT * FROM tb_blood_banks;";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    $count = mysqli_num_rows($result);

    function displayHeader() {
        echo "<thead><tr><th scope='col'>ID</th><th scope='col'>Blood Bank Name</th><th scope='col'>Barangay</th><th scope='col'>City</th><th scope='col'>Province</th><th scope='col'>Phone Number</th><th scope='col'>Actions</th></tr></thead>";
        echo "<tbody>";
    }

    if($count > 0) {
        displayHeader();

		while($row = mysqli_fetch_assoc($result)) {

            echo "<tr><th scope='row'>".$row['id']."</th><td>".$row['name']."</td><td>".$row['barangay']."</td><td>".$row['city']."</td><td>".$row['province']."</td><td>".$row['phone_no']."</td>";
            echo "<td><button id='edit-".$row['id']."' class='btn btn-edit btn-info btn-sm mr-2' type='button' data-toggle='modal' data-target='#editModal'>Edit</button>";
            echo "<button id='delete-".$row['id']."' class='btn btn-delete btn-danger btn-sm' type='button'>Delete</button></td></tr>";
        
        }
        
        echo "<tr style='cursor: auto'><td colspan='9' class='text-center text-warning'>".$count;
        if($count == 1) {
            echo " result</td></tr>";
        } else {
            echo " results</td></tr>";
        }
        echo "</tbody>";

    } else {
        displayHeader();
        echo "<tr><td colspan='9' class='text-center'>0 results</td></tr></tbody>";
    }

?>