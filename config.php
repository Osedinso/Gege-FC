<?php

    $server = "sql211.epizy.com";
    $username = "epiz_34123642";
    $password = "6NO1dLAsd2Z";
    $dbname = "epiz_34123642_chasmadb";

    $conn = mysqli_connect($server, $username, $password, $dbname);

    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }

?>
