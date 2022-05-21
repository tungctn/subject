<?php

get_header('homeadmin');
$code = (string)$_GET['code'];
$id = (int)$_GET['id'];
$sql = "SELECT * FROM `info` where id = '$id' and code = '$code'";
$result = mysqli_query($conn, $sql);
$row = array();
$row = mysqli_fetch_assoc($result);

?>
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
<header class="mt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-12">
                <h2><?php echo name($code) . "-" . $code; ?></h2>
                <p><span class="text-decoration-underline" style="font-weight: bold;"><?php echo $row['user_add']; ?></span> đã đăng:</p>
                <p><span class="text-decoration-underline" style="font-style: italic; font-weight:lighter;"><?php echo $row['time']; ?></span></p>
                <!-- <nav>
                    <p><span>Giảng viên hướng dẫn: <?php echo $row['instructor']; ?></span></p>
                    <p><span>– Mức độ khó của các nội dung trong học phần: <?php echo $row['level']; ?></span></p>
                    <p><span>– Khối lượng bài tập được giao trong học phần: <?php echo $row['evaluate']; ?></span></p>
                    <p><span>– Đánh giá tổng thể học phần: <?php echo $row['overall']; ?></span></p>

                </nav>

                <article>
                    <?php echo $row['comment']; ?>
                </article> -->
                <div class="course">
                    <div class="left">
                        <div class="overall text-center">Tổng quan</div>
                        <div class="score" style="<?php if ($row['overall'] >= 4) {
                                                        echo "background-color: rgb(67, 232, 174)";
                                                    } elseif ($row['overall'] == 3) {
                                                        echo "background-color: #fffa65";
                                                    } else {
                                                        echo "background-color: #ff4d4d";
                                                    }  ?>"><?php echo convert_score($row['overall']); ?></div>
                        <div class="review"></div>
                        <div class="overall text-center">Độ khó</div>
                        <div class="score" style="<?php if ($row['level'] >= 4) {
                                                        echo "background-color: rgb(67, 232, 174)";
                                                    } elseif ($row['level'] == 3) {
                                                        echo "background-color: #fffa65";
                                                    } else {
                                                        echo "background-color: #ff4d4d";
                                                    }  ?>"><?php echo convert_score($row['level']); ?></div>
                        <div class="review"></div>
                        <div class="overall text-center">Khối lượng BT</div>
                        <div class="score" style="<?php if ($row['evaluate'] >= 4) {
                                                        echo "background-color: rgb(67, 232, 174)";
                                                    } elseif ($row['evaluate'] == 3) {
                                                        echo "background-color: #fffa65";
                                                    } else {
                                                        echo "background-color: #ff4d4d";
                                                    }  ?>"><?php echo convert_score($row['evaluate']); ?></div>
                        <div class="review"></div>
                    </div>
                    <div class="right">
                        <div class="course_name">
                            <h2>Giảng viên hướng dẫn: <?php echo $row['instructor']; ?></h2>
                        </div>
                        <div class="course_code"><?php echo $row['comment']; ?></div>
                    </div>
                </div>


                <a href="?page=homeadmin" class="btn btn-primary mt-5">Quay lai trang chu admin</a>
                <br><br><br>
            </div>
        </div>
    </div>
</header>