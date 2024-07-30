<?php require_once("header.php")?>

<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control p-3" placeholder="keywords"
                        aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->


<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Checkout</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item active text-white">Checkout</li>
    </ol>
</div>
<!-- Single Page Header End -->

<!-- Checkout Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="mb-4">Billing details</h1>
        <?php if(isset($_SESSION['user'])): ?>
        <form action="" method="POST">
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Username<sup>*</sup></label>
                                <input type="text" name="hoTen" value="<?=$_SESSION["user"]["hoTen"]?>"
                                    class="form-control">
                            </div>
                        </div>

                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Phone<sup>*</sup></label>
                        <input type="text" name="SoDienThoai" value="<?=$_SESSION["user"]["SoDienThoai"]?>"
                            class="form-control">
                    </div>


                    <div class="form-item">
                        <label class="form-label my-3">Email<sup>*</sup></label>
                        <input type="tel" name="email" value="<?=$_SESSION["user"]["email"]?>" class="form-control">
                    </div>


                    <div class="form-item">
                        <textarea name="text" class="form-control" spellcheck="false" cols="30" rows="11"
                            placeholder="Oreder Notes (Optional)"></textarea>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-5">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Products</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  $tongtien=0; foreach($_SESSION['mygiohang'] as $item):
                                    extract($item);
                                   
                                    $thanhtien=$SoLuong * $Price;
                                    $tongtien += $thanhtien;
                                    ?>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center mt-2">
                                            <img src="<?=PROURL?>/public/img/shop/<?=$Img?>"
                                                class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;"
                                                alt="">
                                        </div>
                                    </th>
                                    <td class="py-5"><?=$Name?></td>
                                    <td class="py-5"><?=number_format($Price,"0",",",".")?></td>
                                    <td class="py-5"><?=$SoLuong?></td>
                                    <td class="py-5"><?=number_format($thanhtien,"0",",",".")?></td>
                                </tr>
                                <?php endforeach; ?>
                                <input type="hidden" name="tongtien" value="<?=$tongtien?>" class="form-control">



                                <tr>
                                    <th scope="row">
                                    </th>
                                    <td class="py-5">
                                        <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                    </td>
                                    <td class="py-5"></td>
                                    <td class="py-5"></td>
                                    <td class="py-5">
                                        <div class="py-3 border-bottom border-top">
                                            <p class="mb-0 text-dark"><?=number_format($tongtien,"0",",",".")?></p>
                                        </div>
                                        <p>Phương thức thanh toán</p>
                                        <select name="thanhtoan" id="paymentMethod" class="form-control">
                                            <option value="">Chọn phương thức thanh toán</option>
                                            <option value="1">Trả tiền mặt khi nhận hàng</option>
                                            <option value="2">Thanh toán bằng VNPAY</option>
                                            <option value="3">Thanh toán bằng MoMo</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                        <button type="submit"
                            class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Place
                            Order</button>
                    </div>
                </div>
            </div>
        </form>
        <?php endif; ?>

    </div>
</div>
<!-- Checkout Page End -->
<?php require_once("footer.php")?>