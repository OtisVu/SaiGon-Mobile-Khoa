<?php
session_start();
ob_start();
// include_once("model/connectdb.php");
$conn = mysqli_connect("localhost", "root", "", "saigon_mobile");
if (!isset($_SESSION['MaKhachHang']) || empty($_SESSION['MaKhachHang'])) {
    header('location: index.php');
    exit();
}
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_unset(); // Xóa tất cả các biến trong session
    session_destroy(); // Hủy session
    header('location: index.php'); // Chuyển hướng về trang login.php
    exit();
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lịch sử mua hàng</title>
 <!-- Google Font -->
 <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href=".css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href=".css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="./css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="./css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href=".css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="./css/xemsanpham12.css" type="text/css">
    <link rel="stylesheet" href="./css/index.css" type="text/css">
    <link rel="stylesheet" href="./css/home1.css">
    <link rel="stylesheet" href="./css/contact.css">
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
    <style>
        
.shoping-cart {
	padding-top: 80px;
	padding-bottom: 80px;
}

.shoping__cart__table {
	margin-bottom: 30px;
}

.shoping__cart__table table {
	width: 100%;
	text-align: center;
}

.shoping__cart__table table thead tr {
	border-bottom: 1px solid #ebebeb;
}

.shoping__cart__table table thead th {
	font-size: 20px;
	font-weight: 700;
	color: #1c1c1c;
	padding-bottom: 20px;
}

.shoping__cart__table table thead th.shoping__product {
	text-align: left;
}

.shoping__cart__table table tbody tr td {
	padding-top: 30px;
	padding-bottom: 30px;
	border-bottom: 1px solid #ebebeb;
}

.shoping__cart__table table tbody tr td.shoping__cart__item {
	width: 630px;
	text-align: left;
}

.shoping__cart__table table tbody tr td.shoping__cart__item img {
	display: inline-block;
	margin-right: 25px;
	width: 100px !important;
	height: 100px !important;
}

.shoping__cart__table table tbody tr td.shoping__cart__item h5 {
	color: #1c1c1c;
	display: inline-block;
}

.shoping__cart__table table tbody tr td.shoping__cart__price {
	font-size: 18px;
	color: #1c1c1c;
	font-weight: 700;
	width: 100px;
}

.shoping__cart__table table tbody tr td.shoping__cart__total {
	font-size: 18px;
	color: #1c1c1c;
	font-weight: 700;
	width: 110px;
}

.shoping__cart__table table tbody tr td.shoping__cart__item__close {
	text-align: right;
}

.shoping__cart__table table tbody tr td.shoping__cart__item__close span {
	font-size: 24px;
	color: #b2b2b2;
	cursor: pointer;
}

.shoping__cart__table table tbody tr td.shoping__cart__quantity {
	width: 225px;
}

.shoping__cart__table table tbody tr td.shoping__cart__quantity .pro-qty {
	width: 120px;
	height: 40px;
}

.shoping__cart__table table tbody tr td.shoping__cart__quantity .pro-qty input {
	color: #1c1c1c;
}

.shoping__cart__table table tbody tr td.shoping__cart__quantity .pro-qty input::placeholder {
	color: #1c1c1c;
}

.shoping__cart__table table tbody tr td.shoping__cart__quantity .pro-qty .qtybtn {
	width: 15px;
}

.primary-btn.cart-btn {
	color: #6f6f6f;
	padding: 14px 30px 12px;
	background: #f5f5f5;
}

.primary-btn.cart-btn span {
	font-size: 14px;
}

.primary-btn.cart-btn.cart-btn-right {
	float: right;
}

.shoping__discount {
	margin-top: 45px;
}

.shoping__discount h5 {
	font-size: 20px;
	color: #1c1c1c;
	font-weight: 700;
	margin-bottom: 25px;
}

.shoping__discount form input {
	width: 255px;
	height: 46px;
	border: 1px solid #cccccc;
	font-size: 16px;
	color: #b2b2b2;
	text-align: center;
	display: inline-block;
	margin-right: 15px;
}

.shoping__discount form input::placeholder {
	color: #b2b2b2;
}

.shoping__discount form button {
	padding: 15px 30px 11px;
	font-size: 12px;
	letter-spacing: 4px;
	background: #6f6f6f;
}

.shoping__checkout {
	background: #f5f5f5;
	padding: 30px;
	padding-top: 20px;
	margin-top: 50px;
}

.shoping__checkout h5 {
	color: #1c1c1c;
	font-weight: 700;
	font-size: 20px;
	margin-bottom: 28px;
}

.shoping__checkout ul {
	margin-bottom: 28px;
}

