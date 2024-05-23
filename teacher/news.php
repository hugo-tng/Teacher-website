<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
                        require_once("../sql/delete_news.php");
                        $news = News::list_news();
                        $news_reverse = array_reverse($news);
                        foreach ($news_reverse as $new) {
                            echo '<li>';
                            echo '<span onclick="loadNewsContent(\'' . $new['tuaDe'] . '\')">['. $new['monHocLienQuan'] . '] '. $new['tuaDe'] . '</span>';
                            echo '<button class="btn btn-sm ml-2" onclick="deleteNews(\'' . $new['tuaDe'] . '\')">';
                            echo '<i class="fas fa-trash-alt"></i></button>';
                            echo '</li>';
                        }
                    ?>
                </ul>
            </div>
            <div class="col-md-8" id="contentNews"></div>
        </div>
    </div>
    <footer><?php require_once("../student/footer.php"); ?></footer>
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
        function deleteNews(tuaDe) {
            if (confirm("Do you really want to delete this post?")) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        loadNewsList();
                    }
                };
                xhttp.open("POST", "../sql/delete_news.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("tuaDe=" + tuaDe);
            }
        }
        function loadNewsList() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('newsList').innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "refresh_news_list.php", true);
            xhttp.send();
        }
    </script>
</body>
</html>