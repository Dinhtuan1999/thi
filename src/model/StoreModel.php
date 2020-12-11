<?php


namespace App\model;


class StoreModel
{
    protected $database;

    public function __construct(){
        $db = new DBConnect();
        $this->database = $db->connect();
        $this->database->setAttribute(\PDO::ATTR_ERRMODE , \PDO::ERRMODE_EXCEPTION);
    }

    public function getAll (){

        $sql ="SELECT * FROM cuahang";
//
        $stmt = $this->database->query($sql);
//        var_dump($stmt);die();
        return $stmt->fetchAll();
    }
    public function getStoreById($id){
        $sql = "SELECT * FROM cuahang WHERE Mahang =:Ma_hang";
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(':Ma_hang' , $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function delete($id){
        $sql = "DELETE FROM cuahang WHERE Mahang =:Ma_hang";
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(':Ma_hang', $id);
        $stmt->execute();
    }
        public function addStore($tenhang,$loaihang,$gia,$soluong,$mota ){
//        var_dump(1);die();
            $sql = "INSERT INTO `cuahang`( `Tenhang`, `LoaiHang`, `Gia`,`SoLuong`,`Ngaytao`,`Motavemathang`) VALUES (?,?,?,?,?,?)";
            $stmt = $this->database->prepare($sql);
            $stmt->bindParam(1,$tenhang);
            $stmt->bindParam(2,$loaihang);
            $stmt->bindParam(3,$gia);
            $stmt->bindParam(4,$soluong);
            $stmt->bindParam(5,$mota);
            $stmt->execute();
    }
    public function update($tenhang,$loaihang,$gia,$soluong,$mota,$id){
        $sql = "UPDATE `cuahang` SET `Tenhang`=:Ten_hang ,`Loaihang` =:Loai_hang,`Gia` =:Gia,`Soluong` =:So_luong, `Motavemathang` =:Motavemathang 
WHERE cuahang.Mahang =:Ma_hang  ";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':Ten_hang',$tenhang);
        $stmt->bindParam(':Loai_hang',$loaihang);
        $stmt->bindParam(':Gia',$gia);
        $stmt->bindParam(':So_luong' , $soluong);
        $stmt->bindParam(':Motavemathang' , $mota);
        $stmt->bindParam(':Ma_hang ',$id);
        $stmt->execute();
    }
    public function search($search){
//        var_dump($search);die;
//        $search = $_POST['search'];
        $sql ="SELECT * FROM cuahang WHERE Tenhang LIKE :Tenhang";
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(":Tenhang" ,'%'. $search .'%' );
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
