<?php
namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\DatabaseModel;
use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\CatalogModel;
Class AdminController extends AdminBaseController{
    private $AdminModel;
    private $UserModel;
    private $DatabaseModel;
    private $ProductModel;
    private $CatalogModel;
    function __construct(){
        $this->AdminModel=new AdminModel;
        $this->DatabaseModel= new DatabaseModel;
        $this->UserModel= new UserModel($this->DatabaseModel);
        $this->ProductModel= new ProductModel($this->DatabaseModel);
        $this->CatalogModel= new CatalogModel($this->DatabaseModel);
        
    }
    function index(){
        $this->renderView("admin", $this->titlepage, $this->data);
      }
      function catagory(){
        $danhmucall = $this->AdminModel->get_catagoryId();
        $this->data["danhmuc_all"] = $danhmucall;
        $this->renderView("catagory", $this->titlepage, $this->data);
   }
   function addcatagory(){
    if(isset($_POST['submitcatagory'])){
        // Retrieve form data
        $TrangThai = $_POST["TrangThai"];
        $Name_Dm = $_POST["Name_Dm"];
        $Img = $_FILES["Img"]["name"];
        $uploadOk=1;
        // kiểm tra các trường hợp
        // có phải hình không
        // hình có tồn tại trên host chưa
        // Kích thước hình
        $target_file=FILE_UPLOAD.basename($_FILES["Img"]["name"]);
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        if($uploadOk==1){
            move_uploaded_file($_FILES["Img"]["tmp_name"], $target_file);
        }

        try {

            $this->CatalogModel->insert_category($Name_Dm,$TrangThai,$Img);
    
            header("Location: " . PROURL . "/admin/catagory");
    
        } catch (\Throwable $th) {
            //throw $th;
            self::addcatagoryform();
        }
        
    }else{
        self::addcatagoryform();
    }
}
function editcatagory(){
    $Id_Dm = $_GET['Id_Dm'];
    $catagory_getone =  $this->CatalogModel->catagory_getone($Id_Dm);

    if(isset($_POST['submiteditcatagory']) && ($_POST['submiteditcatagory']>0)){
        $Name_Dm = isset($_POST['Name_Dm']) ? intval($_POST['Name_Dm']) : "";
        $TrangThai = isset($_POST['TrangThai']) ? intval($_POST['TrangThai']) : "";
        
        if (isset($_FILES['Img']) && $_FILES['Img']['error'] == 0) {
            $tmpFilePath = $_FILES['Img']['tmp_name'];
            $uploadPath = PROURL.'/public/img/shop/' . $_FILES['Img']['name'];
            move_uploaded_file($tmpFilePath, $uploadPath);
            $imageName = $_FILES['Img']['name'];
        }else{
            $imageName = $catagory_getone['Img'];
        }
        $TrangThai = isset($_POST['TrangThai']) ? intval($_POST['TrangThai']) : 0;
    
        $this->CatalogModel->update_catagory($Id_Dm,$_POST['Name_Dm'],$TrangThai,$imageName);
    }
}

function addcatagoryform(){
  $this->titlepage = 'Thêm sản phẩm mới';
  $this->renderView("catagory_add", $this->titlepage, $this->data);
}
   function product(){
    $this->titlepage = 'Quản lý sản phẩm';
    $sanphamall = $this->AdminModel->get_adminproduct();
    $this->data["sanpham_all"] = $sanphamall;
    $this->renderView("product", $this->titlepage, $this->data);
  }
  function catagorydelete() {
    $Id_Dm = $_GET['Id_Dm'];
    echo $Id_Dm; // In ra giá trị của $Id_Dm để kiểm tra
    if(isset($_GET['Id_Dm']) && $_GET['Id_Dm'] > 0) {
   
        $this->CatalogModel->catagory_delete($Id_Dm);
    }
    header("Location: " . PROURL . "/admin/catagory");
}

  function addproduct(){
    if(isset($_POST['submitproduct'])){
        // Retrieve form data
        $Id_Dm = $_POST["Id_Dm"];
        $Name = $_POST["Name"];
        $Price = $_POST["Price"];
        $TieuDe = $_POST["TieuDe"];
        $TrangThai = $_POST["TrangThai"];
        $NamSX = $_POST["NamSX"];
        $Sale = $_POST["Sale"];
        $NoiDung = $_POST["NoiDung"];
        $Img = $_FILES["Img"]["name"];
        $uploadOk=1;
        // kiểm tra các trường hợp
        // có phải hình không
        // hình có tồn tại trên host chưa
        // Kích thước hình
        $target_file=FILE_UPLOAD.basename($_FILES["Img"]["name"]);
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        if($uploadOk==1){
            move_uploaded_file($_FILES["Img"]["tmp_name"], $target_file);
        }

        try {
            // insrert into
            $this->ProductModel->insert_product($Id_Dm,$Name,$Price,$Img,$TieuDe,$NoiDung,$TrangThai,$Sale,$NamSX);
            // chuyển về trang dssp
            header("Location: " . PROURL . "/admin/product");
            // $this->titlepage = 'Quản lý sản phẩm';
            // $dssp_admin=$this->AdminModel->product_get_all();
            // $this->data["sanpham_all"]=$dssp_admin;
            // $this->renderView("ProductAdmin", $this->titlepage, $this->data);
        } catch (\Throwable $th) {
            //throw $th;
            self::addproductform();
            

        }

        
    }else{
        self::addproductform();
    }
}

    
   
      function addproductform(){
        $this->titlepage = 'Thêm sản phẩm mới';
        $danhmucall = $this->AdminModel->get_catagoryId();
        $this->data["danhmuc_all"] = $danhmucall;
        $this->renderView("product_add", $this->titlepage, $this->data);
    }









    
      function user(){
        $this->renderView("user", $this->titlepage, $this->data);
      }
      function oder(){
        $this->renderView("oder", $this->titlepage, $this->data);
      }
}
?>