<?php
namespace App\Models;
class AdminModel{
    private $db;
    function __construct(){
        $this->db=new DatabaseModel;
    } 
    function get_adminproduct() {
        $sql = "SELECT * FROM sanpham ORDER BY Id_Sp Desc  ";
        return $this->db->get_all($sql);
    }
    function get_catagoryId() {
        $sql = "SELECT * FROM danhmuc ORDER BY Id_Dm Desc  ";
        return $this->db->get_all($sql);
    }
    function add_catagory($Name_Dm,$TrangThai,$Img){
        $sql = "INSERT INTO danhmuc (Name_Dm, TrangThai, Img) VALUES ('$Name_Dm', '$TrangThai', '$Img')";
        return $this->db->get_all($sql);
    }
    
    function adm_show_catagory($dssp){
        $html_show_catagory='';
     
        foreach($dssp as $item){
            extract($item);
            $herfsp=PROURL.'/public/img/shop/'.$Img;  // Assuming $Img is defined somewhere
            $link1 = PROURL."/cart/catagory/update/".$Id_Dm; // Assuming $Id_Dm is the ID of the category
            $link2 = PROURL.'/admin/catagory/delete/'.$Id_Dm;
            $html_show_catagory.='  <tr>
                <td>'.$Id_Dm.'</td>
                <td>'.$Name_Dm.'</td>
                <td>'.$TrangThai.'</td>
                <td><img src="'.$herfsp.'" alt="Category Image"></td>
                <td>
                    <a href="'.$link1.'" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                    <a href="'.$link2.'" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Xóa</a>
                </td>
            </tr>';
        }
        return $html_show_catagory;
    }
    
    function adm_show_product($dssp){
        $html_show_product='';
        $link1 = PROURL."/cart/product/update/";
        $link2 = PROURL."/cart/product/delete/";
        foreach($dssp as $item){
            extract($item);
            $imageSrc= PROURL.'/public/img/shop/'.$Img; 
            $html_show_product .= '<tr>
                <td>'.$Id_Sp.'</td>
                <td>'.$Name.'</td>
                <td>'.$Price.'VNĐ</td>
                <td><img src="'.$imageSrc.'" alt=""></td>
                <td>'.$NamSX.'</td>
                <td>'.$TrangThai.'</td>
                <td>'.$View.'</td>
                <td>'.$Sale.'</td>
                <td>
                    <a href="'.$link1.'" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                    <a href="'.$link2.'" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Xóa</a>
                </td>
            </tr>';
        }
        return $html_show_product;
    }
    
    
}


?>