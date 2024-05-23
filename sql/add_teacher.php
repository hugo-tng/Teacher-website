<?php
    require_once("../entities/teacher.class.php");
    if(isset($_POST["btnsubmit"])){
        $maGiangVien=$_POST["txtMaGiangVien"];
        $tenGiangVien=$_POST["txtTenGiangVien"];
        $thongTinLienHe=$_POST["txtThongTinLienHe"];
        $gioiThieu=$_POST["txtGioiThieu"];
        $chucVu=$_POST["txtChucVu"];
        
        $newTeacher=new Teacher($maGiangVien, $tenGiangVien, $thongTinLienHe, $gioiThieu, $chucVu);
        $result=$newTeacher->save();
        if(!$result){
            $msg = "Can't not add teacher's info";
        }
        else{
            $msg = "Teacher\'s information adding successfully!";
        }
        header("Location: ../teacher/edit.php?inserted=$msg");
    }
?>
