<!DOCTYPE html>
<html lang="en">

<?php
include_once "headeradmin.php";
$danhmucall = $data["danhmuc_all"];
$homepage = new App\Models\AdminModel;
$html_show_catagory = $homepage->adm_show_catagory($danhmucall); 

?>

<body>
    <div class="container-fluid main-page">
        <div class="app-main">
            <div class="main-content">
                <h3 class="title-page">
                    Danh mục
                </h3>
                <div class="d-flex justify-content-end">
                    <a href="<?=PROURL?>/admin/addcatagoryform" class=" btn btn-primary mb-2">Thêm danh mục</a>
                </div>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Số Thứ Tự</th>
                            <th>Tên Danh Mục</th>
                            <th>Trạng Thái</th>
                            <th>Hình Ảnh</th>
                            <th>Chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $html_show_catagory;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="assets/js/main.js"></script>
    <script>
    new DataTable('#example');
    </script>
</body>

</html>