<?php
require_once("header.php");
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Giỏ hàng của tôi</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <?php if (!empty($_SESSION['mygiohang'])) : ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá tiền</th>
                                    <th>Xóa</th> <!-- Added delete column header -->
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    if (isset($_SESSION['mygiohang']) && is_array($_SESSION['mygiohang'])) :
                                        $id = 0; // dung de dinh vi minh se xoa no tai vi tri nao trong array
                                        $TongTien = 0; // Initialize total price variable
                                        foreach ($_SESSION['mygiohang'] as $item) :
                                            $ThanhTien = $item['SoLuong'] * $item['Price'];
                                            $linkdel = PROURL . "/cart/deleteId/" . $id;
                                            $TongTien += $ThanhTien; // Accumulate total price
                                    ?>

                                <tr>

                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="<?= PROURL ?>/public/img/shop/<?= $item['Img'] ?>" alt=""
                                                width="100">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6><?= $item['Name'] ?></h6>
                                        </div>
                                    </td>


                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="">
                                                <!-- Remove one of the decrement buttons -->
                                                <span class="dec qtybtn"><a
                                                        href="<?= PROURL ?>/cart/soLuongId/<?= $item['Id_Sp'] ?>/less">-</a></span>
                                                <input type="text" value="<?= $item['SoLuong'] ?>">
                                                <!-- Remove one of the increment buttons -->
                                                <span class="inc qtybtn"><a
                                                        href="<?= PROURL ?>/cart/soLuongId/<?= $item['Id_Sp'] ?>/more">+</a></span>
                                            </div>

                                        </div>
                                    </td>

                                    <td class="cart__price"><?= $item['Price'] ?></td>
                                    <td class="shoping__cart__item__close">
                                        <a href="<?= $linkdel ?>">x</a>
                                    </td>
                                </tr>
                                <?php
                                            $id++;
                                        endforeach;
                                    endif;
                                    ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="<?= PROURL ?>/">Tiếp tục mua sắm</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="<?= PROURL ?>/cart/deleteallcart"><i class="fa fa-spinner"></i> Xóa rỗng giỏ
                                    hàng</a>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__total">
                        <h6>Tổng tiền</h6>
                        <ul>
                            <li>Thành tiền <span><?= number_format($TongTien, "0", ",", ".") ?> đ</span></li>
                            <li>Tổng tiền <span><?= number_format($TongTien, "0", ",", ".") ?> đ</span></li>
                        </ul>
                        <a href="<?=PROURL?>/product/checkout" class="primary-btn">Thanh Toan</a>
                        <p>Phương thức thanh toán</p>
                        <select name="thanhtoan" id="paymentMethod" class="form-control">
                            <option value="">Chọn phương thức thanh toán</option>
                            <option value="1">Trả tiền mặt khi nhận hàng</option>
                            <option value="2">Thanh toán bằng VNPAY</option>
                            <option value="3">Thanh toán bằng MoMo</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <?php else : ?>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <img src="view/img/cartrong.png" alt="" style="width:80%;">
                </div>
                <div class="col-md-3">
                    <a href="" class=" primary-btn cart-btn">Quay lại trang chủ</a>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </section>
</body>
<?php require_once("footer.php"); ?>

</html>