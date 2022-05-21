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

function is_login_admin()
{
    if (isset($_SESSION['is_login_admin'])) {
        return true;
    }
    return false;
}

