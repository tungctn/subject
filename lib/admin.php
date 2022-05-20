<?php

function check_admin($username, $password)
{
    global $list_admin;
    foreach ($list_admin as $value) {
        if($value['username'] == $username && $value['password'] == md5($password)) {
            return true;
        }
    }
    return false;
}

