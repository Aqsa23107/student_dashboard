<?php

$host = "localhost";
$user = "root";
$pswrd = "";
$db = "student_db";


$conn = mysqli_connect($host,$user,$pswrd,$db);
if(!$conn){
    die("Database connection failed:" .mysqli_connect_error());
}

?>