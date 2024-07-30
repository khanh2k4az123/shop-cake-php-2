<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
    /* General Styles */
    body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        /* Full height of the viewport */
        background-color: #f4f4f4;
    }

    /* Form Styles */
    .boxcenter {
        width: 300px;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
    }

    .form__login {
        position: relative;
        margin-bottom: 15px;
    }

    input[type="text"],
    input[type="password"],
    select {
        width: calc(100% - 30px);
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background: transparent;
        background-image: url('data:image/svg+xml;utf8,<svg fill="#7FAD39" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9 11l3 3 3-3z"/></svg>');
        background-repeat: no-repeat;
        background-position: calc(100% - 10px) center;
    }

    .fa-user,
    .fa-signature,
    .fa-envelope,
    .fa-lock,
    .fa-location-dot,
    .fa-phone-flip {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
    }

    .submit {
        width: 100%;
        padding: 10px;
        background-color: #4caf50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .submit:hover {
        background-color: #45a049;
    }

    .form-bot-2 {
        text-align: center;
        margin-top: 15px;
    }

    .chtk {
        color: #007bff;
    }

    .chtk:hover {
        text-decoration: underline;
    }

    /* Alerts */
    .alert {
        width: 100%;
        padding: 10px;
        margin-top: 15px;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .alert-success {
        background-color: #dff0d8;
        color: #3c763d;
    }

    .alert-danger {
        background-color: #f2dede;
        color: #a94442;
    }
    </style>
</head>

<body>
    <div class="boxcenter">
        <h1><a href="">Đăng Ký</a></h1>
        <form action="" method="post">
            <div class="form-input">
                <div class="form__login">
                    <input type="text" name="hoTen" id="hoTen" placeholder="Hãy nhập họ tên">
                    <i class="fa-regular fa-user"></i>
                </div>
                <div class="form__login">
                    <input type="text" name="tenDangNhap" id="tenDangNhap" placeholder="Hãy nhập UserName">
                    <i class="fa-solid fa-signature"></i>
                </div>
                <div class="form__login">
                    <input type="text" name="email" id="email" placeholder="Hãy nhập Email">
                    <i class="fa-regular fa-envelope"></i>
                </div>
                <div class="form__login">
                    <input type="text" name="matKhau" id="matKhau" placeholder="Hãy nhập mật khẩu">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <div class="form__login">
                    <input type="text" name="DiaChi" id="DiaChi" placeholder="Hãy nhập Địa chỉ">
                    <i class="fa-sharp fa-regular fa-location-dot"></i>
                </div>
                <div class="form__login">
                    <input type="text" name="SoDienThoai" id="SoDienThoai" placeholder="Hãy nhập số điện thoại">
                    <i class="fa-solid fa-phone-flip"></i>
                </div>
                <div class="form__login">
                    <select name="GioiTinh" id="GioiTinh">
                        <option value="" selected disabled>Giới tính</option>
                        <option value="0">Nam</option>
                        <option value="1">Nữ</option>
                    </select>
                </div>

                <input type="submit" value="Đăng ký" class="submit">

                <div class="form-bot-2">
                    <a href="<?=PROURL?>/user/login" class="chtk">Bạn đã có tài khoản?</a>
                </div>
            </div>
        </form>
    </div>

    <?php if(isset($_SESSION['thongbao'])): ?>
    <div class="alert alert-success" role="alert">
        <?=$_SESSION['thongbao']?>
    </div>
    <?php endif; unset($_SESSION['thongbao']); ?>

    <?php if(isset($_SESSION['canhbaoEmail'])): ?>
    <div class="alert alert-danger" role="alert">
        <?=$_SESSION['canhbaoEmail']?>
    </div>
    <?php endif; unset($_SESSION['canhbaoEmail']); ?>

    <?php if(isset($_SESSION['canhbaoSDT'])): ?>
    <div class="alert alert-danger" role="alert">
        <?=$_SESSION['canhbaoSDT']?>
    </div>
    <?php endif; unset($_SESSION['canhbaoSDT']); ?>

</body>


</html>