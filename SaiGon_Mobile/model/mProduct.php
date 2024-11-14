<?php
include_once("connect.php");

class MProduct {
    function connect() {
        $p = new ConnectDB();
        return $p->connect_DB($con) ? $con : false;
    }

    function selectAllProducts() {
        if ($con = $this->connect()) {
            $str = "SELECT * FROM sanpham";
            $tbl = mysqli_query($con, $str);
            mysqli_close($con);
            return $tbl;
        } else {
            return false;
        }
    }

    function selectAllAssess() {
        if ($con = $this->connect()) {
            $str = "SELECT * FROM noidungdanhgia";
            $tbl = mysqli_query($con, $str);
            mysqli_close($con);
            return $tbl;
        } else {
            return false;
        }
    }

    function selectProductBySearch($search) {
        if ($con = $this->connect()) {
            $str = "SELECT * FROM sanpham WHERE TenSanPham LIKE N'%$search%'";
            $tbl = mysqli_query($con, $str);
            mysqli_close($con);
            return $tbl;
        } else {
            return false;
        }
    } 

    function selectDelProduct($MaSanPham) {
        if ($con = $this->connect()) {
            $str = "UPDATE sanpham SET trangThai = '0' WHERE MaSanPham = '$MaSanPham' LIMIT 1;";
            $tbl = mysqli_query($con, $str);
            mysqli_close($con);
            return $tbl;
        } else {
            return false;
        }
    }

    function insertProduct($tenSP, $slt, $moTa, $giaBan, $giaNhap, $thuongHieu, $tenAnh, $hsd, $loaiSP, $nhaCC) {
        if ($con = $this->connect()) {
            $str = "
                INSERT INTO `sanpham` (
                    `MaSanPham`, 
                    `TenSanPham`, 
                    `SoLuongTon`, 
                    `MoTa`, 
                    `GiaBan`, 
                    `GiaNhap`, 
                    `ThuongHieu`, 
                    `HinhAnh`, 
                    `HanSuDung`, 
                    `LoaiSanPham`, 
                    `NhaCungCap`, 
                    `trangThai`
                ) VALUES (
                    'TEST3', '$tenSP', '$slt', '$moTa', '$giaBan', '$giaNhap', '$thuongHieu', '$tenAnh', '$hsd', '$loaiSP', '$nhaCC', '1'
                );
            ";
            echo "<script>alert('$str')</script>";
            $tbl = mysqli_query($con, $str);
            mysqli_close($con);
            return $tbl;
        } else {
            return false;
        }
    }

    function selectProductToEdit($MaSanPham) {
        if ($con = $this->connect()) {
            $str = "SELECT * FROM sanpham WHERE MaSanPham = '$MaSanPham' LIMIT 1;";
            $tbl = mysqli_query($con, $str);
            mysqli_close($con);
            return $tbl;
        } else {
            return false;
        }
    }

    function updateProduct($ma, $ten, $slt, $moTa, $giaBan, $giaNhap, $thuongHieu, $nameImg, $hsd, $loaiSP, $nhaCC) {
        if ($con = $this->connect()) {
            $img = $nameImg != "" ? " `HinhAnh` = '$nameImg'," : "";
            $str = "
                UPDATE `sanpham` SET 
                `TenSanPham` = '$ten', 
                `SoLuongTon` = '$slt',
                `MoTa` = '$moTa',  
                `GiaBan` = '$giaBan', 
                `GiaNhap` = '$giaNhap', 
                `ThuongHieu` = '$thuongHieu', 
                $img
                `HanSuDung` = '$hsd', 
                `LoaiSanPham` = '$loaiSP', 
                `NhaCungCap` = '$nhaCC', 
                `trangThai` = '1' 
                WHERE `MaSanPham` = '$ma';
            ";
            echo "<script>alert('$str')</script>";
            $tbl = mysqli_query($con, $str);
            mysqli_close($con);
            return $tbl;
        } else {
            return false;
        }
    }

    function selectProductsByBrand($brand) {
        if ($con = $this->connect()) {
            $str = "SELECT * FROM sanpham WHERE ThuongHieu LIKE N'%$brand%'";
            $tbl = mysqli_query($con, $str);
            mysqli_close($con);
            return $tbl;
        } else {
            return false;
        }
    }
}
?>
