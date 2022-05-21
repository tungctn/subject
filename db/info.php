<?php


global $conn;
$sql = "SELECT *  FROM `info`";
$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);
$list_res = array();

for ($i = 0; $i < $num; $i++) {
    # code...
    $list_info[] = mysqli_fetch_assoc($result);
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
    // $res = number_format($point[0]['avgs'],1,'.','');
    return convert_score($point[0]['avgs']);
}

function convert_score($point) {
    $result = number_format($point,1,'.','');
    return $result;
}
