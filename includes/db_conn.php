<?php

function get_connection(){

    $host = "localhost";
    $username = "root";
    $pass = "";
    $db = "dbpizza";
    $connection = mysqli_connect($host,$username,$pass,$db);
    if(!$connection){
        echo "Conneciton Failed";
        exit();
    }

    return $connection;   

}



?>