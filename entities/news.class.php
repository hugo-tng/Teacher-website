<?php
require_once("../config/db.class.php");

class News {
    public $tuaDe;
    public $noiDung;
    public $monHocLienQuan;

    public function __construct($tuaDe, $noiDung, $monHocLienQuan) {
        $this->tuaDe = $tuaDe;
        $this->noiDung = $noiDung;
        $this->monHocLienQuan = $monHocLienQuan;
    }

    public function save() {
        $db = new Db();
        $sql = "INSERT INTO news (tuaDe, noiDung, monHocLienQuan) VALUES 
        ('$this->tuaDe', '$this->noiDung', '$this->monHocLienQuan')";
        $result = $db->query_execute($sql);
        return $result;
    }

    public static function list_news(){
        $db=new Db();
        $sql="select * from news";
        $result=$db->select_to_array($sql);
        return $result;
    }
    
    public static function list_noidung_by_tuade($selectedTuaDe) {
        $db = new Db();
        $sql = "SELECT * FROM news WHERE tuaDe = '$selectedTuaDe'";
        $result = $db->select_to_array($sql);
        return $result;
    }
}
?>
