<?php require_once("header.php")?>
<div class="container " style="margin-top:250px;">

    <h1>Thông tin người đặt hàng</h1>
    <table class="table">

        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Số điện thoại</th>

                <th>Ghi chú</th>
                <th>Tổng tiền</th>
                <th>Ngày đặt</th>
                <th>Phương thức thanh toán</th>
            </tr>
        </thead>


        <tbody>
            <?php $viewdonhang = $data['viewdonhang']; foreach($viewdonhang as $item): extract($item) ?>
            <tr>
                <td><?=$hoTen?></td>
                <td><?=$Email?></td>
                <td><?=$Phone?></td>
                <td><?=$ghiChu?></td>
                <td><?=number_format($tongtien,"0",",",".")?></td>
                <td><?=$ngaydat?></td>
                <td><?=$thanhtoan?></td>
            </tr>
            <?php endforeach; ?>


        </tbody>
    </table>
    <h1>Thông tin đơn hàng</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
            </tr>

        </thead>
        <tbody>
            <?php $viewspdonhang = $data['viewspdonhang']; foreach($viewspdonhang as $item): extract($item); $thanhtien=$giaSP*$SoLuong; ?>
            <tr>
                <th><img src="<?=PROURL?>/public/img/shop<?=$img?>" alt=""
                        style="width:50px;border-radius:50%;height:50px;margin-right:10px"><?=$tenSP?></th>
                <th><?=$giaSP?></th>
                <th><?=$SoLuong?></th>
                <th><?=number_format($thanhtien,"0",",",".")?></th>

            </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
    <button><a href="<?=PROURL?>">Quay lại trang chủ</a></button>

</div>


<?php require_once("footer.php")?>