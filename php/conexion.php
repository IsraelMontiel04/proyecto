<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass="";
    $dbname="extraescolares";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if(!$conn){
        die("NO HAY CONEXIÓN:".mysqli_connect_error());
    }

?>