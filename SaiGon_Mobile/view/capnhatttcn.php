<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "saigon_mobile";
$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) {
    die("Kết nối không thành công: " . mysqli_connect_error());
}
// Thiết lập bảng mã kết nối
mysqli_set_charset($conn, 'utf8');
session_start();
// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['MaKhachHang']) || empty($_SESSION['MaKhachHang'])) {
    // Nếu chưa đăng nhập, chuyển hướng về trang login.php
    header('location: dangnhap.php');
    exit();
}
if ((isset($_POST['submit'])) && ($_POST['submit'])) {
    $pattern = '/^[0-9]{10}$/';
    $HoTen = $_POST['HoTen'];
    $SoDienThoai = $_POST['SoDienThoai'];
    $DiaChi = $_POST['DiaChi'];
    $Email = $_POST['Email'];
    $patternname = '/^[a-zA-ZÀ-Ỹà-ỹ]+(?: [a-zA-ZÀ-Ỹà-ỹ]+)?$/';
    $patternadd = '/^[a-zA-Z0-9,.#\- ]+$/';
    if (empty($HoTen) || empty($SoDienThoai) || empty($Email)) {
        $txt = "Bạn cần nhập đầy đủ thông tin";
    } else if (preg_match($patternname, $HoTen)) {
        $txt = "Họ tên không hợp lệ";
    } else if (!preg_match($pattern, $SoDienThoai)) {
        $txt = "Số điện thoại không hợp lệ";
    } else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $txt = "Email không hợp lệ";
    } else if (preg_match($patternadd, $DiaChi)) {
        $txt = "Địa chỉ không hợp lệ";
    } else {

        $SoDienThoaiSession = $_SESSION['MaKhachHang'];
        $query = "SELECT Email FROM khachhang WHERE MaKhachHang = '$SoDienThoaiSession'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $emailss = $row['Email'];
        }

        $query1 = "SELECT SoDienThoai FROM khachhang WHERE MaKhachHang = '$SoDienThoaiSession'";
        $result1 = $conn->query($query1);
        if ($result1->num_rows > 0) {
            $row = $result1->fetch_assoc();
            $sdtss = $row['SoDienThoai'];
        }
        //echo "<script> alert('$emailss.$sdtss')</script>";

        if ($_POST['Email'] != $emailss) {
            include_once("../Controller/ckhachhang.php");
            $p = new controlProduct();
            $re = $p->ktradky($Email);
            if ($re == 0) {
                $txt = "Email đã tồn tại";
            }
            else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Xử lý dữ liệu khi form được gửi đi 
                $SoDienThoaiSession = $_SESSION['MaKhachHang'];
                // Cập nhật thông tin cá nhân trong cơ sở dữ liệu
                $query = "UPDATE khachhang SET HoTen='$HoTen', SoDienThoai='$SoDienThoai', DiaChi='$DiaChi', Email='$Email' WHERE MaKhachHang='$SoDienThoaiSession'";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    echo "<script> alert('Cập nhật thông tin thành công')</script>";
                    echo header("refresh: 0; url='#'");
                } else {
                    echo "Lỗi cập nhật thông tin: " . mysqli_error($conn);
                }
            }
        } else if ($_POST['SoDienThoai'] != $sdtss) {
            include_once("../Controller/ckhachhang.php");
            $p = new controlProduct();
            $ra = $p->ktradkysdt($SoDienThoai);
            if ($ra == 0) {
                $txt = "Số điện thoại đã tồn tại";
            } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Xử lý dữ liệu khi form được gửi đi 
                $SoDienThoaiSession = $_SESSION['MaKhachHang'];
                // Cập nhật thông tin cá nhân trong cơ sở dữ liệu
                $query = "UPDATE khachhang SET HoTen='$HoTen', SoDienThoai='$SoDienThoai', DiaChi='$DiaChi', Email='$Email' WHERE MaKhachHang='$SoDienThoaiSession'";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    echo "<script> alert('Cập nhật thông tin thành công')</script>";
                    echo header("refresh: 0; url='#'");
                } else {
                    echo "Lỗi cập nhật thông tin: " . mysqli_error($conn);
                }
            }
        } else {
            $SoDienThoaiSession = $_SESSION['MaKhachHang'];
            // Cập nhật thông tin cá nhân trong cơ sở dữ liệu
            $query = "UPDATE khachhang SET HoTen='$HoTen', SoDienThoai='$SoDienThoai', DiaChi='$DiaChi', Email='$Email' WHERE MaKhachHang='$SoDienThoaiSession'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<script> alert('Cập nhật thông tin thành công')</script>";
                echo header("refresh: 0; url='#'");
            } else {
                echo "Lỗi cập nhật thông tin: " . mysqli_error($conn);
            }
        }
    }
}
// Lấy thông tin khách hàng từ cơ sở dữ liệu
$SoDienThoai = $_SESSION['MaKhachHang'];
$query = "SELECT * FROM khachhang WHERE MaKhachHang = '$SoDienThoai'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Lỗi truy vấn: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