.shoping__checkout ul li {
	font-size: 16px;
	color: #1c1c1c;
	font-weight: 700;
	list-style: none;
	overflow: hidden;
	border-bottom: 1px solid #ebebeb;
	padding-bottom: 13px;
	margin-bottom: 18px;
}

.shoping__checkout ul li:last-child {
	padding-bottom: 0;
	border-bottom: none;
	margin-bottom: 0;
}

.shoping__checkout ul li span {
	font-size: 18px;
	color: #dd2222;
	float: right;
}

.shoping__checkout .primary-btn {
	display: block;
	text-align: center;
}
.header__top__left {
            cursor: pointer;
        }

        .header__top__left:hover {
            animation: jump 0.3s linear forwards;
        }

        @keyframes jump {
            0% {
                transform: translateY(0);
            }
            25% {
                transform: translateY(-3px);
            }
            50% {
                transform: translateY(0);
            }
            75% {
                transform: translateY(-3px);
            }
            100% {
                transform: translateY(0);
            }
        }
    </style>
    <script>
        document.getElementById("header-top-left").addEventListener("click", function() {
            this.style.cursor = "-webkit-grab";
            this.style.cursor = "grab";
});

    </script>
</head>

<body>
    <!-- Page Preloder -->
     <div id="preloder">
        <div class="loader"></div>
    </div>
    <?php
    include_once('./controller/cOrderManage.php');
    include_once('./view/vOrderManage.php');

    $c = new COrderManager();
    $v = new VOrderManager();

    ?>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="header__top__left" style="margin-left: 60px;">                       
                            <ul>
                                <li style="font-family: Cairo, sans-serif; font-size: 15px;"><i class="fa fa-envelope"></i> &nbsp SaiGon_Mobile@gmail.com</li>
                                <li style="font-family: Cairo, sans-serif; font-size: 15px;">Miễn phí vận chuyển khi đăng ký thành viên</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="./view/capnhatttcn.php"><i class="fa fa-user"></i></a>
                                <a href="contact.php"><i class="fa fa-phone"></i></a>
                                <a href="cart.php"><i class="fa fa-shopping-bag"></i></a>
                            </div>

                            <div class="header__top__right__auth">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" 
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php
                                        if (isset($_SESSION['MaKhachHang'])) {
                                            $tenTaiKhoan = $_SESSION['MaKhachHang'];
                                            $name = mysqli_query($conn, "SELECT * FROM `khachhang` WHERE `MaKhachHang`= $tenTaiKhoan");
                                            $kq = mysqli_fetch_array($name);
                                            echo $kq["HoTen"];
                                        }
                                        ?>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="view/capnhatttcn.php">Cập nhật thông tin</a>
                                        <a class="dropdown-item" href="view/doimatkhau.php">Đổi mật khẩu</a>
                                        <a class="dropdown-item" href="?action=logout">Đăng xuất</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./indexuser.php"><img src="./img/logo_saigon.png" alt=""></a>
                    </div>
                </div>

                <div class="hero__search">
                <div class="hero__search__form" style="margin-left: 100px;margin-top: 70px;">
                    <form action="#">
                        <input type="text" name="search" placeholder="Nhập sản phẩm cần tìm.">
                        <button type="submit" class="site-btn">TÌM</button>
                    </form>
                </div>
            </div>

                <div class="col-lg-12">
                <nav class="header__menu">
                    <ul>
                        <li><a href="indexuser.php">Trang Chủ</a>
                        
                        <li><a href="shop.php">Sản Phẩm</a></li>
                        <li><a href="contact.php">Liên Hệ</a></li>
                        <li><a href="chinhsach.php">Chính Sách</a></li>
                        <li><a href="#">Quản lý mua hàng  </a>
                            <ul class="header__menu__dropdown">
                                <li><a href="cart.php">Đặt hàng</a></li>
                                <li><a href="orderManage.php">Xem lịch sử mua hàng</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    <br>

    <!-- Breadcrumb Section Begin -->
    <header>
	<h1>Lịch sử mua hàng</h1>
</header>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Đơn hàng - Địa chỉ</th>
                                    <th>Ngày tạo</th>
                                    <th>Mã đơn</th>
                                    <th>Thành tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                

                                <?php
                                $v->viewAllOrder();

                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Shoping Cart Section End -->
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/logo_saigon.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 2NVB , Q.GV , TPHCM</li>
                            <li>Phone: 0328710708</li>
                            <li>Email: vudinhkhoa2k2@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Sài Gòn Mobile</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Sài Gòn Mobile xin chân thành cảm ơn <i class="fa fa-heart" aria-hidden="true"></i>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>


</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</html>