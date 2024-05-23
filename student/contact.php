<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Contact</title>
    <style>
        .custom-majorial{
            background-color: #D9D9D9;
        }
        .container-custom {
            /* height: 240px; */
            /* overflow-y: auto; */
            /* padding: 20px; */
            /* background-color: #D9D9D9; */
            /* border-radius: 10px; */
        }
        #selectMajor {
            height: 30px;
            width: 200px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <header class="row"> <?php require_once("header.php"); ?></header>
    <div class="container container-custom">
        <div class="row">
            <div class="row align-items-center">
                <div class="col-md-2">
                    <div class="text-center">
                        <img src="../img/teacher-avatar.jpg" alt="Teacher's image" class="img-fluid rounded float-start d-block">
                    </div>
                </div>
                <div class="col-md-5">
                    <?php
                        require_once("../entities/teacher.class.php");
                        $teacherList = Teacher::list_teacher();
                        if ($teacherList && !empty($teacherList)) {
                            foreach ($teacherList as $teacher) {
                                echo '
                                    <p class="fs-3 text-left">'. $teacher["tenGiangVien"] .'</p>
                                    <p class="fs-4 text-left">Email: '. $teacher["thongTinLienHe"] .'</p>
                                ';
                            }
                        }
                    ?>
                    <h4 class="text-nowrap">Address: C119, 19 Nguyen Huu Tho, Tan Phong, Dist. 7, HCMC.</h4>
                </div>
            </div>
        </div>
    </div>
    <footer class="row"> <?php require_once("footer.php"); ?> </footer>
</body>
</html>