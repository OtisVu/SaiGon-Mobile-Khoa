<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "saigon_mobile");

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
    <title>Chính sách</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="./css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="./css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="./css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="./css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="./css/xemsanpham12.css" type="text/css">
    <link rel="stylesheet" href="./css/index.css" type="text/css">
    <link rel="stylesheet" href="./css/home1.css">
    <link rel="stylesheet" href="./css/contact.css">
    <link rel="stylesheet" href="./css/stylee.css">

    <style>
        /*---------------------
  Map
-----------------------*/

.map {
	height: 500px;
	position: relative;
}

.map iframe {
	width: 100%;
}

.map .map-inside {
	position: absolute;
	left: 50%;
	top: 160px;
	-webkit-transform: translateX(-175px);
	-ms-transform: translateX(-175px);
	transform: translateX(-175px);
}

.map .map-inside i {
	font-size: 48px;
	color: #009cea;
	position: absolute;
	bottom: -75px;
	left: 50%;
	-webkit-transform: translateX(-18px);
	-ms-transform: translateX(-18px);
	transform: translateX(-18px);
}
.map .map-inside .inside-widget {
	width: 350px;
	background: #ffffff;
	text-align: center;
	padding: 23px 0;
	position: relative;
	z-index: 1;
	-webkit-box-shadow: 0 0 20px 5px rgba(12, 7, 26, 0.15);
	box-shadow: 0 0 20px 5px rgba(12, 7, 26, 0.15);
}

.map .map-inside .inside-widget:after {
	position: absolute;
	left: 50%;
	bottom: -30px;
	-webkit-transform: translateX(-6px);
	-ms-transform: translateX(-6px);
	transform: translateX(-6px);
	border: 12px solid transparent;
	border-top: 30px solid #ffffff;
	content: "";
	z-index: -1;
}

.map .map-inside .inside-widget h4 {
	font-size: 22px;
	font-weight: 700;
	color: #1c1c1c;
	margin-bottom: 4px;
}

.map .map-inside .inside-widget ul li {
	list-style: none;
	font-size: 16px;
	color: #666666;
	line-height: 26px;


}


.contact__form__title {
	margin-bottom: 50px;
	text-align: center;
}

.contact__form__title h2 {
	color: #1c1c1c;
	font-weight: 700;
}

.contact-form {
	padding-top: 80px;
	padding-bottom: 80px;
}

.contact-form form input {
	width: 100%;
	height: 50px;
	font-size: 16px;
	color: #6f6f6f;
	padding-left: 20px;
	margin-bottom: 30px;
	border: 1px solid #ebebeb;
	border-radius: 4px;
}

.contact-form form input::placeholder {
	color: #6f6f6f;
}

.contact-form form textarea {
	width: 100%;
	height: 150px;
	font-size: 16px;
	color: #6f6f6f;
	padding-left: 20px;
	margin-bottom: 24px;
	border: 1px solid #ebebeb;
	border-radius: 4px;
	padding-top: 12px;
	resize: none;
}

.contact-form form textarea::placeholder {
	color: #6f6f6f;
}

.contact-form form button {
	font-size: 18px;
	letter-spacing: 2px;
}
.contact {
	padding-top: 80px;
	padding-bottom: 50px;
}

.contact__widget {
	margin-bottom: 30px;
}

.contact__widget span {
	font-size: 36px;
	color: #0195eb;
}

.contact__widget h4 {
	color: #1c1c1c;
	font-weight: 700;
	margin-bottom: 6px;
	margin-top: 18px;
}