// include_once("model/connectdb.php");
$conn1 = mysqli_connect("localhost", "root", "", "saigon_mobile");
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_unset(); // Xóa tất cả các biến trong session
    session_destroy(); // Hủy session
    header('location: ../index.php'); // Chuyển hướng về trang login.php
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/SaiGon_Mobile.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main_long.css">
    <link rel="stylesheet" type="text/css" href="../css/capnhatttcn.css">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../css/xemsanpham12.css" type="text/css">
    <link rel="stylesheet" href="../css/index.css" type="text/css">
    <link rel="stylesheet" href="../css/home1.css">
    <title>Cập nhật thông tin cá nhân</title>
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

                    <div class="col-lg-4 col-md-6" style="margin-left: 700px; margin-top: -45px">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-user"></i></a>
                                <a href="../contact.php"><i class="fa fa-phone"></i></a>
                                <a href="../cart.php"><i class="fa fa-shopping-bag"></i></a>
                            </div>

                            <div class="header__top__right__auth">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php
                                        if (isset($_SESSION['MaKhachHang'])) {
                                            $tenTaiKhoan = $_SESSION['MaKhachHang'];
                                            $name = mysqli_query($conn1, "SELECT * FROM `khachhang` WHERE `MaKhachHang`= $tenTaiKhoan");
                                            $kq = mysqli_fetch_array($name);
                                            echo $kq["HoTen"];
                                        }
                                        ?>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Cập nhật thông tin</a>
                                        <a class="dropdown-item" href="doimatkhau.php">Đổi mật khẩu</a>
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
                <div class="col-lg-12" style="margin-top: 20px; margin-bottom: 50px;">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="../indexuser.php">Trang Chủ</a>

                            <li><a href="../shop.php">Sản Phẩm</a></li>
                            <li><a href="../contact.php">Liên Hệ</a></li>
                            <li><a href="../chinhsach.php">Chính Sách</a></li>
                            <li><a href="#">Quản lý mua hàng</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="../payment.php">Đặt hàng</a></li>
                                    <li><a href="../orderManage.php">Xem lịch sử mua hàng</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="../img/logo_saigon.png" alt="IMG" style="width: 100%;height: 400px;">
                </div>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="login100-form validate-form" method="post" style="margin-top: 50px;margin-bottom: 50px; text-align: center;">
                    <span class="login100-form-title">
                        Cập nhập thông tin
                    </span>

                    <div class="wrap-input100 ">
                        <input class="input100" type="text" name="HoTen" value="<?php echo $row['HoTen']; ?>">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 ">
                        <input class="input100" type="text" name="SoDienThoai"
                            value="<?php echo $row['SoDienThoai']; ?>">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 ">
                        <input class="input100" type="text" name="DiaChi" value="<?php echo $row['DiaChi']; ?>">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-address-book-o" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 ">
                        <input class="input100" type="email" name="Email" value="<?php echo $row['Email']; ?>">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <?php
                    if (isset($txt) && ($txt != "")) {
                        echo "<div style='color: red; text-align: center;'>$txt</div>";
                    }
                    ?>
                    <div class="container-login100-form-btn" style="margin-top: 10px;">
                        <input type="submit" class="login100-form-btn" name="submit" value="Cập nhập">
                    </div>

                </form>
            </div>
        </div>
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="../img/logo_saigon.png" alt=""></a>
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

    </div>

    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="../vendor/bootstrap/js/popper.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/select2/select2.min.js"></script>
    <script src="../vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <script src="../js/mainn.js"></script>
</body>

</html>