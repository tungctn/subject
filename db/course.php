<?php


function list_course()
{
    global $conn;
    $sql = "SELECT *  FROM `course` order by `post` desc ";
    $result = mysqli_query($conn, $sql);
    $list_course = array();
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $list_course[] = mysqli_fetch_assoc($result);
    }
    return $list_course;
}
