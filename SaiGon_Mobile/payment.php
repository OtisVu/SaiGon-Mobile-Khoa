<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "saigon_mobile");

if (isset($_POST['thanh_toan'])) {
    $customer_id = $_SESSION['MaKhachHang'];
    $total_price = $_POST['total_price'];
    
    // Insert the order into the database
    $order_query = "INSERT INTO orders (customer_id, total_price, order_date, delivery_date) 
                    VALUES ('$customer_id', '$total_price', NOW(), DATE_ADD(NOW(), INTERVAL 3 DAY))";
    mysqli_query($conn, $order_query);
    
    // Get the last inserted order ID
    $order_id = mysqli_insert_id($conn);
    
    // Insert order products
    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        $product_query = "INSERT INTO order_products (order_id, product_id, quantity, status) 
                          VALUES ('$order_id', '$product_id', '$quantity', 'Đã đặt hàng')";
        mysqli_query($conn, $product_query);
    }

    // Store the order ID in session
    $_SESSION['order_id'] = $order_id;

    // Redirect to the thongtinsanpham.php page
    header('Location: thongtinsanpham.php');
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
    <title>ĐẶT HÀNG</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

     <!-- Css Styles -->
     <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="./css/index.css" type="text/css">
    <!-- <link rel="stylesheet" href="./css/xemsanpham12.css" type="text/css"> -->
    <link rel="stylesheet" href="./css/home1.css">
    <link rel="stylesheet" href="./css/contact.css">


    <style>
        small {
            color: red;
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

    </script
</head>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->
    <?php
    include_once('./controller/cPayment.php');
    include './view/vPayment.php';
    $v = new VPay();

    $pay = new CPay();
    $pay->handlePay();
    ?>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="header__top__left" style="margin-left: 60px;margin-top: 5px;">                       
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

        <div class="container">
            <div class="row">

                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="../PTUD_N10_DEMO/indexuser.php"><img src="../PTUD_N10_DEMO/img/logo.png" alt=""></a>
                    </div>
                </div>

                <div class="hero__search"  style="margin-top: 40px;margin-bottom: 30px;">
                    <div class="hero__search__form">
                        <form action="#">
                            <input type="text" name="search" placeholder="Nhập sản phẩm cần tìm.">
                            <button type="submit" class="site-btn">TÌM</button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-12">
                    <nav class="header__menu">
                        <ul>
                            <li>    <?php
                                if (isset($_SESSION['MaKhachHang'])) {
                                    echo '<a href="indexuser.php">Trang Chủ</a>';
                                } else {
                                    echo '<a href="index.php">Trang Chủ</a>';
                                }
                                ?>
                            
                            <li><a href="shop.php">Sản Phẩm</a></li>
                            <li><a href="./contact.php">Liên Hệ</a></li>
                            <li><a href="./chinhsach.php">Chính Sách</a></li>
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
    </header>
    <!-- Header Section End -->
    <br>
    <br>

    <!-- Breadcrumb Section Begin -->
    <header>
	<h1> Đặt hàng</h1>
</header>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">

            <div class="checkout__form">
                <h4>Thông tin giao hàng</h4>
                <form action="#" method="get">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">


                            <?php
                            $v->viewInfoUsers();
                            ?>

                            <div class="checkout__input__checkbox">
                                <label for="acc">
                                    Bạn đồng ý với các điều khoản của chúng tôi ?
                                    <input type="checkbox" id="acc">
                                    <span class="checkmark"></span>
                                </label> <br>
                                <small id="DieuKhoan-mess"></small>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Hoá đơn</h4>
                                <div class="checkout__order__products">Sản phẩm <span>Tổng</span></div>
                                <ul>
                                    <?php

                                    $v->viewAllProducts();
                                    ?>
                                </ul>

                                <div class="checkout__order__total">Tổng tiền <span id="total">0</span></div>
                                <input type="hidden" name="tongTienDonHang" value="0" id="tongTienDonHang">

                                <p>Vui lòng chọn phương thức thanh toán.</p>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Thanh toán khi nhận hàng
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span> <br>
                                        <small id="PhuongThucThanhToan-mess"></small>
                                    </label>
                                </div>
                                 <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Chuyển khoản
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div> 
                                <button type="submit" class="site-btn" name="btnPay" onClick="return confirmPay();"> thanh toán</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

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
    <script type="text/javascript">
        function validateFormPay() {
            console.log('object');
            var hoTen = document.getElementById('hoTen').value;
            var SDT = document.getElementById('SDT').value;
            var Email = document.getElementById('Email').value;
            var DiaChi = document.getElementById('DiaChi').value;
            var DieuKhoan = document.getElementById('acc').checked;
            var PhuongThucThanhToan = document.getElementById('payment').checked;



            // Khởi tạo đối tượng chứa thông báo lỗi
            var errorMessages = {
                hoTen: '',
                Email: '',
                SDT: '',
                DiaChi: '',
                DieuKhoan: '',
                PhuongThucThanhToan: ''
            };

            // Kiểm tra điều kiện và lưu thông báo lỗi
            //^[a-zA-Z\s]
            if (hoTen.trim() === '' || !/^[A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]*(?:[ ][A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]*)*$/gm.test(hoTen)) {
                errorMessages.hoTen = 'Họ và tên không được để trống và phải là chữ.';
            }



            if (Email.trim() === '' || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(Email)) {
                errorMessages.Email = 'Email không hợp lệ.';
            }

            if (SDT.trim() === '' || !/^[0]\d{9}$/.test(SDT)) {
                errorMessages.SDT = 'Số điện thoại không hợp lệ.';
            }

            // Kiểm tra độ dài của địa chỉ trước khi áp dụng RegExp
            if (DiaChi.trim().length <= 100) {
                // Nếu độ dài hợp lệ, kiểm tra tính hợp lệ của địa chỉ bằng RegExp
                if (!/^[A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ0-9,/-][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ0-9,/-]*(?:[ 0-9][A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ0-9,/-][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ0-9,/-]*)*$/gm.test(DiaChi)) {
                    errorMessages.DiaChi = 'Địa chỉ không hợp lệ.';
                }
            } else {
                // Nếu độ dài không hợp lệ, hiển thị thông báo lỗi
                errorMessages.DiaChi = 'Địa chỉ không được vượt quá 100 ký tự.';
            }

            if (!DieuKhoan) {
                errorMessages.DieuKhoan = 'Bắt buộc chọn.';
            }
            if (!PhuongThucThanhToan) {
                errorMessages.PhuongThucThanhToan = 'Bắt buộc chọn phương thức.';
            }



            // Hiển thị thông báo lỗi trong thẻ <small>
            document.getElementById('hoTen-mess').innerHTML = errorMessages.hoTen;
            document.getElementById('Email-mess').innerHTML = errorMessages.Email;
            document.getElementById('SDT-mess').innerHTML = errorMessages.SDT;
            document.getElementById('DiaChi-mess').innerHTML = errorMessages.DiaChi;
            document.getElementById('DieuKhoan-mess').innerHTML = errorMessages.DieuKhoan;
            document.getElementById('PhuongThucThanhToan-mess').innerHTML = errorMessages.PhuongThucThanhToan;

            // Kiểm tra xem có thông báo lỗi nào không
            for (var field in errorMessages) {
                if (errorMessages[field] !== '') {
                    return false; // Có ít nhất một lỗi, không submit form
                }
            }

            return true; // Không có lỗi, có thể submit form
        }

        function confirmPay() {
            if (validateFormPay()) {
                return confirm("Bạn có chắc chắn thanh toán đơn hàng này?");
            } else {
                alert("kiểm tra lại thông tin")
                return false
            }
        }
        var formatter = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
            minimumFractionDigits: 0,
        });

        const totalItem = document.querySelector('#total')
        const tongTienDonHang = document.querySelector('#tongTienDonHang')
        const prices = document.querySelectorAll('._price')

        function renderPrice() {
            let total = 0

            for (let i = 0; i < prices.length; i++) {
                console.log(parseInt(prices[i].value, 10))
                total += parseInt(prices[i].value, 10)

            }
            totalItem.innerHTML = formatter.format(total)
            tongTienDonHang.value = total
        }
        renderPrice()
    </script>;


</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>