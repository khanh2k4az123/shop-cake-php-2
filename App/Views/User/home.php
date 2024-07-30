<?php
require_once("header.php");
?><?php
$dssp_new = $data["new_product"];
$dssp_view = $data["view_product"];
$dssp_sale = $data["sale_product"];
$homepage = new App\Models\ProductModel;
$html_dssp_home=$homepage->sanpham_show($dssp_new);
$html_dssp_view=$homepage->sanpham_show_most_viewed($dssp_view);
$html_dssp_sale=$homepage->sanpham_sale($dssp_sale);
?>
<!DOCTYPE html>
<html lang="zxx">


<body>
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__item set-bg" data-setbg="public/img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">

                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__item set-bg" data-setbg="public/img/class/class-2.jpg">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <div class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-029-cupcake-3"></span>
                            <h5>Cupcake</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-034-chocolate-roll"></span>
                            <h5>Butter</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-005-pancake"></span>
                            <h5>Red Velvet</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-030-cupcake-2"></span>
                            <h5>Biscuit</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-006-macarons"></span>
                            <h5>Donut</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-006-macarons"></span>
                            <h5>Cupcake</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Categories Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">

        <div class="container">

            <h2>Sản Phẩm Mới</h2>

            <div class="row">

                <?php echo $html_dssp_home?>

            </div>
        </div>
        <div class="container">
            <h2>Sản Phẩm Nhiều lượt xem </h2>
            <div class="row">

                <?php echo $html_dssp_view?>

            </div>
        </div>
        <div class="container">
            <h2>Sản Phẩm Giảm Giá </h2>
            <div class="row">

                <?php echo $html_dssp_sale?>

            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Class Section Begin -->

    <!-- Class Section End -->

    <!-- Team Section Begin -->

    <!-- Instagram Section End -->

    <!-- Map Begin -->

    <!-- Map End -->
    <section class="instagram spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 p-0">
                    <div class="instagram__text">
                        <div class="section-title">
                            <span>Theo dỗi tôi trên instagram</span>
                            <h2>Bánh kẹo,đồ ăn vặt an toàn .</h2>
                        </div>
                        <h5><i class="fa fa-instagram"></i> @IraKanji</h5>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="public/img/instagram/instagram-1.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic middle__pic">
                                <img src="public/img/instagram/instagram-2.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="public/img/instagram/instagram-3.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="public/img/instagram/instagram-4.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic middle__pic">
                                <img src="public/img/instagram/instagram-5.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="public/img/instagram/instagram-3.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
require_once("footer.php");
?>

</body>

</html>