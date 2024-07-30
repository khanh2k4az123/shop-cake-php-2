<?php 
include_once "headeradmin.php";?>

<body>
    <div class="container-fluid main-page">
        <div class="app-main">

            <div class="main-content">
                <h3 class="title-page">
                    Thêm Danh Mục
                </h3>

                <form method="post" action="<?=PROURL?>/admin/addcatagory" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Tên Danh mục</label>
                        <input type="text" id="Name_Dm" name="Name_Dm" class="form-control"
                            placeholder="Tên Danh mục ....">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Hình ảnh</label>
                        <input type="file" id="Img" name="Img" class="form-control" placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Trạng Thái</label>
                        <input type="text" id="TrangThai" name="TrangThai" class="form-control"
                            placeholder="Trạng Thái">
                    </div>
                    <div class=" form-group">
                        <button type="submitcatagory" name="submitcatagory" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

            <script>
            new DataTable('#example');
            </script>
</body>