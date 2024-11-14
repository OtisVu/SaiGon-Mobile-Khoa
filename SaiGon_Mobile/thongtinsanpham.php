<?php
session_start();
ob_start();
$conn = mysqli_connect("localhost", "root", "", "saigon_mobile");

// Kiểm tra session
if (isset($_SESSION['MaKhachHang']) || !isset($_SESSION['MaHoaDon'])) {
    header('location: thongtinsanpham.php');
    exit();
}
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_unset(); // Xóa tất cả các biến trong session
    session_destroy(); // Hủy session
    header('location: index.php'); // Chuyển hướng về trang login.php
    exit();
}




// $customer_id = $_SESSION['MaKhachHang'];
// $order_id = $_SESSION['MaHoaDon'];

// if (!$order_id) {
//     die('Order ID không hợp lệ.');
// }

// // Truy vấn thông tin đơn hàng
// $order_query = mysqli_query($conn, "SELECT * FROM hoadon WHERE MaHoaDon = $order_id");
// if (!$order_query || mysqli_num_rows($order_query) == 0) {
//     die('Không tìm thấy chi tiết đơn hàng.');
// }
// $order_details = mysqli_fetch_assoc($order_query);

// // Truy vấn thông tin khách hàng
// $customer_query = mysqli_query($conn, "SELECT * FROM khachhang WHERE MaKhachHang = $customer_id");
// if (!$customer_query || mysqli_num_rows($customer_query) == 0) {
//     die('Không tìm thấy thông tin khách hàng.');
// }
// $customer = mysqli_fetch_assoc($customer_query);

// // Truy vấn sản phẩm trong đơn hàng
// $products_query = mysqli_query($conn, "
//     SELECT sp.TenSanPham, sp.Gia, sp.DungTich, sp.HinhAnh, cthd.TrangThai
//     FROM chitiethoadon cthd
//     JOIN sanpham sp ON cthd.MaSanPham = sp.MaSanPham
//     WHERE cthd.MaHoaDon = $order_id
// ");

// if (!$products_query) {
//     die('Lỗi truy vấn sản phẩm: ' . mysqli_error($conn));
// }
// ?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông Tin Sản Phẩm</title>
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="./css/index.css" type="text/css">
    <link rel="stylesheet" href="./css/home1.css">
    <link rel="stylesheet" href="./css/contact.css">
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
</head>

<body>
      <!-- Header Section Begin -->
      <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="header__top__left" style="margin-left: 60px;margin-top: 5px;">
                            <ul>
                                <li style="font-family: Cairo, sans-serif; font-size: 15px;">
                                    <i class="fa fa-envelope"></i> SaiGon_Mobile@gmail.com
                                </li>
                                <li style="font-family: Cairo, sans-serif; font-size: 15px;">
                                    Miễn phí vận chuyển khi đăng ký thành viên
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" style="margin-left: 700px; margin-top: -50px">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="./view/capnhatttcn.php"><i class="fa fa-user"></i></a>
                                <a href="contact.php"><i class="fa fa-phone"></i></a>
                                <a href="cart.php"><i class="fa fa-shopping-bag"></i></a>
                            </div>

                            <div class="header__top__right__auth">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle custom-dropdown-btn" type="button" id="dropdownMenuButton" 
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
                                    <div class="dropdown-menu custom-dropdown-menu" aria-labelledby="dropdownMenuButton">
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
                            <li><a href="./contact.php">Liên Hệ</a></li>
                            <li><a href="./chinhsach.php">Chính Sách</a></li>
                            <li><a href="#">Quản lý mua hàng </a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="payment.php">Đặt hàng</a></li>
                                    <li><a href="orderManage.php">Xem lịch sử mua hàng</a></li>
                                    <li><a href="thongtinsanpham.php">Xem chi tiết đơn đã đặt</a></li>
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

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <?php
            while ($product = mysqli_fetch_assoc($products_query)) {
                echo '<div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic" style="background-image: url(img/product/' . $product['HinhAnh'] . ');">
                            <img src="img/product/' . $product['HinhAnh'] . '" alt="' . $product['TenSanPham'] . '" style="width: 100%; height: auto;">
                        </div>
                        <div class="product__item__text">
                            <h6>' . $product['TenSanPham'] . '</h6>
                            <h5>' . number_format($product['Gia'], 0, ',', '.') . ' VND</h5>
                            <h6>Dung tích: ' . $product['DungTich'] . 'ml</h6>
                            <h6>Trạng thái: ' . ($product['TrangThai'] ? 'Đã xử lý' : 'Chưa xử lý') . '</h6>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Chi tiết đơn hàng</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Thông tin đơn hàng</h6>
                                <p>Mã hóa đơn: <?php echo $order_details['MaHoaDon']; ?></p>
                                <p>Ngày đặt hàng: <?php echo date('d/m/Y', strtotime($order_details['NgayLapHoaDon'])); ?></p>
                                <p>Tổng tiền: <?php echo number_format($order_details['TongTien'], 0, ',', '.'); ?> VND</p>
                                <p>Trạng thái: <?php echo $order_details['TrangThai'] ? 'Đã xử lý' : 'Chưa xử lý'; ?></p>
                                <p>Địa chỉ giao hàng: <?php echo $order_details['DiaChi']; ?></p>
                                <p>Ghi chú: <?php echo $order_details['GhiChu']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->


    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.php"><img src="img/logo_saigon.png" alt="logo_saigon"></a>
                        </div>
                        <ul>
                            <li>Địa chỉ: 273 An Dương Vương, Phường 3, Quận 5, TP. HCM</li>
                            <li>Điện thoại: +84 123 456 789</li>
                            <li>Email: SaiGon_Mobile@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Liên kết nhanh</h6>
                        <ul>
                            <li><a href="#">Giới thiệu</a></li>
                            <li><a href="#">Liên hệ</a></li>
                            <li><a href="#">Hỗ trợ khách hàng</a></li>
                            <li><a href="#">Chính sách bảo mật</a></li>
                            <li><a href="#">Điều khoản dịch vụ</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Thanh toán</a></li>
                            <li><a href="#">Xem lịch sử mua hàng</a></li>
                            <li><a href="#">Theo dõi đơn hàng</a></li>
                            <li><a href="#">Đổi trả sản phẩm</a></li>
                            <li><a href="#">Giao hàng</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Nhận thông báo mới nhất</h6>
                        <p>Nhận thông tin cập nhật qua email về các sản phẩm mới nhất.</p>
                        <form action="#">
                            <input type="text" placeholder="Nhập email của bạn">
                            <button type="submit" class="site-btn">Đăng ký</button>
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

<?php
// Đóng kết nối cơ sở dữ liệu
mysqli_close($conn);
?>
