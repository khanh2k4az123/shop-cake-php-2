<?php
namespace App\Models;

class OrderModel{
    private $db;
    function __construct(){
        $this->db=new DatabaseModel;
    }
    function TaoDonHang($id_tk,$PhuongThucTT,$Email,$ghiChu,$Phone,$hoTen){
        return $this->db->pdo_last_insert_id("INSERT INTO donhang (`id_tk`,`PhuongThucTT`,`Email`,`ghiChu`,`Phone`,`hoTen`) VALUES (?,?,?,?,?   ,?)",$id_tk,$PhuongThucTT,$Email,$ghiChu,$Phone,$hoTen);
    }
    // function TaoDonHang($maTK,$tongtien,$hoTen,$diachi,$sdt,$email,$ghiChu,$maDHRandom){
    //     return pdo_last_insert_id("INSERT INTO donhang (`maTK`,`tongtien`,`hoTen`,`diachi`,`sdt`,`email`,`ghiChu`,`maDHRandom`) VALUES (?,?,?,?,?,?,?,?)",$maTK,$tongtien,$hoTen,$diachi,$sdt,$email,$ghiChu,$maDHRandom);
    // }
    function addOrder($Id_Dh,$Id_Sp,$Price,$SoLuong){
        $this->db->pdo_execute("INSERT INTO donhangct (`Id_Dh`,`Id_Sp`,`Price`,`SoLuong`) VALUES (?,?,?,?)",$Id_Dh,$Id_Sp,$Price,$SoLuong);
    }

    // function get_luotmuaOrder(){
    //     return pdo_query("SELECT * FROM chitietdonhang ctdh INNER JOIN sanpham sp ON ctdh.maSP = sp.maSP WHERE SoLuong >= 5 ORDER BY SoLuong DESC LIMIT 4");
    // }
    
    function order_soluong($id_DH,$Id_Sp){
        $this->db->pdo_execute("UPDATE donhangct SET SoLuong = SoLuong + 1 WHERE id_DH = ? AND Id_Sp = ?", $id_DH ,$Id_Sp);
    }

    function get_order($Id_DH){
        return $this->db->get_all("SELECT * FROM donhang WHERE Id_DH = ?",$Id_DH);
    }

    function get_productOrder($Id_DH){
        return $this->db->get_all("SELECT * FROM donhangct ctdh INNER JOIN sanpham sp ON ctdh.Id_Sp = sp.Id_Sp INNER JOIN donhang dh ON ctdh.Id_DH=dh.Id_DH WHERE ctdh.Id_DH = ? ",$Id_DH);
    } // dh.TrangThai != 5 : làm cho đơn hàng đã hủy không show ra trong đơn hàng của tôi
    
}
?>