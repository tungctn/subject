<?php
require 'db/connect.php';
require 'db/user.php';
require 'db/info.php';
require 'db/course.php';
require 'db/student.php';
require 'db/admin.php';
// require 'db/input.php';
require 'lib/data.php';
require 'lib/url.php';
require 'lib/users.php';
require 'lib/template.php';
require 'lib/info.php';
require 'lib/admin.php';

// require 'lib/pagging.php';
// require 'lib/res.php';
session_start();
ob_start();

global $list_admin;
// show_array($list_admin);
$page = !empty($_GET['page']) ? $_GET['page'] : 'home';

// echo $page;
// show_array($list_course);
$path = "page/{$page}.php";
if ($page = 'login' && $page = 'signup') {
    $_SESSION['is_login'] = false;
}


$checklogin = false;
// if(isset($_SESSION['is_login'])) {
    if (!$_SESSION['is_login'] && $page != 'login' && $page != 'signup') {
        redict_to("?page=login");
        $checklogin = true;
    }
    
    if (!$_SESSION['is_login'] && $page != 'login' && $checklogin == false && $page != 'signup') {
        redict_to("?page=signup");
        // header("Location: ?page=signup");
    }
    
    if (file_exists($path)) {
        require $path;
    } else {
        
        require 'inc/404.php';
    }
// }



?>


<!-- <div id="content">
    <h1>Trang chu</h1>
</div> -->