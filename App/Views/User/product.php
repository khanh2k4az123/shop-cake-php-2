<?php require_once "header.php";?>
<?php
$dssp_new = $data["new_product"];
$homepage = new App\Models\ProductModel;
$html_dssp_home=$homepage->sanpham_show($dssp_new);
$catalog_list = $data["catalog_list"];
$html_catalog_list="";
foreach($catalog_list as $item){
    extract($item);
    $link = PROURL . '/catagory/' . $Id_Dm;
$html_catalog_list.='<li><a href="'. $link.'">'.$Name_Dm.'</a></li>';
$html_page = isset($data["html_page"]) ? $data["html_page"] : '';
}
?>

<section class="shop spad">
    <div class="container">
        <div class="shop__option">
            <div class="row">
                <div class="col-lg-7 col-md-7">
                    <div class="shop__option__search">
                        <ul>
                            <?php echo $html_catalog_list?>

                        </ul>


                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <?php echo $html_dssp_home?>
        </div>
        <div class="shop__last__option">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="shop__pagination">
                        <?php echo $html_page ;
                       ?>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>



<?php require_once "footer.php";?>