.contact__widget p {
	color: #666666;
	margin-bottom: 0;
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

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="header__top__left" style="margin-left: 70px;padding-top: 13px;height: 50px;">                       
                            <ul>
                                <li style="font-family: Cairo, sans-serif; font-size: 15px;"><i class="fa fa-envelope"></i> &nbsp SaiGon_Mobile@gmail.com</li>
                                <li style="font-family: Cairo, sans-serif; font-size: 15px;">Miễn phí vận chuyển khi đăng ký thành viên</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" style="margin-left: 700px; margin-top: -47px">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="./view/capnhatttcn.php"><i class="fa fa-user"></i></a>
                                <a href="contact.php"><i class="fa fa-phone"></i></a>
                                <?php
                                // Kiểm tra xem đã đăng nhập hay chưa
                                if (isset($_SESSION['MaKhachHang'])) {
                                    // Nếu đã đăng nhập, hiển thị các biểu tượng khác
                                    echo '<a href="cart.php"><i class="fa fa-shopping-bag"></i></a>';
                                    // Thêm các biểu tượng khác nếu cần
                                } else {
                                    // Nếu chưa đăng nhập, hiển thị biểu tượng đăng nhập
                                    echo '<a href="./view/dangnhap.php"><i class="fa fa-shopping-bag"></i></a>';
                                }
                                ?>
                            </div>

                            <div class="header__top__right__auth">
                                <?php
                                if (isset($_SESSION['MaKhachHang'])) {
                                    echo '<div class="dropdown">';
                                    echo '<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" 
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';

                                    // if (isset($_SESSION['MaKhachHang'])) {
                                    $tenTaiKhoan = $_SESSION['MaKhachHang'];
                                    $name = mysqli_query($conn, "SELECT * FROM `khachhang` WHERE `MaKhachHang`= $tenTaiKhoan");
                                    $kq = mysqli_fetch_array($name);
                                    echo $kq["HoTen"];
                                    //}

                                    echo '</button>';
                                    echo '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="view/capnhatttcn.php">Cập nhật thông tin</a>
                                        <a class="dropdown-item" href="view/doimatkhau.php">Đổi mật khẩu</a>
                                        <a class="dropdown-item" href="?action=logout">Đăng xuất</a>
                                    </div>';
                                    echo '</div>';
                                } else {
                                    echo '<a href="./view/dangnhap.php" style="font-family: Cairo, sans-serif; font-size: 15px;">Đăng nhập</a>';
                                }
                                ?>
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
                        <a href="./index.php">
                            <img src="./img/logo_saigon.png" alt="logo_saigon" id="logo_saigon" style="width: 450px;">
                        </a>
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
                    <nav class="header__menu" style="height: 50px;">
                        <ul style="color: #ffff;">
                            <li>
                                <?php
                                if (isset($_SESSION['MaKhachHang'])) {
                                    echo '<a href="indexuser.php">Trang Chủ</a>';
                                } else {
                                    echo '<a href="index.php">Trang Chủ</a>';
                                }
                                ?>
                            </li>
                            
                            <li><a href="shop.php">Sản Phẩm</a></li>
                            <li><a href="contact.php">Liên Hệ</a></li>
                            <li><a href="chinhsach.php">Chính Sách</a></li>
                            <li><a href="#">Quản lý mua hàng</a>
                                <ul class="header__menu__dropdown">
                                    <li>
                                        <?php
                                        if (isset($_SESSION['MaKhachHang'])) {
                                            echo '<a href="payment.php">Đặt hàng</a>';
                                        } else {
                                            echo '<a href="./view/dangnhap.php">Đặt hàng</a>';
                                        }
                                        ?></li>
                                    <li><a href="./view/dangnhap.php">Xem lịch sử mua hàng</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>


<header>
	<h1>Contact us</h1>
</header>
   

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Điện thoại</h4>
                        <p>0328710708</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Địa chỉ</h4>
                        <p>12 Nguyễn Văn Bảo, Gò Vấp, Hồ Chí Minh</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Giờ mở cửa</h4>
                        <p>9:00 AM - 21:00 PM</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>SaiGon_Mobile@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.858169091027!2d106.68427047365611!3d10.822164158351242!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174deb3ef536f31%3A0x8b7bb8b7c956157b!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2hp4buHcCBUUC5IQ00!5e0!3m2!1svi!2s!4v1702193485364!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>HỒ CHÍ MINH</h4>
                <ul>
                    <li>Điện thoại: 0328710708</li>
                    <li>Địa chỉ: 12 Nguyễn Văn Bảo, Gò Vấp, Hồ Chí Minh</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Map End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Để lại lời nhắn cho chúng tôi</h2>
                    </div>
                </div>
            </div>
            <form action="#">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Vui lòng nhập Tên">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Vui lòng nhập Email">
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea placeholder="Lời nhắn"></textarea>
                        <button type="submit" class="site-btn">Gửi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->

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

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/jquery.nice-select.min.js"></script>
    <script src="./js/jquery-ui.min.js"></script>
    <script src="./js/jquery.slicknav.js"></script>
    <script src="./js/mixitup.min.js"></script>
    <script src="./js/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/main.js"></script>


</body>
<!-- Bạn có thể thêm dòng sau trước đóng thẻ body -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

</html>