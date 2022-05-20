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
