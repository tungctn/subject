<?php

global $list_info, $conn;
$code = (string) $_GET['code'];
// echo $code;
$sql = "SELECT * from `info` WHERE `info`.`code` = '$code'";
$result = mysqli_query($conn, $sql);
$info = array();
for ($i = 0; $i < mysqli_num_rows($result); $i++) {
    $info[] = mysqli_fetch_assoc($result);
}
// echo $id;

?>

<!doctype html>
<html lang="en">

<head>
    <title>Subject</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="./assets/css/style.css"> -->
    <link rel="stylesheet" href="./assets/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
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

    <header class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo "?page=add&code={$code}"; ?>" class="btn btn-danger w-30" style="float:right;">Tạo bài viêt</a>
                    <h2><?php echo name($code) . "-" . $code; ?></h2>
                    <?php
                    foreach ($info as $value) {
                    ?>
                        <p><span class="text-decoration-underline" style="font-weight: bold;"><?php echo $value['user_add']; ?></span> đã đăng:</p>
                        <p><span class="text-decoration-underline" style="font-style: italic; font-weight:lighter;"><?php echo $value['time']; ?></span></p>

                        <style>
                            .course {
                                width: 80%;
                                display: flex;
                                border-radius: 20px;
                                margin-top: 32px;
                                /* margin-left: 100px; */
                                background-color: #f2f2f2;
                                padding: 20px;
                            }

                            .course:hover {
                                transform: scale(1.05);
                                transition: transform 0.4s;
                            }

                            .overall {
                                font-weight: bold;
                            }

                            .score {
                                margin: 8px 0px;
                                text-align: center;
                                border-radius: 8px;
                                background-color: rgb(67, 232, 174);
                                padding: 10px;
                                color: black;
                                font-weight: bold;
                                font-size: 24px;
                            }

                            .review {
                                font-size: 14px;
                            }

                            .right {
                                padding-left: 30px;
                                margin-top: 15px;
                            }

                            .course_name {
                                font-size: 25px;
                                color: black;
                                margin-top: 15px;
                            }

                            .course_code {
                                font-size: 15px;
                                color: #636161;
                                margin-top: 10px;
                            }
                        </style>
                        <div class="course">
                            <div class="left">
                                <div class="overall text-center">Tổng quan (/5)</div>
                                <div class="score" style="<?php if ($value['overall'] >= 4) {
                                                                echo "background-color: rgb(67, 232, 174)";
                                                            } elseif ($value['overall'] == 3) {
                                                                echo "background-color: #fffa65";
                                                            } else {
                                                                echo "background-color: #ff4d4d";
                                                            }  ?>"><?php echo convert_score($value['overall']); ?></div>
                                <div class="review"></div>
                                <div class="overall text-center">Độ khó (/5)</div>
                                <div class="score" style="<?php if ($value['level'] <= 2) {
                                                                echo "background-color: rgb(67, 232, 174)";
                                                            } elseif ($value['level'] == 3) {
                                                                echo "background-color: #fffa65";
                                                            } else {
                                                                echo "background-color: #ff4d4d";
                                                            }  ?>"><?php echo convert_score($value['level']); ?></div>
                                <div class="review"></div>
                                <div class="overall text-center">Khối lượng BT (/5)</div>
                                <div class="score" style="<?php if ($value['evaluate'] <= 2) {
                                                                echo "background-color: rgb(67, 232, 174)";
                                                            } elseif ($value['evaluate'] == 3) {
                                                                echo "background-color: #fffa65";
                                                            } else {
                                                                echo "background-color: #ff4d4d";
                                                            }  ?>"><?php echo convert_score($value['evaluate']); ?></div>
                                <div class="review"></div>
                            </div>
                            <div class="right">
                                <div class="course_name">
                                    <h2>Giảng viên hướng dẫn: <?php echo $value['instructor']; ?></h2>
                                </div>
                                <div class="course_code"><?php echo $value['comment']; ?></div>
                            </div>
                        </div>

                        <br><br><br>
                    <?php
                    }
                    ?>


                </div>
            </div>
        </div>
    </header>
    <!-- <a href="?page=home" class="btn btn-primary mt-5">Quay lai trang chu</a> -->
</body>

</html>