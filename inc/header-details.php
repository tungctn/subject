<?php

global $list_info, $conn;
$code = (string) $_GET['code'];
echo $code;
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
    <title>Restaurant</title>
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
                    <li><a class="dropdown-item" href="#">Hồ sơ</a></li>
                    <li><a class="dropdown-item" href="#">Thanh toán</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
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
                <div class="col-md-4">
                </div>
                <div class="col-md-8">
                    <h2><?php echo name($code) . "-" . $code; ?></h2>
                    <?php
                    foreach ($info as $value) {
                    ?>
                        <p><span class="text-decoration-underline" style="font-weight: bold;"><?php echo $value['user_add']; ?></span> đã đăng:</p>
                        <p><span class="text-decoration-underline" style="font-style: italic; font-weight:lighter;"><?php echo $value['time']; ?></span></p>
                        <nav>
                            <p><span>Giảng viên hướng dẫn: <?php echo $value['instructor']; ?></span></p>
                            <p><span>- Mức độ khó của các nội dung trong học phần: <?php echo $value['level']; ?>/5<?php echo ' - '.point($value['level']) ?></span></p>
                            <p><span>- Khối lượng bài tập được giao trong học phần: <?php echo $value['evaluate']; ?>/5<?php echo ' - '.point($value['evaluate']) ?></span></p>
                            <p><span>- Đánh giá tổng thể học phần: <?php echo $value['overall']; ?></span>/5<?php echo ' - '.point($value['overall']) ?></p>

                        </nav>

                        <article>
                            <?php echo $value['comment']; ?>
                        </article>

                        <a href="?page=home" class="btn btn-primary mt-5">Quay lai trang chu</a>
                        <a href="<?php echo "?page=update&code={$code}&id={$value['id']}"; ?>" class="btn btn-warning mt-5">Sua thong tin</a>
                        <a href="<?php echo "?page=delete&code={$code}&id={$value['id']}"; ?>" class="btn btn-danger mt-5">Xoa nha hang</a>
                        <br><br><br>
                    <?php
                    }
                    ?>


                </div>
            </div>
        </div>
    </header>
</body>

</html>