<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "authentication_system";

    $conn = mysqli_connect($server,$username,$password,$database);

    if(!$conn){
        die("Error Connection failed");
    }
?>