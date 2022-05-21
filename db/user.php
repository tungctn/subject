<?php

global $conn;


// $temp = 0;
// $list_user = array();


$sql = "SELECT * FROM `users` join `student` on `users`.`code` = `student`.`code`";
$result = mysqli_query($conn, $sql);
$list_user = array();
$num = mysqli_num_rows($result);
for ($i=0; $i < $num; $i++) { 
    $list_user[] = mysqli_fetch_assoc($result);
}

