<?php
require_once("../config/db.class.php");

class Material {
    public $taiLieu;
    public $loaiTaiLieu;
    public $monHocLienQuan;

    public function __construct($taiLieu, $loaiTaiLieu, $monHocLienQuan) {
        $this->taiLieu = $taiLieu;
        $this->loaiTaiLieu = $loaiTaiLieu;
        $this->monHocLienQuan = $monHocLienQuan;
    }

    public function save() {
        $db = new Db();
        $sql = "INSERT INTO material (taiLieu, loaiTaiLieu, monHocLienQuan) VALUES 
        ('$this->taiLieu', '$this->loaiTaiLieu', '$this->monHocLienQuan')";
        $result = $db->query_execute($sql);
        return $result;
    }

    public static function list_major(){
        $db=new Db();
        $sql="select * from material";
        $result=$db->select_to_array($sql);
        return $result;
    }

    public static function list_material_by_major($selectedMajor) {
        $db = new Db();
        $sql = "SELECT * FROM material WHERE monHocLienQuan = '$selectedMajor'";
        $result = $db->select_to_array($sql);
        return $result;
    }
}
?>
