<!DOCTYPE html>
<html lang="en">

<head>
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

    /* Style cho dropdown container */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Style cho button trigger */
    .dropbtn {
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    /* Style cho nút dropdown khi được hover */
    .dropbtn:hover,
    .dropbtn:focus {
        background-color: #3e8e41;
    }

    /* Style cho dropdown content (menu) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    /* Style cho các phần tử trong dropdown menu */
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Style cho các phần tử trong dropdown menu khi hover */
    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    /* Hiển thị dropdown content (menu) khi hover vào dropdown container */
    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Icon caret down */
    .fa-caret-down {
        float: right;
        padding-right: 5px;
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

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <!-- <div class="offcanvas__cart">
            <div class="offcanvas__cart__links">
                <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
                <a href="#"><img src="<?=PROURL?>/public/img/icon/heart.png" alt=""></a>
            </div>
            <div class="offcanvas__cart__item">
                <a href="<?= PROURL ?>/product/cart"><img src="<?=PROURL?>/public/img/icon/cart.png" alt="">
                </a>

            </div>
        </div> -->
        <div class="offcanvas__logo">
            <a href="<?=PROURL?>"><img src="<?=PROURL?>/public/img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__option">
            <ul>

                <li><a href="#">Sign in</a> <span class="arrow_carrot-down"></span></li>
            </ul>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
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
                                    <a class="dropdown-item" href="<?=PROURL?>/user/myaccount">Tài Khoản của tôi</a>
                                </div>
                            </div>
                            <?php else: ?>

                            <a class="dropdown-item" href="<?=PROURL?>/user/login">Đăng nhập</a>
                            <?php endif; ?>

                            <div class="header__logo">
                                <a href="./index.html"><img src="<?=PROURL?>/public/img/logo.png" alt=""></a>
                            </div>
                            <div class="header__top__right">
                                <div class="header__top__right__links">

                                </div>
                                <div class="header__top__right__cart">
                                    <a href="<?= PROURL ?>/product/cart"><img src="<?=PROURL?>/public/img/icon/cart.png"
                                            alt="">
                                        <span>0</span></a>
                                    <div class="cart__price">Giỏ hàng: <span>$0.00</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas__open"><i class="fa fa-bars"></i></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="<?=PROURL?>/">Trang Chủ</a></li>
                            <li><a href="<?= PROURL ?>/product">Sản Phẩm</a></li>

                            <li><a href="<?=PROURL?>/contact">Trang Thông Tin</a></li>

                            <!-- <li><a href="#">###</a>
                                <ul class="dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./wisslist.html">Wisslist</a></li>
                                    <li><a href="./Class.html">Class</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li> -->
                            <li><a href="<?=PROURL?>">Bài Viết</a></li>
                            <li><a href="<?=PROURL?>">Liên Hệ</a></li>
                            <li>
                                <form action="search.php" method="post">
                                    <input name="kyw" placeholder="  Tìm kiếm...">
                                    <button class="btn " type="submit" name="btnsearch"><i class="fa fa-search"></i>
                                    </button>
                                </form>
                            </li>
                        </ul>

                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->

</body>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
</script>

</html>