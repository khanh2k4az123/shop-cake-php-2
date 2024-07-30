<?php 
namespace App\Models;
class CatalogModel{
    private $db;
    function __construct(){
        $this->db=new DatabaseModel;
    }
    function catalog_get_all(){
        $sql="SELECT * FROM danhmuc order by id_Dm desc";
        return $this->db->get_all($sql);
        }
        function insert_category($Name_Dm, $TrangThai, $Img) {
            $sql = "INSERT INTO danhmuc (Name_Dm, TrangThai, Img) 
                    VALUES ('$Name_Dm', '$TrangThai', '$Img')";
            $this->db->pdo_insert($sql);
        }
        
        function sanpham_get_all_catalog($idcatalog,$limit,$sottrang){
            $sql="SELECT * FROM sanpham where 1";
            if($idcatalog>0){
                $sql.=" AND id_Dm= ".$idcatalog;
            }
            return $this->db->get_all($sql);
        }
        function catagory_delete($Id_Dm) {
            return $this->db->pdo_execute("DELETE FROM danhmuc WHERE Id_Dm = ?".$Id_Dm);
        }
        function catagory_getone($Id_Dm){
            return $this->db->get_one("SELECT * FROM donhang danhmuc Id_Dm = ?",$Id_Dm);
        }
        function update_catagory($Name_Dm,$TrangThai,$Img) {
            $this->db->pdo_execute("UPDATE danhmuc SET Name_Dm = ?, TrangThai = ?, Img = ? WHERE Id_Dm = ?",
            $Name_Dm, $TrangThai, $Img);
        }
    
    }

?>