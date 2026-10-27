<?php
require_once __DIR__ ."/config.php";
require_once __DIR__ ."/db.php";
 require_once __DIR__ . "/authcheck.php"; 

$errors =[];

$students_id = $_GET['id'];




if(empty($students_id)){
    $errors[]="student id is required";

}

if(!empty($errors)){
    $_SESSION['errors'] =$errors;
   header("Location:students.php");
   exit;
}


$stmt= mysqli_prepare($conn,"SELECT * FROM students_info WHERE student_id = ?");
mysqli_stmt_bind_param($stmt,"i",$students_id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);



if(mysqli_num_rows($result)==0){
    $errors[]="Student not found";
    $_SESSION['errors'] = $errors;
    header("Location: students.php");
    exit;
}

$stmt2 = mysqli_prepare($conn, "DELETE FROM students_info WHERE student_id=?");
mysqli_stmt_bind_param($stmt2,"i",$students_id);
mysqli_stmt_execute($stmt2);



$stmt3 = mysqli_prepare($conn, "DELETE FROM students_academics WHERE students_id=?");
mysqli_stmt_bind_param($stmt3,"i",$students_id);
mysqli_stmt_execute($stmt3);


$_SESSION['success'] = "Student deleted successfully";
header("Location:students.php");
exit();

?>