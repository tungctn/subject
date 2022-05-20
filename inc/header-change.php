<?php

global $conn;
global $list_user;

if (isset($_POST['btn_change'])) {
    $error = array();
    if (empty($_POST['username'])) {
        $error['username'] = "Khong duoc de trong ten dang nhap";
    } else {
        $partten2 = " /^[A-Za-z0-9_\.]{6,32}$/";
        if (!preg_match($partten2, $_POST['username'], $matchs)) {
            $error['username'] = "Ten dang nhap khong dung dinh dang";
        } else {
            $username = $_POST['username'];
        }
    }
    if (empty($_POST['password'])) {
        $error['password'] = "Khong duoc de trong mat khau cu";
    } else {
        if ($_POST['password'] != password($_SESSION['user_login'])) {
            $error['password'] = "Mat khau cu khong dung";
        } else {
            //  = md5($_POST['password']);
            $password = md5($_POST['password']);
        }
    }

    if (empty($_POST['new_password'])) {
        $error['new_password'] = "Khong duoc de trong";
    } else {
        $partten2 = " /^[A-Za-z0-9_\.!@#%&*]{8,32}$/";
        if (!preg_match($partten2, $_POST['new_password'], $matchs)) {
            $error['new_password'] = "Mat khau khong dung dinh dang";
        } else {
            $new_password = md5($_POST['new_password']);
        }
    }
    $user_login = $_SESSION['user_login'];
    $sql = "UPDATE `users` SET `password` = '$new_password',`username` = '$username' where `username` = '$user_login'";
    $result = mysqli_query($conn, $sql);
    // if ($)
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Css -->
    <link href="public/css/home.css" rel="stylesheet">
    <!-- Icons -->
    <!-- <link rel="stylesheet" href="./assets/font/themify-icons/themify-icons.css"> -->

    <meta name="theme-color" content="#7952b3">
    <title>Restaurant</title>

</head>

<body class="d-flex flex-column min-vh-100" style="min-height: 600px;">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        #backtop {
            background-color: orange;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            /* text-align: center; */
            align-items: center;
            justify-content: center;
            position: fixed;
            right: 20px;
            bottom: 40px;
        }
    </style>
    <!-- Navigation -->
    <nav class="py-2 bg-light border-bottom navbar-fixed-top">
        <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <li class="nav-item">
                    <a href="#" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
                        <img src="public/image/res.png" alt="mdo" width="32" height="32">
                        <span class="fs-4">Restaurant</span></a>
                </li>
                <li class="nav-item"><a href="?page=home" class="nav-link link-dark px-2 active" aria-current="page">Trang
                        chủ</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Blog</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-dark px-2">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-dark px-2">About us</a></li>
                <li class="nav-item"><a href="?page=add" class="nav-link link-dark px-2">Add</a></li>
            </ul>
            <!-- Search -->
            <form class="d-flex">
                <input type="search" class="form-control" style="margin-right: 30px;" placeholder="Tìm kiếm" aria-label="Search">
            </form>
            <!-- End search -->
            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <span><?php echo $_SESSION['user_login']; ?></span>
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">

                    <li><a class="dropdown-item" href="#">Doi mat khau</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="?page=logout">Đăng xuất</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End navigation -->
    <div class="container" style="background-color: white;
    margin-top: 70px;
    border-radius: 16px;">
        <h1 class="text-center">Doi mat khau</h1>
        <div class="row">
            <div class="col-md-12 border p-5">
                <form class="" action="" method="POST" enctype="multipart/form-data">
                    <label class="mt-2" for="username">Username mới</label>
                    <input class="d-block form-control " type="text" name="username" id="username">
                    <label class="mt-2" for="password">Mat khau cu</label>
                    <input class="d-block form-control " type="password" name="password" id="password">
                    <label class="mt-2" for="new_password">Mat khau moi</label>
                    <input class="d-block form-control " type="password" name="new_password" id="new_password">
                    <input class="btn btn-primary mt-5" type="submit" name="btn_change" value="Doi mat khau">

                    <a href="?page=home" class="mt-5 btn btn-danger">Quay lai trang chu </a>
                    <?php 
                    // if (empty($error) && isset($_POST['btn_change'])) {
                        echo "<p class='text-primary mt-3'>Doi mat khau thanh cong</p>";
                    // }
                    ?>

                </form>
            </div>
        </div>

    </div>