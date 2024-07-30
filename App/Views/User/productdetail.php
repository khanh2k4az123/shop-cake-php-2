<?php require_once "header.php";?>
<?php 
extract($data['detail']);
?>
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product__details__img">
                    <div class="product__details__big__img">
                        <img class="big_img" src="<?=PROURL?>/public/img/shop/<?=$Img?>" alt="">
                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="product__details__text">
                    <div class="product__label">Tên Sản Phẩm :<?=$Name?></div>

                    <h5>Giá Sản Phẩm :<?=$Price?> VNĐ</h5>
                    <p> Tiêu Đề:<?=$TieuDe?></p>
                    <ul>
                        <li>Sản xuất năm: <span><?=$NamSX?></span></li>
                        <!-- <li>Danh Mục:<span></span></li> -->

                    </ul>
                    <div class="product__details__option">
                        <div class="quantity">

                        </div>
                        <input type="submit" value="Mua Ngay" class="primary-btn">

                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__tab">
            <div class="col-lg-12">

                <div class="tab-content">
                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-8">
                                <p> Nội Dung<?=$NoiDung?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Details Section End -->

<!-- Related Products Section Begin -->
<section class="related-products spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>Sản phẩm liên quang</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="related__products__slider owl-carousel">

                <?php
                       $lienquan_product = $data['productRelate'];
                       foreach($lienquan_product as $item){
                        echo ' 
                        <form action="'.PROURL.'/product/cart" method="post">
                        <div class="col-lg-3"> 
                        <input type="hidden" name="Id_Sp" value="'.$Id_Sp.'">
                        <input type="hidden" name="Img" value="'.$Img.'">
                        <input type="hidden" name="Price" value="'.$Price.'">
                        <input type="hidden" name="Name" value="'.$Name.'">
                        <input type="hidden" name="SoLuong" value="1">
                        <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="'.PROURL.'/public/img/shop/'.$item['Img'].'">
                            <div class="product__label">
                               
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">'.$item['Name'].'</a></h6>
                            <div class="product__item__price">'.$item['Price'].'</div>
                            <div class="cart_add">
                            <input type="submit" value="Mua ngay" name="submitaddtocart">
                            </div>
                        </div>
                        </div>
                    </div>
                    </form>';
                       }
                    ?>


            </div>
        </div>
    </div>
</section <?php require_once "footer.php";?>