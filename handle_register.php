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


if($password != $confirm_password){
    $errors[] = "Passwords do not match! Please try again.";
}


if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
    $errors[] = "Email adress is wrong";
}

if(!empty($errors)){
    $_SESSION['errors'] =$errors;
   header("Location:register.php");
   exit;
}

$stmt= mysqli_prepare($conn,"SELECT * FROM users WHERE email = ?");
mysqli_stmt_bind_param($stmt,"s",$email);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result)>0){
    $errors[]="THis email is already registered";
    $_SESSION['errors'] = $errors;
    header("Location: register.php");
    exit;
}

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

 $hashed_password;



$stmt2 = mysqli_prepare($conn, "INSERT INTO users (name,email,password) VALUES(?,?,?)");
mysqli_stmt_bind_param($stmt2,"sss",$name,$email,$hashed_password);
mysqli_stmt_execute($stmt2);

$_SESSION['success']="Account is sucessfully created";
header("Location:register.php");
exit;






}


?>