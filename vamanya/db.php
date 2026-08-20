<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "vamanya";

$conn = mysqli_connect($host, $user, $password, $database);

if(!$conn){
    die("Connection Failed");
}

?>