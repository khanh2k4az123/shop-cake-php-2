<!DOCTYPE html>
<html lang="en">
<?php
include_once "headeradmin.php";
$sanphamall = $data["sanpham_all"];
$homepage = new App\Models\AdminModel;
$html_show_product = $homepage->adm_show_product($sanphamall); 


?>

<body>
    <div class="container-fluid main-page">
        <div class="app-main">

            <div class="main-content">
                <h3 class="title-page">Sản phẩm</h3>
                <div class="d-flex justify-content-end">
                    <a href="<?=PROURL?>/admin/addproductform" class=" btn btn-primary mb-2">Thêm danh mục</a>
                </div>
                <table id="example" class="table table-striped" style="width: 100%">
                    <thead>
                        <tr>

                            <th>Số Thứ Tự</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá Sản Phẩm</th>
                            <th>Hình Ảnh</th>
                            <th>Năm Sản Xuất</th>
                            <th>Trang Thái</th>
                            <th>View</th>
                            <th>Sale</th>
                            <th>Thực Thi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $html_show_product;?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <script src="assets/js/main.js"></script>
    <script>
    new DataTable("#example");
    </script>
</body>

</html>