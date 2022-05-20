<?php


if (isset($_POST['btn_signup'])) {
    $error = array();
    
    if (empty($_POST['username'])) {
        $error['username'] = "Khong duoc de trong ten dang nhap";
    } else {
        $partten2 = " /^[A-Za-z0-9_\.]{6,32}$/";
        if (!preg_match($partten2, $_POST['username'], $matchs)) {
            $error['username'] = "Ten dang nhap khong dung dinh dang";
        }
    }
    if (empty($_POST['password'])) {
        $error['password'] = "Khong duoc de trong mat khau";
    } else {
        $partten2 = " /^[A-Za-z0-9_\.!@#%&*]{8,32}$/";
        if (!preg_match($partten2, $_POST['password'], $matchs)) {
            $error['password'] = "Mat khau khong dung dinh dang";
        } 
    }
    
    if (empty($error)) {
        $_SESSION['is_login'] = true;
        $_SESSION['user_login'] = $_POST['username'];
        if (check_admin($_POST['username'], $_POST['password'])) {
            $_SESSION['is_login'] = true;
            $_SESSION['user_login'] = $_POST['username'];
            redict_to("?page=homeadmin");
        } else {

            $error['account'] = "Tai khoan khong ton tai tren he thong";
        }
    }
} else {
    $_SESSION['is_login'] = false;
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/dangky.css">
    <title>Form -Login</title>
</head>

<body>
    <style>
        #btn_signup {
            height: 35px;
            width: 100%;
            margin-bottom: 30px;
            background: linear-gradient(to bottom right, var(--bg1), var(--bg2), var(--bg1));
            border: none;
            color: #fff;
            border-radius: 5px;
            background-size: 200%;
            transition: 0.5s;
        }

        #btn_signup:hover {
            background-position: right;

        }

        .error {
            color: red;
        }

        .success {
            color: blue;
        }
    </style>
    <div class="container">
        <form class="form-signup" method="POST">
            <h1>Đăng nhập ADMIN</h1>
            
            <div class="form-text">
                <input type="text" name="username" id="username" placeholder="username" value="">
                <?php
                if (!empty($error['username'])) {
                ?>
                    <p class="error"><?php echo $error['username'] ?></p>
                <?php
                }
                ?>
            </div>
            <div class="form-text">
                <input type="password" name="password" id="password" placeholder="password">
                <?php
                if (!empty($error['password'])) {
                ?>
                    <p class="error"><?php echo $error['password'] ?></p>
                <?php
                }
                ?>
            </div>
            <!-- <button type="button" name="button">Đăng ký</button> -->
            <input type="submit" name="btn_signup" id="btn_signup" value="Đăng nhập">
            <?php
            if (!empty($error)) {
                echo "<p class='error'>Ban khong phai admin</p>";
            } else {
                echo "";
            }
            ?>
            <span>Bạn không phải là admin? Đăng nhập <a href="?page=login">Tại đây</a></span>
        </form>
    </div>
</body>

</html>