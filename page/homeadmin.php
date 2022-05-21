<?php

// echo "day la home admin";
get_header('homeadmin');

?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Người đăng</th>
            <th scope="col">MSSV</th>
            <th scope="col">Thời gian đăng</th>
            <th scope="col">Sửa bài đăng</th>
            <th scope="col">Xoá bài đăng</th>
            <th scope="col">Chi tiết bài đăng</th>
        </tr>
    </thead>
    <tbody>
        <?php
        global $list_info;
        $temp = 0;
        foreach ($list_info as $value) {
            # code...
            $temp++;
        ?>
            <tr>
                <th scope="row"><?php echo $temp; ?></th>
                <td><?php echo $value['user_add']; ?></td>
                <td><?php echo $value['user_code']; ?></td>
                <td><?php echo $value['time']; ?></td>
                <td><a href="<?php echo "?page=updateadmin&code={$value['code']}&id={$value['id']}"; ?>">Sửa</a></td>
                <td><a href="<?php echo "?page=deleteadmin&code={$value['code']}&id={$value['id']}"; ?>">Xoá</a></td>
                <td><a href="<?php echo "?page=detail&code={$value['code']}&id={$value['id']}"; ?>">Chi tiết</a></td>
            </tr>
        <?php
        }
        ?>


    </tbody>
</table>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>