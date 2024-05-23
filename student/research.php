<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Research</title>
    <style>
        .custom-majorial{
            background-color: #D9D9D9;
        }
        .container-custom {
            /* height: 240px;
            overflow-y: auto;
            padding: 20px;
            background-color: #D9D9D9;
            border-radius: 10px; */
        }
    </style>
</head>
<body>
    <header class="row"> <?php require_once("header.php"); ?></header>
    <div class="container container-custom">
        <?php
            require_once("../entities/research.class.php");
            $researchList = Research::list_research();
            if ($researchList && !empty($researchList)) {
                foreach ($researchList as $research) {
                    echo '
                        <ul><li class="fs-4 text-left">'. $research["moTa"] .'</li></ul>
                    ';
                }
            }
        ?>
    </div>
    <footer class="row"> <?php require_once("footer.php"); ?> </footer>
</body>
</html>