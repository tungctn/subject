<?php

global $conn;
// global $list_user;

if (isset($_POST['btn_change'])) {

    $error = array();

    if (empty($_POST['password'])) {
        $error['password'] = "Không được để trống mật khẩu cũ";
    } else {
        $partten2 = " /^[A-Za-z0-9_\.!@#%&*]{8,100}$/";
        if (!preg_match($partten2, $_POST['password'], $matchs)) {
            $error['password'] = "Mật khẩu không đúng định dạng";
        }
        elseif (md5($_POST['password']) != $_SESSION['password']) {
            $error['password'] = "Mật khẩu cũ không đúng";
        } else {
            $password = md5($_POST['password']);
        }
    }

    if (empty($_POST['new_password'])) {
        $error['new_password'] = "Không được để trống";
    } else {
        $partten = " /^[A-Za-z0-9_\.!@#%&*]{8,100}$/";
        if (!preg_match($partten, $_POST['new_password'], $matchs)) {
            $error['new_password'] = "Mật khẩu không đúng định dạng";
        } else {
            $new_password = md5($_POST['new_password']);
        }
    }

    $user_login = $_SESSION['user_login'];
    $sql = "UPDATE `student` SET `password` = '$new_password' where `password` = '$password'";
    $result = mysqli_query($conn, $sql);
    
}

?>
<?php get_header_body(); ?>
<div class="container" style="background-color: white;
    margin-top: 70px;
    border-radius: 16px;">
    <h1 class="text-center">Đổi mật khẩu</h1>
    <div class="row">
        <div class="col-md-12 border p-5">
            <form class="" action="" method="POST" enctype="multipart/form-data">
                <label class="mt-2" for="password">Mật khẩu cũ</label>
                <input class="d-block form-control " type="password" name="password" id="password">
                <?php
                if (!empty($error['password'])) {
                ?>
                    <p class="error"><?php echo $error['password'] ?></p>
                <?php
                }
                ?>
                <label class="mt-2" for="new_password">Mật khẩu mới</label>
                <input class="d-block form-control " type="password" name="new_password" id="new_password">
                <?php
                if (!empty($error['new_password'])) {
                ?>
                    <p class="error"><?php echo $error['new_password'] ?></p>
                <?php
                }
                ?>
                <input class="btn btn-primary mt-5" type="submit" name="btn_change" value="Đổi mật khẩu">

                <a href="?page=home" class="mt-5 btn btn-danger">Quay lại trang chủ</a>
                <?php
                if (empty($error) && isset($_POST['btn_change'])) {
                    echo "<p class='text-primary mt-3'>Đổi mật khẩu thành công</p>";
                }
                ?>

            </form>
        </div>
    </div>

</div>