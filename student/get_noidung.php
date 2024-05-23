<?php
require_once("../config/db.class.php");
require_once("../entities/news.class.php");

if (isset($_GET['tuaDe'])) {
    $selectedTuaDe = $_GET['tuaDe'];
    $news = News::list_noidung_by_tuade($selectedTuaDe);

    // echo '<table class="table">';
    echo '<tbody>';
    foreach ($news as $new) {
        // echo '<tr>';
        // echo '<td>' . $new['noiDung'] . '</td>';
        // echo '</tr>';
        echo '<p class="fs-5">' . $new['noiDung'] . '</p>';
    }
    echo '</tbody>';
    // echo '</table>';
}
?>
