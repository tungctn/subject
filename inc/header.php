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
    <link href="./public/css/home.css" rel="stylesheet">

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

        .banner {
            width: 100%;
            height: 300px;
            background-image: url('public/image/uet.jpg');
            background-repeat: no-repeat;
            background-size: 100%;
            background-position: 30% 24%;
            position: relative;
        }

        .banner_body {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(223, 59, 59, 0.5);
            z-index: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: #fff;
            font-size: 2.0rem;
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
                <li class="nav-item"><a href="#" class="nav-link link-dark px-2">About us</a></li>
                <!-- <li class="nav-item"><a href="?page=me" class="nav-link link-dark px-2">About me</a></li> -->
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
    <div class="banner">
        <div class="banner_body">
            <h1>Reviewsubject</h1>
            <p>Trang web review môn học số 1 UET</p>
        </div>
    </div>