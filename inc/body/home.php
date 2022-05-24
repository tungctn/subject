<?php

global $list_info, $conn;
if (isset($_POST['search'])) {
    $search = $_POST['search'];

    $sql = "SELECT * from `course` where `code` like '%$search%' or `name` like '%$search%' order by `post` desc";
    $result = mysqli_query($conn, $sql);
    $list_search = array();
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $list_search[] = mysqli_fetch_assoc($result);
    }
}


?>
<?php get_header_body(); ?>

<content>
    <!-- Phone cards -->
    <div class="container mb-5 mt-5">
        <div class="row">
            <?php
            if (!isset($_POST['search'])) {
                global $list_course;
                // for ($i = 0; $i < sizeof($list_course); $i++) {
                for ($i = 0; $i < 5; $i++) {
            ?>
                    <a href="<?php echo "?page=details&code={$list_course[$i]['code']}"; ?>" class="text-decoration-none text-dark">
                        <div class="course">
                            <div class="left">
                                <div class="overall">Tổng quan (/5)</div>
                                <div class="score" style="<?php if ((int)score($list_course[$i]['code']) >= 4) {
                                                                echo "background-color: rgb(67, 232, 174)";
                                                            } elseif ((int)score($list_course[$i]['code']) == 3) {
                                                                echo "background-color: #fffa65";
                                                            } elseif ((int)score($list_course[$i]['code']) == 0) {

                                                                echo "background-color: #b2bec3";
                                                            } else {
                                                                echo "background-color: #ff4d4d";
                                                            }  ?>">
                                    <?php if ((int)score($list_course[$i]['code']) != 0) {
                                        echo  score($list_course[$i]['code']);
                                    } else {
                                        echo "?";
                                    } ?></div>
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

                $size = !(sizeof($list_search) >= 5) ? sizeof($list_search) : 5;
                for ($i = 0; $i < $size; $i++) {
                ?>

                    <a href="<?php echo "?page=details&code={$list_search[$i]['code']}"; ?>" class="text-decoration-none text-dark">
                        <div class="course">
                            <div class="left">
                                <div class="overall">Tổng quan (/5)</div>
                                <div class="score" style="<?php if ((int)score($list_search[$i]['code']) >= 4) {
                                                                echo "background-color: rgb(67, 232, 174)";
                                                            } elseif ((int)score($list_search[$i]['code']) == 3) {
                                                                echo "background-color: #fffa65";
                                                            } elseif ((int)score($list_search[$i]['code']) == 0) {

                                                                echo "background-color: #b2bec3";
                                                            } else {
                                                                echo "background-color: #ff4d4d";
                                                            } ?>"><?php if ((int)score($list_search[$i]['code']) != 0) {
                                                                            echo  score($list_search[$i]['code']);
                                                                        } else {
                                                                            echo "?";
                                                                        } ?></div>
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