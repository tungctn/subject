<?php

if (isset($_POST['btn_add'])) {
    global $conn;
    $user_add = $_SESSION['user_login'];
    $user_code = $_SESSION['user_code'];
    $error = array();
    $code = (string) $_GET['code'];
    if (empty($_POST['instructor'])) {
        $error['instructor'] = "Không được để trống tên giảng viên";
    } else {
        $instructor = $_POST['instructor'];
    }
    if (empty($_POST['level'])) {
        $error['level'] = "Không được để trống";
    } else {
        $level = $_POST['level'];
    }

    if (empty($_POST['evaluate'])) {
        $error['evaluate'] = "Không được để trống";
    } else {
        $evaluate = $_POST['evaluate'];
    }

    if (empty($_POST['overall'])) {
        $error['overall'] = "Không được để trống";
    } else {
        $overall = $_POST['overall'];
    }

    if (empty($_POST['comment'])) {
        $error['comment'] = "Không được để trống miêu ta";
    } else {
        $comment = $_POST['comment'];
    }

    if (empty($error)) {
        $sql = "INSERT INTO `info` 
        (`code` , `instructor`, `level`, `evaluate`,`overall`,`comment`,`user_add`,`user_code`)"
            . "VALUES 
        ('{$code}','{$instructor}','{$level}','{$evaluate}','{$overall}','{$comment}','{$user_add}','{$user_code}')";
        $result = mysqli_query($conn, $sql);
        $num = num($code);
        $sql1 = "UPDATE `course` SET `post` = {$num} where `course`.`code` = '$code'";
        $result1 = mysqli_query($conn, $sql1);
    }
}

?>

<?php get_header_body() ?>

<div class="container" style="background-color: white;
    margin-top: 70px;
    border-radius: 16px;">
    <h1 class="text-center">Thêm bài viết</h1>
    <div class="row">
        <div class="col-md-12 border p-5">
            <form class="" action="" method="POST" enctype="multipart/form-data">

                <label class="mt-2" for="instructor">Giảng viên hướng dẫn</label>
                <input class="d-block form-control " type="text" name="instructor" id="instructor">

                <label class="mt-2" for="level">Mức độ khó của các nội dung trong học phần (/5)</label>
                <select class="form-select" id="level" aria-label="Default select example" name="level">
                    <option selected>Chọn mức điểm</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                <label class="mt-2" for="evaluate">Khối lượng bài tập được giao trong học phần (/5)</label>
                <select class="form-select" id="evaluate" aria-label="Default select example" name="evaluate">
                    <option selected>Chọn mức điểm</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                <label class="mt-2" for="overall">Đánh giá tổng thể học phần (/5)</label>
                <select class="form-select" id="overall" aria-label="Default select example" name="overall">
                    <option selected>Chọn mức điểm</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                <label class="mt-2" for="comment">Chi tiết</label>
                <textarea class="d-block w-100 form-control " name="comment" id="comment" rows="7"></textarea>
                <input class="btn btn-primary mt-5" type="submit" name="btn_add" value="Thêm bài viết">

                <a href="?page=home" class="mt-5 btn btn-danger">Quay lại trang chủ</a>

            </form>
        </div>
    </div>

</div>