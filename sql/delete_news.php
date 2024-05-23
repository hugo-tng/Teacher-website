<?php
    require_once("../config/db.class.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tuaDe'])) {
        $tuaDe = $_POST['tuaDe'];
        $db = new Db();
        $conn = $db->connect();
        if ($conn) {
            $tuaDe = mysqli_real_escape_string($conn, $tuaDe);
            $sql = "DELETE FROM news WHERE tuaDe = '$tuaDe'";
            $result = $conn->query($sql);
            if ($result) {
                echo "This post has been deleted";
            } else {
                echo "Can not delete this post";
            }
            $conn->close();
        }
    }
?>
