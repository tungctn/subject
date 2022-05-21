<?php

global $list_info, $conn;
if (isset($_POST['search'])) {
    // echo $_POST['search'];
    $search = $_POST['search'];
    // $sql = "SELECT * from `info` join `course` on `info`.`code` = `course`.`code` 
    // where `info`.`code` like '%$search%' or `course`.`name` like '%$search%' group by `info`.`code`";
    // $result = mysqli_query($conn, $sql);
    // $list_search = array();
    // for ($i = 0; $i < mysqli_num_rows($result); $i++) {
    //     $list_search[] = mysqli_fetch_assoc($result);
    // }

    $sql = "SELECT * from `course` where `code` like '%$search%' or `name` like '%$search%'";
    $result = mysqli_query($conn, $sql);
    $list_search = array();
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $list_search[] = mysqli_fetch_assoc($result);
    }
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

    <meta name="theme-color" content="#7952b3">
    <title>Subject</title>

</head>

<body class="d-flex flex-column min-vh-100 bg-white" style="min-height: 600px;">
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

        .course {
            width: 80%;
            display: flex;
            border-radius: 20px;
            margin-top: 32px;
            margin-left: 100px;
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
            <form class="d-flex" method="POST">
                <input type="search" class="form-control" style="margin-right: 30px;" placeholder="Tìm kiếm" aria-label="Search" name="search">
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

    <content>
        <!-- Phone cards -->
        <div class="container mb-5 mt-5">
            <div class="row">
                <?php
                if (!isset($_POST['search'])) {
                    global $list_course;
                    for ($i = 0; $i < sizeof($list_course); $i++) {
                ?>
                        <a href="<?php echo "?page=details&code={$list_course[$i]['code']}"; ?>" class="text-decoration-none text-dark">
                            <div class="course">
                                <div class="left">
                                    <div class="overall">Tổng quan (/5)</div>
                                    <div class="score" style="<?php if ((int)score($list_course[$i]['code']) >= 4) {
                                                                    echo "background-color: rgb(67, 232, 174)";
                                                                } elseif ((int)score($list_course[$i]['code']) == 3) {
                                                                    echo "background-color: #fffa65";
                                                                } else {
                                                                    echo "background-color: #ff4d4d";
                                                                }  ?>">
                                        <?php echo score($list_course[$i]['code']); ?></div>
                                    <div class="review"><?php echo num($list_course[$i]['code']); ?> đánh giá</div>
                                </div>
                                <div class="right">
                                    <div class="course_name"><?php echo $list_course[$i]['name']; ?></div>
                                    <div class="course_code"><?php echo $list_course[$i]['code']; ?></div>
                                </div>
                            </div>
                        </a>

                    <?php
                    }
                } else {
                    for ($i = 0; $i < sizeof($list_search); $i++) {
                    ?>

                        <a href="<?php echo "?page=details&code={$list_search[$i]['code']}"; ?>" class="text-decoration-none text-dark">
                            <div class="course">
                                <div class="left">
                                    <div class="overall">Tổng quan (/5)</div>
                                    <div class="score" style="<?php if ((int)score($list_search[$i]['code']) >= 4) {
                                                                    echo "background-color: rgb(67, 232, 174)";
                                                                } elseif ((int)score($list_search[$i]['code']) == 3) {
                                                                    echo "background-color: #fffa65";
                                                                } else {
                                                                    echo "background-color: #ff4d4d";
                                                                }  ?>"><?php echo score($list_search[$i]['code']); ?></div>
                                    <div class="review"><?php echo num($list_search[$i]['code']); ?> đánh giá</div>
                                </div>
                                <div class="right">
                                    <div class="course_name"><?php echo $list_search[$i]['name']; ?></div>
                                    <div class="course_code"><?php echo $list_search[$i]['code']; ?></div>
                                </div>
                            </div>
                        </a>
                <?php
                    }
                }

                ?>
                <!-- End Card 1 -->

            </div>
        </div>
        <!-- End phone cards -->
    </content>
    <nav class="mb-4 d-flex" style="margin: 0 auto">
    </nav>