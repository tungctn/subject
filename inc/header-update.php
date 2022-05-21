<?php

global $list_info;
global $conn;

$id = (int) $_GET['id'];
$code = (string) $_GET['code'];
// echo $id;
// print_r($list_res[$id]['id']);
if (isset($_POST['btn_update'])) {
    $error = array();
    // $res_name = $_POST['res_name'];
    // $res_email = $_POST['res_email'];
    // $res_number = $_POST['res_number'];
    // $res_des = $_POST['res_des'];
    $code = $_POST['code'];
    $instructor = $_POST['instructor'];
    $level = $_POST['level'];
    $evaluate = $_POST['evaluate'];
    $overall = $_POST['overall'];
    $comment = $_POST['comment'];

    // UPDATE `info` SET `name` = 'Nha hang lau thai 2' WHERE `info`.`id` = 7
    // $id_ = (int) $list_res[$id]['id'];
    // echo $id_;
    $sql = "UPDATE `info` SET `code` = '$code', `instructor` = '$instructor', `level` = '$level', 
    `evaluate` = '$evaluate', `overall` = '$overall',`comment`  = '$comment' 
    WHERE `info`.`id` = {$id} and `info`.`code` = '$code'";
    if (mysqli_query($conn, $sql)) {
        echo "Cap nhat thanh cong";
    } else {
        $error['error'] = "Cap nhat that bai" . mysqli_error($conn);
    }
}

$sql = "SELECT * FROM `info` WHERE `info`.`id` =  '$id' and `info`.`code` = '$code'";
$result = mysqli_query($conn, $sql);

$row =  mysqli_fetch_assoc($result);
// print_r($row);


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
    <div class="container" style="background-color: white;
    margin-top: 50px;
    border-radius: 10px;">
        <h1 class="text-center">Chinh sua nha hang</h1>
        <div class="row">
            <div class="col-md-12 border p-5">
                <form class="" action="" method="post">
                    <label class="mt-2" for="code">Ten mon hoc</label>
                    <input class="d-block form-control " type="text" name="code" id="code" value="<?php if (!empty($row['code'])) echo $row['code'] ?>">
                    <label class="mt-2" for="instructor">Giảng viên hướng dẫn</label>
                    <input class="d-block form-control " type="text" name="instructor" id="instructor" value="<?php if (!empty($row['instructor'])) echo $row['instructor'] ?>">
                    <label class="mt-2" for="level">Mức độ khó của các nội dung trong học phần (trên thang điểm 5)</label>
                    <input class="d-block form-control " type="number" min="1" max="5" name="level" id="level" value="<?php if (!empty($row['level'])) echo $row['level'] ?>">
                    <label class="mt-2" for="evaluate">Khối lượng bài tập được giao trong học phần (trên thang điểm 5)</label>
                    <input class="d-block form-control " type="text" name="evaluate" id="evaluate" value="<?php if (!empty($row['evaluate'])) echo $row['evaluate'] ?>">
                    <label class="mt-2" for="overall">Đánh giá tổng thể học phần (trên thang điểm 5)</label>
                    <input class="d-block form-control " type="text" name="overall" id="overall" value="<?php if (!empty($row['overall'])) echo $row['overall'] ?>">
                    <label class="mt-2" for="comment">Chi tiet</label>
                    <textarea class="d-block w-100 form-control " name="comment" id="comment" rows="7"><?php if (!empty($row['comment'])) echo $row['comment'] ?></textarea>
                    <input class="btn btn-primary mt-5" type="submit" name="btn_update" value="Sua mon hoc">

                    <a href="?page=home" class="mt-5 btn btn-danger">Quay lai trang chu </a>
                    <?php if (empty($error) && isset($_POST['btn_update'])) {
                        echo "<p class='text-primary mt-3'>Sua du lieu thanh cong</p>";
                    }
                    ?>
                </form>
            </div>
        </div>

    </div>

</body>

</html>