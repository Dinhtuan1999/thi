<?php
namespace App\controller;

use App\model\StoreModel;

class StoreController
{
    protected $storeModel;

    public function __construct()
    {
        $this->storeModel = new StoreModel();
    }

    public function index()
    {
//        var_dump(1);die;
        $stores = $this->storeModel->getAll();
//       var_dump($this->bookModel->getAll());die;
        include "src/view/list.php";
    }

    public function delete($id){
        if($_REQUEST['id']){
            $this->storeModel->delete($id);
        }
        header('location:index.php?page=list-store');
    }
    public function getStoreById($id){
        return $this->storeModel->getStoreById($id);
    }
    public function add(){
//        var_dump(1);die();
        if(!empty($_POST['name']) && !empty($_POST['loaihang']) &&
        !empty($_POST['gia']) && !empty($_POST['soluong']) && !empty($_POST['mota'])){
            $tenhang =$_POST['name'];
            $loaihang = $_POST['loaihang'];
            $gia = $_POST['gia'];
            $soluong = $_POST['soluong'];
            $mota = $_POST['mota'];
            $this->storeModel->addStore($tenhang,$loaihang,$gia, $soluong ,$mota);
            header('location:index.php?page=list-store');
        }
        else {
            include "src/view/add.php";
        }
    }
    public function update($id)

    {
        if(!empty($_POST['name']) && !empty($_POST['loaihang']) &&
            !empty($_POST['gia']) && !empty($_POST['soluong']) && !empty($_POST['mota'])){
            $tenhang =$_POST['name'];
            $loaihang = $_POST['loaihang'];
            $gia = $_POST['gia'];
            $soluong = $_POST['soluong'];
            $mota = $_POST['mota'];
            $this->storeModel->update($tenhang, $loaihang, $gia, $soluong,$mota,$id);
            header('location:index.php?page=list-store');
        } else {
            $StoreDetail = $this->getStoreById($id);
            include "src/view/update.php";

        }

    }

    public function search()
    {
        $search = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $search = $_REQUEST['search'];
//            var_dump($search);die;
        }
        $books = $this->storeModel->search($search);
//        var_dump($librarys);die;
        include "src/view/list.php";
    }
}
