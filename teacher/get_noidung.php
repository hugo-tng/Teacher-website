<?php
require_once("../config/db.class.php");
require_once("../entities/news.class.php");

if (isset($_GET['tuaDe'])) {
    $selectedTuaDe = $_GET['tuaDe'];
    $news = News::list_noidung_by_tuade($selectedTuaDe);

    echo '<tbody>';
    foreach ($news as $new) {
        echo '<p class="fs-5">' . $new['noiDung'] . '</p>';
    }
    echo '</tbody>';
}
?>
