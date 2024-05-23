<?php
require_once("../config/db.class.php");

class Major {
    public $maMon;
    public $tenMon;
    public $maGiangVien;

    public function __construct($maMon, $tenMon, $maGiangVien) {
        $this->maMon = $maMon;
        $this->tenMon = $tenMon;
        $this->maGiangVien = $maGiangVien;
    }

    public function save() {
        $db = new Db();
        $sql = "INSERT INTO major (maMon, tenMon, maGiangVien) VALUES 
        ('$this->maMon', '$this->tenMon', '$this->maGiangVien')";
        $result = $db->query_execute($sql);
        return $result;
    }

    public static function list_major(){
        $db=new Db();
        $sql="select * from major";
        $result=$db->select_to_array($sql);
        return $result;
    }
}
?>
