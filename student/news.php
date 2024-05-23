<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>News</title>
    <style>
        .custom-material {
            background-color: #D9D9D9;
            padding: 20px;
            border-radius: 10px;
        }
        .news-list {
            list-style-type: none;
            padding: 0;
        }
        .news-list li {
            /* cursor: pointer;
            margin-bottom: 10px;
            font-size: 16px;
            color: #00215E; */
            cursor: pointer;
            margin-bottom: 10px;
            font-size: 16px;
            color: #00215E;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            transition: background-color 0.3s ease; 
        }
        .news-list li:hover {
            /* text-decoration: underline; */
            color: #fff;
            background-color: #00215E;
        }
        #contentNews {
            margin-top: 45px;
            margin-bottom: 20px;
            font-size: 16px;
            background-color: #fff;
            border-radius: 10px;
            width: 65%;
        }
    </style>
</head>
<body>
    <header><?php require_once("header.php"); ?></header>
    <div class="container custom-material">
        <div class="row">
            <div class="col-md-4">
                <label for="selectNews" class="fs-3">Notification</label>
                <ul class="news-list" id="newsList">
                    <?php
                        require_once("../entities/news.class.php");
                        $news = News::list_news();
                        $news_reverse = array_reverse($news);
                        foreach ($news_reverse as $new) {
                            echo '<li onclick="loadNewsContent(\'' . $new['tuaDe'] . '\')">['. $new['monHocLienQuan'] . ']'. $new['tuaDe'] . '</li>';
                        }
                    ?>
                </ul>
            </div>
            <div class="col-md-8" id="contentNews"></div>
        </div>
    </div>
    <footer><?php require_once("footer.php"); ?></footer>
    <script>
        function loadNewsContent(tuaDe) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('contentNews').innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "get_noidung.php?tuaDe=" + tuaDe, true);
            xhttp.send();
        }
    </script>
</body>
</html>