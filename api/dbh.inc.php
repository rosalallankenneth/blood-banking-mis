<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'blood_bank';

    $con = mysqli_connect($server, $username, $password, $dbname)
        or die ("Database error: ".mysqli_error($con));

?>