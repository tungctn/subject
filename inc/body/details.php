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
?>

<?php get_header_body(); ?>

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