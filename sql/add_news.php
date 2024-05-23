<?php
require_once("../entities/news.class.php");

if (isset($_POST["btnsubmit"])) {
    $tuaDe = $_POST["txtTuaDe"];
    $noiDung = $_POST["txtNoiDung"];
    $monHocLienQuan = $_POST["txtMonHocLienQuan"];

    $newNew = new News($tuaDe, $noiDung, $monHocLienQuan);
    $result = $newNew->save();
    
    if(!$result){
        $msg = "Adding fail";
    }
    else{
        $msg = "Adding successfully";
    }
    header("Location: ../teacher/edit.php?inserted=$msg");  
}
?>