<?php
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "abcd";

    $con = mysqli_connect($servername, $username, $pass, $dbname);
    if(!$con){
        die("Connection Failed:" .mysqli_connect_error());
    }
    echo "Database Connection Successfull";
?>