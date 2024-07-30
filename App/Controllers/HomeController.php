<?php
namespace App\Controllers;
use App\Models\ProductModel;
// namespace src\controller;
class HomeController extends BaseController{
    private $ProductModel;
    function __construct(){
        $this->ProductModel = new ProductModel;
    }
    function index() {
        $this->titlepage = "Shop Bánh Kẹo";
        $dssp_new = $this->ProductModel->sanpham_get_all(0, 8, 0);
        $dssp_sale = $this->ProductModel->sanpham_get_all(0, 8, 1);
        $dssp_view = $this->ProductModel->sanpham_get_all(2, 8, 0);
        $this->data["new_product"] = $dssp_new;
        $this->data["sale_product"] = $dssp_sale;
        $this->data["view_product"] = $dssp_view;
        $this->renderView("home", $this->titlepage, $this->data);
    }
     function contact(){

        require_once "App/Views/contact.php";
        $this->renderView("contact",$this->titlepage,$this->data);
     }
   
}
?>