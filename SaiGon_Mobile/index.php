<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
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

    <style>
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
<div id="preloder">
    <div class="loader"></div>
</div>
    
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="header__top__left" style="margin-left: 60px;" id="header-top-left">                       
                        <ul>
                            <li style="font-family: Cairo, sans-serif; font-size: 15px;"><i class="fa fa-envelope"></i> &nbsp SaiGon_Mobile@gmail.com</li>
                            <li style="font-family: Cairo, sans-serif; font-size: 15px;">Miễn phí vận chuyển khi đăng ký thành viên</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" style="margin-left: 700px; margin-top: -45px">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="./view/dangnhap.php"><i class="fa fa-user"></i></a>
                            <a href="contact.php"><i class="fa fa-phone"></i></a>
                            <a href="./view/dangnhap.php"><i class="fa fa-shopping-bag"></i></a>
                        </div>
                        <div class="header__top__right__auth">
                           <a href="./view/dangnhap.php" style="font-family: Cairo, sans-serif; font-size: 15px;">Đăng nhập</a>
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
                        <img src="./img/logo_saigon.png" alt="logo_saigon" id="logo_saigon" style="border-radius:5px;width: 450px">
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
                <nav class="header__menu">
                    <ul>
                        <li><a href="index.php">Trang Chủ</a>
                        <li><a href="shop.php">Sản Phẩm</a></li>
                        <li><a href="contact.php">Liên Hệ</a></li>
                        <li><a href="chinhsach.php">Chính Sách</a></li>
                        <li><a href="#">Quản lý mua hàng </a>
                            <ul class="header__menu__dropdown">
                                <li><a href="./view/dangnhap.php">Đặt hàng</a></li>
                                <li><a href="./view/dangnhap.php">Xem lịch sử mua hàng</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!--Start of Fchat.vn-->
        <script type="text/javascript" src="https://cdn.fchat.vn/assets/embed/webchat.js?id=6656ce7128bd86331f649038" async="async"></script>
    <!--End of Fchat.vn-->
</header>
    
    <!-- Header Section End -->
    <br>
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero__item set-bg" data-setbg="img/deal.png">
                        <div class="hero__text">
                            <span>I7 Power</span>
                            <h2>Sài Gòn Mobile<br>Deal ngập sàn</p>
                            <a href="shop.php" class="primary-btn">XEM NGAY</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm nổi bật</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php
                include_once("view/vProduct.php");
                $p = new VProduct();
                if (isset($_REQUEST["search"])) {
                    $p->viewSearchProduct($_REQUEST["search"]);
                } else {
                    $p->viewAllProducts();
                }
                ?>
            </div>
        </div>
    </section>

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

</html>