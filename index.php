<?php


require 'db/config.php';
require 'db/info.php';
require 'db/course.php';
require 'db/student.php';
require 'db/search.php';
require 'lib/data.php';
require 'lib/url.php';
require 'lib/users.php';
require 'lib/template.php';
require 'lib/info.php';
session_start();
ob_start();


// global $conn;

$list_info = list_info();
$list_student = list_student();
$list_course = list_course();
// show_array($list_course);

// show_array($list_course);

$page = !empty($_GET['page']) ? $_GET['page'] : 'home';
$path = "page/{$page}.php";
if (!is_login() && $page != 'login') {
    redict_to("?page=login");
}
// show_array($list_course);
if (file_exists($path)) {
    require $path;
} else {
    require 'inc/404.php';
}
