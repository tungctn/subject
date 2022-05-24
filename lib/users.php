<?php

function is_login()
{
    if (isset($_SESSION['is_login'])) {
        return true;
    }
    return false;
}

function check_login($username, $password)
{
    global $list_student;
    foreach ($list_student as $value) {
        if ($value['code'] == $username && $value['password'] == md5($password)) {
            return true;
        }
    }
    return false;
}



function password($username)
{
    global $list_student;
    foreach ($list_student as $user) {
        if ($user['code'] == $username) {
            return $user['password'];
        }
    }
}

function username($password)
{
    global $list_student;
    foreach ($list_student as $user) {
        if ($user['password'] == md5($password)) {
            return $user['username'];
        }
    }
}

function fullname($code)
{
    global $list_student;
    foreach ($list_student as $student) {
        if ($student['code'] == $code) {
            return $student['fullname'];
        }
    }
}
