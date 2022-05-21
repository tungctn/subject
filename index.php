<?php
require 'db/connect.php';
require 'db/user.php';
require 'db/info.php';
require 'db/course.php';
require 'db/student.php';
require 'db/admin.php';
require 'lib/data.php';
require 'lib/url.php';
require 'lib/users.php';
require 'lib/template.php';
require 'lib/info.php';
require 'lib/admin.php';

session_start();
ob_start();


$page = !empty($_GET['page']) ? $_GET['page'] : 'home';

$path = "page/{$page}.php";


if (!is_login() && $page != 'login') {
    redict_to("?page=login");
}

if (!is_login_admin() && strpos($page,'admin')) {
    redict_to("?page=login");
}


if (file_exists($path)) {
    require $path;
} else {

    require 'inc/404.php';
}
?>

