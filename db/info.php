<?php

function list_info()
{
    global $conn;
    $sql = "SELECT *  FROM `info`";
    $result = mysqli_query($conn, $sql);
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $list_info[] = mysqli_fetch_assoc($result);
    }
    return $list_info;
}


function num($code)
{
    global $conn;
    $sql = "SELECT *  FROM `info` where `code` = '$code'";
    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);
    return $num;
}

function score($code)
{
    global $conn;
    $sql = "SELECT avg(`overall`) as avgs  FROM `info` where `code` = '$code'";
    $result = mysqli_query($conn, $sql);
    $point = array();
    $point[0] = mysqli_fetch_assoc($result);
    return convert_score($point[0]['avgs']);
}

function convert_score($point)
{
    $result = number_format($point, 1, '.', '');
    return $result;
}
