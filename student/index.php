<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Homepage</title>
    <style>
        #imageGV {
            z-index: -1;
        }
    </style>
</head>
<body>
    <header> <?php require_once("header.php"); ?></header>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="text-center">
                    <img src="../img/teacher-avatar.jpg" alt="Teacher's image" class="img-fluid rounded float-end d-block" id="imageGV">
                </div>
            </div>
            <?php
                require_once("../entities/teacher.class.php");
                $teacherList = Teacher::list_teacher();
                if ($teacherList && !empty($teacherList)) {
                    foreach ($teacherList as $teacher) {
                        echo '
                        <div class="col-md-9">
                            <p class="fs-2 text-left">'. $teacher["tenGiangVien"] .'</p>
                            <p class="fs-3 p-0">'. $teacher["chucVu"] .'</p>
                            <p style="text-align: justify; text-justify: inter-word;" class="p-0 fs-5">' . $teacher["gioiThieu"] . '</p>
                        </div>
                        ';
                    }
                }
            ?>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <p class="fs-2">Updates</p>
                <ul class="fs-5">
                    <?php
                        require_once("../entities/research.class.php");
                        $newsList = Research::list_research();
                        foreach ($newsList as $item) {
                            // echo '<li>' . $item["tenBaiBao"] . '</li>';
                            echo '<li><a href="get_noidung.php?id=' . $item['tuaDe'] . '">' . $item['tuaDe'] . '</a></li>';
                        }
                    ?>
                </ul>
            </div>
            <div class="col-md-6">
                <p class="fs-2">Notifications</p>
                <ul class="fs-5">
                    <?php
                        require_once("../entities/news.class.php");
                        $newsList = News::list_news();
                        $list_reverse = array_reverse($newsList);
                        foreach ($list_reverse as $item) {
                            // echo '<li>' . $item["tuaDe"] . '</li>';
                            echo '<li><a href="news.php?id=' . $item["tuaDe"] . '">' . $item["tuaDe"] . '</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <footer class="row"> <?php require_once("footer.php"); ?> </footer>
</body>
</html>