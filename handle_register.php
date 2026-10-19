<?php
require_once __DIR__ ."/config.php";
require_once __DIR__ ."/db.php";


$errors =[];
if($_SERVER['REQUEST_METHOD'] == "POST"){

$name = trim($_POST['name']) ?? '';
$email = trim($_POST['email']) ?? '';
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if(empty($email) || empty($password)){
    $errors[]= "Email and password are required";
}




}


?>