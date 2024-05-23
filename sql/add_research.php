<?php
    require_once("../entities/research.class.php");
    if(isset($_POST["btnsubmit"])){
        $tuaDe=$_POST["txtTuaDe"];
        $moTa=$_POST["txtMoTa"];
        // $maGiangVien=$_POST["txtMaGiangVien"];
        $db = new Db();
        $query = "SELECT maGiangVien FROM Teacher";
        $magv = $db->query_execute($query);
        if (mysqli_num_rows($magv) == 0) {
            $msg = "No teacher's ID exist";
            header("Location: ../teacher/edit.php?inserted=$msg");
        }
        $maGiangVien = $magv->fetch_assoc()['maGiangVien'];
        $newResearch=new Research($tuaDe, $moTa, $maGiangVien);
        $result=$newResearch->save();
        if(!$result){
            $msg = "Can't add research";
        }
        else{
            $msg = "Adding research successfully";
        }

        header("Location: ../teacher/edit.php?inserted=$msg");
    }
?>