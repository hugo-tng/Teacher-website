<?php
    require_once("../entities/major.class.php");
    if(isset($_POST["btnsubmit"])){
        $maMon=$_POST["txtMaMon"];
        $tenMon=$_POST["txtTenMon"];

        // kiểm tra mã giảng viên có tồn tại không
        $db = new Db();
        $query = "SELECT maGiangVien FROM Teacher";
        $magv = $db->query_execute($query);
        if (mysqli_num_rows($magv) == 0) {
            $msg = "No teacher's ID exist";
            header("Location: ../teacher/edit.php?inserted=$msg");
        }
        // thêm vào database
        $maGV = $magv->fetch_assoc()['maGiangVien'];
        $newMajor=new Major($maMon, $tenMon, $maGV);
        $result=$newMajor->save();
        if(!$result){
            $msg = "Major adding fail";
        }
        else{
            $msg = "Major adding successfully";
        }
        header("Location: ../teacher/edit.php?inserted=$msg");   
    }
?>