<?php
    require_once 'dbh.inc.php';

    $item = trim(mysqli_real_escape_string($con, $_POST['item']));

    $sql = "SELECT tb_blood_donations.id, name, blood_group, lastname, firstname, middlename, sex, date_of_birth, date_of_donation FROM tb_blood_donations INNER JOIN tb_blood_donors INNER JOIN tb_blood_banks ON tb_blood_donations.id = tb_blood_donors.donation_id AND tb_blood_banks.id = tb_blood_donations.blood_bank_id WHERE tb_blood_donations.id LIKE '%$item%' OR name LIKE '%$item%' OR blood_group LIKE '%$item%' OR lastname LIKE '%$item%' OR firstname LIKE '%$item%' OR middlename LIKE '%$item%' OR sex LIKE '%$item%' OR date_of_birth LIKE '%$item%' OR date_of_donation LIKE '%$item%' ORDER BY id DESC;";
    
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    $count = mysqli_num_rows($result);

    function displayHeader() {
        echo "<thead><tr><th scope='col'>ID</th><th scope='col'>Blood Bank Name</th><th scope='col'>Blood Group</th><th scope='col'>Last Name</th><th scope='col'>First Name</th><th scope='col'>Middle Name</th><th scope='col'>Sex</th><th scope='col'>Date of Birth</th><th scope='col'>Date of Donation</th></tr></thead>";
        echo "<tbody>";
    }

    if($count > 0) {
        displayHeader();

		while($row = mysqli_fetch_assoc($result)) {

            $dob = $row['date_of_birth'];
            $strDob = date("F j, Y", strtotime($dob));
            $dod = $row['date_of_donation'];
            $strDod = date("F j, Y", strtotime($dod));

            echo "<tr data-toggle='modal' data-target='#modal-more-details' data-id='".$row['id']."' id='tr-".$row['id']."'><th scope='row'>".$row['id']."</th><td>".$row['name']."</td><td>".$row['blood_group']."</td><td>".$row['lastname']."</td><td>".$row['firstname']."</td><td>";
            
            if($row['middlename'] == "") {
                echo "N/A";
            } else {
                echo $row['middlename'];
            }
            
            echo "</td><td>".$row['sex']."</td><td>".$strDob."</td><td>".$strDod."</td></tr>";
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