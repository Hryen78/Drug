<?php 
    $connection = mysqli_connect("localhost:3307", "root", "", "drug_store");
    if (!$connection) {
        echo"Connection Failed!".mysqli_connect_error();
    }
?>