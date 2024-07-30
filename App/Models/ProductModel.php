<?php
namespace App\Models;
class ProductModel{
    private $db;
    function __construct(){
        $this->db=new DatabaseModel;
    }
    function insert_product($Id_Dm,$Name,$Price,$Img,$TieuDe,$NoiDung,$TrangThai,$Sale,$NamSX){
        $sql = "INSERT INTO sanpham (Id_Dm, Name, Price, Img, TieuDe, NoiDung, TrangThai, Sale, NamSX) 
        VALUES ('$Id_Dm', '$Name', '$Price', '$Img', '$TieuDe', '$NoiDung', '$TrangThai', '$Sale', '$NamSX')";
        $this->db->pdo_insert($sql);
      }
    
    function sanpham_get_all($view, $limit, $Sale) {
        $sql = "SELECT * FROM sanpham WHERE 1";
    
        if ($view > 0) {
            $sql .= " ORDER BY View DESC LIMIT " . $limit;
        } elseif ($Sale > 0) {
            $sql .= " AND Sale > 0 ORDER BY Sale DESC LIMIT " . $limit;
        } else {
            $sql .= " ORDER BY Id_Sp DESC LIMIT " . $limit;
        }
    
        return $this->db->get_all($sql);
    }
    
    function sanpham_get_one($id){
    
            $sql="SELECT * FROM sanpham where Id_Sp=?";
            return $this->db->get_one($sql,$id);

    }
    function sanpham_get_all_cta() {
        $sql = "SELECT * FROM sanpham ORDER BY Id_Sp";
        return $this->db->get_all($sql);
    }
    function sanpham_get_all_catalog($kyw, $idcatalog, $limit, $page) {
        if ($page == "" || $page == 0) $page = 1; 
        $batdau = ($page - 1) * $limit;
        $sql = "SELECT * FROM sanpham WHERE 1";
    
        if ($idcatalog > 0) {
            $sql .= " AND Id_Dm = " . $idcatalog; 
        }
    
        if ($kyw != "") {
      
            $sql .= " AND  Name LIKE '%" . $kyw . "%'";
        }
    
        $sql .= " ORDER BY Id_Sp DESC LIMIT " . $batdau . "," . $limit;
    
        return $this->db->get_all($sql);
        
    }
    
    function sanpham_page($dssp,$limit){
        $tongsanpham = count($dssp);
        $page  = ceil($tongsanpham / $limit);
        $html_page = "";
        for ($i = 1;$i<=$page; $i++ ){
            $html_page .= '<a href="' .PROURL. '/product/page/' . $i . '">' . $i . '</a>';

            
        }   
        return $html_page;
    }
    function sanpham_search($keyword){
        $sql = "SELECT * FROM sanpham WHERE Name LIKE '%keyword%'";
        return $this->db->get_all($sql);
    }
    function product_lienquanRanDom($Id_Dm){
        return $this->db->get_all("SELECT * FROM sanpham WHERE Id_Dm = ? ORDER BY rand() LIMIT 4",$Id_Dm);
    }
    
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function sanpham_show($dssp){
$html_dssp_home='';
foreach($dssp as $item){
extract($item);
$herfsp=PROURL.'/public/img/shop/'.$Img; 
$link = PROURL."/product/detail/". $Id_Sp;
$html_dssp_home.='
<div class="col-lg-3 col-md-6 col-sm-6">
<form action="'.PROURL.'/product/cart" method="post">
    <input type="hidden" name="Id_Sp" value="'.$Id_Sp.'">
    <input type="hidden" name="Img" value="'.$Img.'">
    <input type="hidden" name="Price" value="'.$Price.'">
    <input type="hidden" name="Name" value="'.$Name.'">
    <input type="hidden" name="SoLuong" value="1">
    <div class="product__item">
        <div name="Img" class="product__item__pic set-bg" data-setbg="'.$herfsp.'">
        </div>
        <div class="product__item__text">
            <h6><a href="'.$link.'">'.$Name.'</a></h6>
            <div class="product__item__price">'.$Price.'VNĐ</div>
            <div class="cart_add">
                <input type="submit" value="Mua ngay" name="submitaddtocart">
            </div>
        </div>
    </div>
</form>
 
</div>
 ';
}
return $html_dssp_home;
}
//show san pham view
function sanpham_show_most_viewed($dssp){
$html_dssp_view='';
foreach($dssp as $item){
extract($item);
$link = PROURL."/product/detail/". $Id_Sp;

$html_dssp_view.='
<div class="col-lg-3 col-md-6 col-sm-6">
<form action="'.PROURL.'/product/cart" method="post">
    <input type="hidden" name="Id_Sp" value="'.$Id_Sp.'">
    <input type="hidden" name="Img" value="'.$Img.'">
    <input type="hidden" name="Price" value="'.$Price.'">
    <input type="hidden" name="Name" value="'.$Name.'">
    <input type="hidden" name="SoLuong" value="1">
    <div class="product__item">
        <div name="Img" class="product__item__pic set-bg" data-setbg="'.PROURL.'/public/img/shop/'.$Img.'">
        <div class="product__label">
                <span>('.$View.')Lượt xem</span>
            </div>
        </div>
        <div class="product__item__text">
            <h6><a href="'.$link.'">'.$Name.'</a></h6>
            <div class="product__item__price">'.$Price.'VNĐ</div>
            <div class="cart_add">
                <input type="submit" value="Mua ngay" name="submitaddtocart">
            </div>
        </div>
    </div>
</form>

</div>';
}
return $html_dssp_view;
}
//
function sanpham_sale($dssp) {
$html_dssp_sale = '';
foreach($dssp as $item){
extract($item);
$GiaGiam = ceil($Price * (1 - $Sale / 100));

$link = PROURL."/product/detail/". $Id_Sp;
$html_dssp_sale.='
<div class="col-lg-3 col-md-6 col-sm-6">
<form action="'.PROURL.'/product/cart" method="post">
    <input type="hidden" name="Id_Sp" value="'.$Id_Sp.'">
    <input type="hidden" name="Img" value="'.$Img.'">
    <input type="hidden" name="Price" value="'.$Price.'">
    <input type="hidden" name="Name" value="'.$Name.'">
    <input type="hidden" name="SoLuong" value="1">
    <div class="product__item">
        <div name="Img" class="product__item__pic set-bg" data-setbg="'.PROURL.'/public/img/shop/'.$Img.'">
        <div class="product__label">
                <span>['.$Sale.']%</span>
            </div>
        </div>
        <div class="product__item__text">
            <h6><a href="'.$link.'">'.$Name.'</a></h6>
            <div class="product__item__price"><del>'.$Price.'</del><br>'.$GiaGiam.'VNĐ </div>
            <div class="cart_add">
                <input type="submit" value="Mua ngay" name="submitaddtocart">
            </div>
        </div>
    </div>
</form>

</div>';

}

return $html_dssp_sale;
}
}


?>