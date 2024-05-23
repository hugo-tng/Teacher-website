<?php
require_once("../config/db.class.php");

class Teacher {
    public $maGiangVien;
    public $tenGiangVien;
    public $thongTinLienHe;
    public $gioiThieu;
    public $chucVu;

    public function __construct($maGiangVien, $tenGiangVien, $thongTinLienHe, $gioiThieu, $chucVu) {
        $this->maGiangVien = $maGiangVien;
        $this->tenGiangVien = $tenGiangVien;
        $this->thongTinLienHe = $thongTinLienHe;
        $this->gioiThieu = $gioiThieu;
        $this->chucVu = $chucVu;
    }

    public function save() {
        $db = new DB();
        $sql = "INSERT INTO teacher(maGiangVien, tenGiangVien, thongTinLienHe, gioiThieu, chucVu) VALUES
        ('$this->maGiangVien', '$this->tenGiangVien', '$this->thongTinLienHe', '$this->gioiThieu', '$this->chucVu')";
        $result = $db->query_execute($sql);
        return $result;
    }

    public static function list_teacher(){
        $db=new Db();
        $sql="select * from teacher";
        $result=$db->select_to_array($sql);
        return $result;
    }
}
?>
