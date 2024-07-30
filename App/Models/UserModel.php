<?php
namespace App\Models;
class UserModel{
    private $db;
    function __construct(){
        $this->db=new DatabaseModel;
    }
    function user_getLogin($email,$matKhau){
        return $this->db->get_one("SELECT * FROM taikhoan WHERE email = ? AND matKhau = ?",$email,$matKhau);
    }
    function user_register($hoTen,$tenDangNhap,$email,$matKhau,$DiaChi,$GioiTinh,$SoDienThoai){
        $this->db->pdo_execute("INSERT INTO taikhoan (`hoTen`,`tenDangNhap`,`email`,`matKhau`,`DiaChi`,`GioiTinh`,`SoDienThoai`) VALUES(?,?,?,?,?,?,0)",$hoTen,$tenDangNhap,$email,$matKhau,$DiaChi,$GioiTinh,$SoDienThoai);
    }
    function user_checkEmail($Email){
        return $this->db->get_one("SELECT * FROM taikhoan WHERE Email = ?", $Email);
    }

    //check trùng sdt
    function user_checksdt($SoDienThoai){
        return $this->db->get_one("SELECT * FROM taikhoan WHERE SoDienThoai = ?", $SoDienThoai);
    }
}
?>