<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="<?=PROURL?>/public/assets/css/main.css">
    <script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php 
 if($titlepage!="") echo $titlepage;

    else echo"Commission";
    ?>
    </title>
    <style>
    /* CSS để tạo dropdown */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    td img {
        max-height: 80px;
        vertical-align: middle;
    }
    </style>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- font awesome cdn -->
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?=PROURL?>/public/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?=PROURL?>/public/css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="<?=PROURL?>/public/css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="<?=PROURL?>/public/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?=PROURL?>/public/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?=PROURL?>/public/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?=PROURL?>/public/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?=PROURL?>/public/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?=PROURL?>/public/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?=PROURL?>/public/css/style.css" type="text/css">
</head>
<nav class="sidebar bg-primary">
    <ul>
        <li>
            <a href="<?=PROURL?>/admin"><i class="fa-solid fa-house ico-side"></i>Dashboards</a>
        </li>
        <li>
            <a href="<?=PROURL?>/admin/catagory"><i class="fa-solid fa-cart-shopping ico-side"></i>Quản kí
                danh
                mục</a>
        </li>
        <li>
            <a href="<?=PROURL?>/admin/product"><i class="fa-solid fa-folder-open ico-side"></i>Quản lí sản
                phẩm</a>
        </li>

        <li>
            <a href="<?=PROURL?>/admin/user"><i class="fa-solid fa-user ico-side"></i>Quản lí thành viên</a>
        </li>
        <li>
            <a href="<?=PROURL?>/admin/oder"><i class="fa-solid fa-user ico-side"></i>Quản lí đơn hàng</a>
        </li>
        <li>
            <div class="col-lg-12">
                <div class="header__top__inner">
                    <?php if(isset($_SESSION['user'])): ?>
                    <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn">
                            <?= isset($_SESSION['user']['hoTen']) ? $_SESSION['user']['hoTen'] : 'User' ?>
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div id="" class="dropdown-content">
                            <a class="dropdown-item" href="<?=PROURL?>/user/logout">Đăng xuất</a>
                        </div>
                    </div>
                    <?php else: ?>

        <li><a class="dropdown-item" href="<?=PROURL?>/user/login">Đăng nhập</a></li>
        <?php endif; ?>

        </div>
        </div>
        </li>
    </ul>
</nav>