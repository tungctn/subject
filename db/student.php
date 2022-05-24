<?php

function list_student()
{
    global $conn;
    $sql = "SELECT * FROM `student`";
    $result = mysqli_query($conn, $sql);
    $list_student = array();
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $list_student[] = mysqli_fetch_assoc($result);
    }
    return $list_student;
}
