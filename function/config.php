<?php

$server   = "localhost";
$username = "root";
$password = "";
$db       = "db_ppdb";

$conn = mysqli_connect($server,$username,$password,$db);

if($conn){
    // echo "Code : (200)";
}else{
    die("Mysqli not connected!");
}