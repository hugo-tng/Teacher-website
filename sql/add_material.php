<?php
require_once("../entities/material.class.php");

if (isset($_POST["btnsubmit"])) {
    $taiLieu = $_POST["txtTaiLieu"];
    $loaiTaiLieu = $_POST["txtLoaiTaiLieu"];
    $monHocLienQuan = $_POST["txtMonHocLienQuan"];

    $newMaterial = new Material($taiLieu, $loaiTaiLieu, $monHocLienQuan);
    $result = $newMaterial->save();

    if(!$result){
        $msg = "Adding fail";
    }
    else{
        $msg = "Adding successfully";
    }
    header("Location: ../teacher/edit.php?inserted=$msg");  
}
?>