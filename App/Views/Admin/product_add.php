<?php 
include_once "headeradmin.php";?>
<?php
  $data=$data["danhmuc_all"];
  $html_danhmuc='';
  foreach ($data as $item) {
    extract($item);
    $html_danhmuc.='<option value="'.$Id_Dm.'">'.$Name_Dm.'</option>';
  }
?>

<div class="container-fluid">
    <div class="container">
        <div class="card p-3" style="margin: 0 auto !important; width:600px !important">
            <div class="card-body">

                <h5 class="card-title fw-semibold mb-4">Thêm sản phẩm</h5>
                <div class="card mb-0">
                    <div class="card-body">
                        <form method="post" action="<?=PROURL?>/admin/addproduct" enctype="multipart/form-data">
                            <fieldset>
                                <div class="mb-3">
                                    <label for="" class="form-label">Danh mục</label>
                                    <select id="Id_Dm" name="Id_Dm" class="form-select">
                                        <option value="0">Vui lòng chọn danh mục</option>
                                        <?=$html_danhmuc?>
                                        <!-- <option value="1">Áo</option>
                            <option value="2">Quần</option>
                            <option value="3">Áo khoác</option> -->
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Tên sản phẩm</label>
                                    <input type="text" id="Name" name="Name" class="form-control"
                                        placeholder="Nhập tên sản phẩm cụ thể">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Hình ảnh</label>
                                    <input type="file" id="Img" name="Img" class="form-control" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Giá</label>
                                    <input type="text" id="Price" name="Price" class="form-control"
                                        placeholder="Ex: 100000 tương ứng 100.000 vnđ">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Tiêu Đề</label>
                                    <input type="text" id="TieuDe" name="TieuDe" class="form-control"
                                        placeholder="Mô tả ....">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Nội Dung</label>
                                    <input type="text" id="NoiDung" name="NoiDung" class="form-control"
                                        placeholder="NoiDung ....">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Năm Sản Xuất</label>
                                    <input type="text" id="NamSX" name="NamSX" class="form-control"
                                        placeholder="NamSX....">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Sale</label>
                                    <input type="text" id="Sale" name="Sale" class="form-control"
                                        placeholder="Sale....">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Trạng thái sản phẩm</label>
                                    <select id="TrangThai" name="TrangThai" class="form-select">
                                        <option value="0">Vui lòng chọn</option>
                                        <option value="1">An</option>
                                        <option value="2">Hien</option>

                                    </select>
                                </div>

                                <button type="submitproduct" name="submitproduct" class="btn btn-primary">Thêm</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>