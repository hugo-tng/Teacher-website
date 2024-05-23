<?php
require_once("../config/db.class.php");

class Research {
    public $tuaDe;
    public $moTa;
    public $maGiangVien;

    public function __construct($tuaDe, $moTa, $maGiangVien) {
        $this->tuaDe = $tuaDe;
        $this->moTa = $moTa;
        $this->maGiangVien = $maGiangVien;
    }

    public function save() {
        $db = new Db();
        $sql = "INSERT INTO research (tuaDe, moTa, maGiangVien) VALUES 
        ('$this->tuaDe', '$this->moTa', '$this->maGiangVien')";
        $result = $db->query_execute($sql);
        return $result;
    }

    public static function list_research(){
        $db=new Db();
        $sql="select * from research";
        $result=$db->select_to_array($sql);
        return $result;
    }
}
?>
