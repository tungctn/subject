<?php

global $conn,$list_student;
foreach ($list_student as $student) {
    $code = $student['code'];
    $username = $student['code'];
    $password = md5($student['code']);
    $sql = "INSERT INTO `users`(`code`, `username`, `password`) VALUES ('$code','$username','$password')";
    $result = mysqli_query($conn,$sql);
    
}