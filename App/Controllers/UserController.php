<?php
namespace App\Controllers;
use App\Models\UserModel;
Class UserController extends BaseController{
    private $UserModel;
    function __construct(){
        $this->UserModel=new UserModel;
        
    }
    function admin(){
      include_once ("admin.php");
    }
    function login(){
        $this->titlepage = "Trang đăng nhập";
        $kq = null;
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $kq = $this->UserModel->user_getLogin($_POST['email'], $_POST['matKhau']);
    
            if ($kq) {
                if ($kq['TinhTrang'] == 1) {
                    $_SESSION['user'] = $kq;
                    $_SESSION['email'] = $_POST['email']; // Change here
                    if ($_SESSION['user']['Role'] >= 1) {
                        header("location:". PROURL."/admin");
                    } elseif ($_SESSION['user']['Role'] == 0) {
                        header("location: " . PROURL);
                    }
                } else {
                    echo 'KKK';
                
                }
            } else {
                $_SESSION['loi'] = "email hoặc Password đã sai!";
            }
        }
        $this->renderView("login", $this->titlepage, $this->data);
    }
    function logout(){
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }
        header("location: ".PROURL);
    }
    function dangky(){
        $this->titlepage = "Trang đăng ký";

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $checkemail = $this->UserModel->user_checkemail($_POST['email']);
                $checkSDT = $this->UserModel->user_checksdt($_POST['SoDienThoai']);
                if($checkemail == TRUE || $checkSDT  == TRUE){
                    if($checkemail){
                        $_SESSION['canhbaoemail'] = "email đã tồn tại, vui lòng nhập email khác";
                    }
                    if($checkSDT){
                        $_SESSION['canhbaoSDT'] = "Số điện thoại đã tồn tại, vui lòng nhập Số điện thoại khác";
                    }
                
                }else{
                    $HinhAnh = 'ava_user.jpeg';
                    $GioiTinh = isset($_POST['GioiTinh']) ? intval($_POST['GioiTinh']) : 0;

                    $this->UserModel->user_register($_POST['hoTen'],$_POST['tenDangNhap'],$_POST['email'],$_POST['matKhau'],$_POST['DiaChi'],$GioiTinh,$_POST['SoDienThoai']);
                    $_SESSION['thongbao'] = "Đăng ký tài khoản thành công!";
                    $_SESSION['email'] = $_POST['email'];
                }
            }

            //

            //
            $this->renderView("dangky",$this->titlepage,$this->data);
    }
}

?>