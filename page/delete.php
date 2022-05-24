<?php
$id = (int) $_GET['id'];
$code = (string) $_GET['code'];
global $conn;


$sql = "DELETE FROM `info` WHERE `id` = '$id' and `code` = '$code' ";
if (mysqli_query($conn, $sql)) {
    echo "xoa du lieu thanh cong";
    redict_to("?page=home");
} else {
    echo "Loi: " . $sql . mysqli_error($conn);
}

$num = num($code);
$sql1 = "UPDATE `course` SET `post` = {$num} where `course`.`code` = '$code'";
$result1 = mysqli_query($conn, $sql1);
