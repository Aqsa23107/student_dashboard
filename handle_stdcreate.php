<?php
require_once __DIR__ ."/config.php";
require_once __DIR__ ."/db.php";


$errors =[];
if($_SERVER['REQUEST_METHOD'] == "POST"){

// echo "<pre>";
// print_r($_POST);
//  echo "</pre>";


$first_name = trim($_POST["first_name"]);
$last_name = trim($_POST["last_name"]);
$email = trim($_POST["email"]);
$phone = trim($_POST["phone"]);
$roll_number = trim($_POST["roll_number"]);
$class = trim($_POST["class"]);
$gender = trim($_POST["gender"]);
$dob = trim($_POST["dob"]);
$status = trim($_POST["status"]);



if(
empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($roll_number) ||
empty($class) || empty($gender) ||empty($dob) || empty($status)
){
    $errors =["All fields are required"];
}


if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
    $errors =["Email adress is incorrect"];
}

if (!empty($errors)){
    $_SESSION['errors'] = $errors;
    header("Location:student-create.php");
    exit();
}





}