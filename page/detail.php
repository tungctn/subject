<?php

get_header('homeadmin');
$code = (string)$_GET['code'];
$id = (int)$_GET['id'];
$sql = "SELECT * FROM `info` where id = '$id' and code = '$code'";
$result = mysqli_query($conn, $sql);
$row = array();
$row = mysqli_fetch_assoc($result);

?>
<header class="mt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-8">
                <h2><?php echo name($code) . "-" . $code; ?></h2>
                <p><span class="text-decoration-underline" style="font-weight: bold;"><?php echo $row['user_add']; ?></span> đã đăng:</p>
                <p><span class="text-decoration-underline" style="font-style: italic; font-weight:lighter;"><?php echo $row['time']; ?></span></p>
                <nav>
                    <p><span>Giảng viên hướng dẫn: <?php echo $row['instructor']; ?></span></p>
                    <p><span>– Mức độ khó của các nội dung trong học phần: <?php echo $row['level']; ?></span></p>
                    <p><span>– Khối lượng bài tập được giao trong học phần: <?php echo $row['evaluate']; ?></span></p>
                    <p><span>– Đánh giá tổng thể học phần: <?php echo $row['overall']; ?></span></p>

                </nav>

                <article>
                    <?php echo $row['comment']; ?>
                </article>

                <a href="?page=homeadmin" class="btn btn-primary mt-5">Quay lai trang chu</a>
                <br><br><br>
            </div>
        </div>
    </div>
</header>