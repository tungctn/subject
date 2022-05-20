<?php

global $conn;

$sql = "SELECT * FROM `admin` ";
$result = mysqli_query($conn,$sql);
$list_admin = array();
for($i=0; $i < mysqli_num_rows($result); $i++) {
    $list_admin[] = mysqli_fetch_assoc($result);
}