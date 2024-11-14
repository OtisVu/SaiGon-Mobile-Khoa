<?php
include_once("controller/cLoaiSPAdmin.php");
$cloai = new CLoaiSPAdmin();
$tbl = $cloai->getAllLoaiSP();

if (mysqli_num_rows($tbl) > 0) {
    echo '<select name="LoaiSP" class="form-control">';
    while ($r = mysqli_fetch_assoc($tbl)) {
        echo '<option value="' . $r["MaLoai"] . '">' . $r["TenLoai"] . '</option>';
    }
    echo '</select>';
} else {
    echo 'Không có loại sản phẩm nào.';
}
?>
