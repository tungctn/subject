<?php

if (isset($_POST['btn_add'])) {
    global $conn;
    $user_add = $_SESSION['user_login'];
    $user_code = $_SESSION['user_code'];
    $error = array();
    $code = $_GET['code'];
    if (empty($_POST['instructor'])) {
        $error['instructor'] = "Khong duoc de trong ten giang vien";
    } else {
        $instructor = $_POST['instructor'];
    }
    if (empty($_POST['level'])) {
        $error['level'] = "Khong duoc de trong";
    } else {
        $level = $_POST['level'];
    }

    if (empty($_POST['evaluate'])) {
        $error['evaluate'] = "Khong duoc de trong";
    } else {
        $evaluate = $_POST['evaluate'];
    }

    if (empty($_POST['overall'])) {
        $error['overall'] = "Khong duoc de trong";
    } else {
        $overall = $_POST['overall'];
    }

    if (empty($_POST['comment'])) {
        $error['comment'] = "Khong duoc de trong mieu ta";
    } else {
        $comment = $_POST['comment'];
    }

    if (empty($error)) {
        $sql = "INSERT INTO `info` (`code` , `instructor`, `level`, `evaluate`,`overall`,`comment`,`user_add`.`user_code`)"
            . "VALUES ('{$code}','{$instructor}','{$level}','{$evaluate}','{$overall}','{$comment}','{$user_add}','{$user_code}')";
        if (mysqli_query($conn, $sql)) {
            echo "them du lieu thanh cong";
        } else {
            echo "Loi" . mysqli_error($conn);
        }
    }
}

?>

<!doctype html>
<html lang="en">

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
    <title>Subject</title>

</head>

<body class="d-flex flex-column min-vh-100" style="min-height: 600px;">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Navigation -->
    <nav class="py-2 bg-light border-bottom navbar-fixed-top">
        <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <li class="nav-item">
                    <a href="#" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
                        <img src="public/image/sub.png" alt="mdo" width="32" height="32">
                        <span class="fs-4">Subject</span></a>
                </li>
                <li class="nav-item"><a href="?page=home" class="nav-link link-dark px-2 active" aria-current="page">Trang
                        chủ</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Blog</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-dark px-2">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-dark px-2">About us</a></li>
                <!-- <li class="nav-item"><a href="?page=add" class="nav-link link-dark px-2">Add</a></li> -->
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
                    <li><a class="dropdown-item" href="?page=change">Đổi mật khẩu</a></li>
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
        <h1 class="text-center">Thêm bài viết</h1>
        <div class="row">
            <div class="col-md-12 border p-5">
                <form class="" action="" method="POST" enctype="multipart/form-data">
                    <!-- <label class="mt-2" for="name">Ten mon hoc</label>
                    <input class="d-block form-control " type="text" name="name" id="name"> -->
                    <label class="mt-2" for="instructor">Giảng viên hướng dẫn</label>
                    <input class="d-block form-control " type="text" name="instructor" id="instructor">
                    <label class="mt-2" for="level">Mức độ khó của các nội dung trong học phần (/5)</label>
                    <!-- <input class="d-block form-control " type="text" name="level" id="level"> -->
                    <select class="form-select" id="level" aria-label="Default select example" name="level">
                        <option selected>Chọn mức điểm</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <label class="mt-2" for="evaluate">Khối lượng bài tập được giao trong học phần (/5)</label>
                    <!-- <input class="d-block form-control " type="text" name="evaluate" id="evaluate"> -->
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
                    <label class="mt-2" for="comment">Chi tiet</label>
                    <textarea class="d-block w-100 form-control " name="comment" id="comment" rows="7"></textarea>
                    <input class="btn btn-primary mt-5" type="submit" name="btn_add" value="Them mon hoc">

                    <a href="?page=home" class="mt-5 btn btn-danger">Quay lai trang chu </a>
                    <?php if (empty($error) && isset($_POST['btn_add'])) {
                        echo "<p class='text-primary mt-3'>Them du lieu thanh cong</p>";
                    }
                    ?>

                </form>
            </div>
        </div>

    </div>