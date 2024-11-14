<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "saigon_mobile");

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_unset(); // Xóa tất cả các biến trong session
    session_destroy(); // Hủy session
    header('location: index.php'); // Chuyển hướng về trang login.php
    exit();
    // Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Xử lý yêu cầu lọc sản phẩm theo hãng
$brand_filter = "";
if (isset($_GET['brand'])) {
    $brand_filter = $_GET['brand'];
}
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
    <title>SHOP</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="./css/xemsanpham12.css" type="text/css">
    <link rel="stylesheet" href="./css/index.css" type="text/css">
    <link rel="stylesheet" href="./css/home1.css">
    <link rel="stylesheet" href="./css/slider1.css">
    <link rel="stylesheet" href="./css/filters.css">
    <link rel="stylesheet" href="./css/stylee.css">
</head>
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
                    <div class="header__top__left" style="margin-left: 70px;padding-top: 50px;height: 50px; margin-top: -30px;">                       
                        <ul>
                            <li style="font-family: Cairo, sans-serif; font-size: 15px;"><i class="fa fa-envelope"></i> &nbsp SaiGon_Mobile@gmail.com</li>
                            <li style="font-family: Cairo, sans-serif; font-size: 15px;">Miễn phí vận chuyển khi đăng ký thành viên</li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6" style="margin-left: 700px; margin-top: -35px">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="./view/dangnhap.php"><i class="fa fa-user"></i></a>
                                <a href="contact.php"><i class="fa fa-phone"></i></a>
                                <?php
                                // Kiểm tra xem đã đăng nhập hay chưa
                                if (isset($_SESSION['MaKhachHang'])) {
                                    // Nếu đã đăng nhập, hiển thị các biểu tượng khác
                                    echo '<a href="cart.php"><i class="fa fa-shopping-bag"></i></a>';
                                    // Thêm các biểu tượng khác nếu cần
                                } else {
                                    // Nếu chưa đăng nhập, hiển thị biểu tượng đăng nhập
                                    echo 
                                         '<a href="./view/dangnhap.php"><i class="fa fa-shopping-bag"></i></a>';
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
                            <img src="./img/logo_saigon.png" alt="logo_saigon" id="logo_saigon" style="border-radius: 5px;width: 450px">
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
                                    <li><a href="payment.php">Đặt hàng</a></li>
                                    <li><a href="orderManage.php">Xem lịch sử mua hàng</a></li>
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

    <!--Slider-->
    <section class="slider">
        <div class="container">
            <div class="slider-content">
                <div class="slider-content-left">
                    <div class="slider-content-left-top">
                        <a href=""><img src="./img/slider/top2.jpg" alt=""></a>
                    </div>
                </div>
                <div class="slider-content-right">
                    <li><a href=""><img src="./img/slider/bottom1.png" alt=""></a></li>
                    <li><a href=""><img src="./img/slider/bottom2.png" alt=""></a></li>
                </div>
            </div>
        </div>
    </section>
    <!--Slider End-->
    <br>
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--menu2-->
                <nav class="header__menu">
                        <ul>                           
                            <li><a href="shop.php?brand=Samsung">SAMSUNG</a></li>
                            <li><a href="shop.php?brand=Apple">APPLE</a></li>
                            <li><a href="shop.php?brand=Oppo">OPPO</a></li>
                            <li><a href="shop.php?brand=Nokia">NOKIA</a></li>
                            <li><a href="shop.php?brand=Xiaomi">XIAOMI</a></li>
                            <li><a href="shop.php?brand=Phu+Kien">PHỤ KIỆN</a></li>
                        </ul>
                    </nav>
                    <!--menu2 End-->
                    <br>
                    
                    <div class="header-menu">
                        <form action="shop.php" method="GET" style="margin-bottom: 20px;">
                            <div class="filters">
                                <div class="filter-section">
                                    <div class="dropdown">
                                        <button class="dropbtn">Hãng</button>
                                        <div class="dropdown-content">
                                            <label><input type="checkbox" name="brand[]" value="Samsung"> Samsung</label><br>
                                            <label><input type="checkbox" name="brand[]" value="Apple"> Apple</label><br>
                                            <label><input type="checkbox" name="brand[]" value="Oppo"> Oppo</label><br>
                                            <label><input type="checkbox" name="brand[]" value="Xiaomi"> Xiaomi</label><br>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <button class="dropbtn">Giá</button>
                                        <div class="dropdown-content">
                                            <label><input type="radio" name="price" value="asc"> Tăng dần</label><br>
                                            <label><input type="radio" name="price" value="desc"> Giảm dần</label><br>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <button class="dropbtn">Nhu cầu</button>
                                        <div class="dropdown-content">
                                            <label><input type="checkbox" name="need[]" value="gaming"> Chơi game</label><br>
                                            <label><input type="checkbox" name="need[]" value="photography"> Chụp hình</label><br>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <button class="dropbtn">Loại điện thoại</button>
                                        <div class="dropdown-content">
                                            <label><input type="checkbox" name="type[]" value="android"> Android</label><br>
                                            <label><input type="checkbox" name="type[]" value="ios"> iOS</label><br>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <button class="dropbtn">Tính năng đặc biệt</button>
                                        <div class="dropdown-content">
                                            <label><input type="checkbox" name="type[]" value="android"> Kháng nước , bụi</label><br>
                                            <label><input type="checkbox" name="type[]" value="ios"> Hỗ trợ 5G</label><br>
                                            <label><input type="checkbox" name="type[]" value="ios"> Công nghệ NFC</label><br>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <button class="dropbtn">Tính năng sạc</button>
                                        <div class="dropdown-content">
                                            <label><input type="checkbox" name="type[]" value="android"> Sạc nhanh (từ 20W)</label><br>
                                            <label><input type="checkbox" name="type[]" value="ios"> Sạc siêu nhanh (từ 60W)</label><br>
                                            <label><input type="checkbox" name="type[]" value="ios"> Sạc không dây</label><br>
                                        </div>
                                    </div>
                                <button type="submit" class="site-btn" style="margin-top: 12px; width: 60px;margin-left: 5px; margin-bottom: 10px;margin-right: 10px;padding: 10px 10px 10px 10px;">Lọc</button>
                            </div>
                        </form>
                </div>



                    <div class="section-title">
                        <h2>SẢN PHẨM</h2>
                    </div>
                    
                </div>
            </div>
            <div class="row featured__filter">
                 <?php
                 include_once("view/vProduct.php");
                 $p = new VProduct();
                 if (isset($_GET['search'])) {
                     $p->viewSearchProduct($_GET['search']);
                 } elseif (isset($_GET['brand'])) {
                     $p->viewProductsByBrand($_GET['brand']);
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
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>  
</body>

</html>