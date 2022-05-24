<?php

$config  =array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'tung'
);

$conn = mysqli_connect($config['hostname'],$config['username'],$config['password'],$config['database']);