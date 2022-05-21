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
    // $new_list = array();
    global $list_user;
    foreach ($list_user as $value) {
        if ($value['username'] == $username && $value['password'] == md5($password)) {
            return true;
        }
    }
    return false;
}

function exist_username($username)
{
    global $list_user;
    foreach ($list_user as $value) {
        if ($value['username'] == $username) {
            return false;
        }
    }
    return true;
}

// function exist_numphone($numphone) {
//     global $list_user;
//     foreach ($list_user as $value) {
//         if ($value['numphone'] == $numphone) {
//             return false;
//         }
//     }
//     return true;
// }

function password($username)
{
    global $list_user;
    foreach ($list_user as $user) {
        if ($user['username'] == $username) {
            return $user['password'];
        }
    }
}

function username($password)
{
    global $list_user;
    foreach ($list_user as $user) {
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
