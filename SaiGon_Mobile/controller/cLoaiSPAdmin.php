<?php
    include_once("model/mLoaiSPAdmin.php");
    class CLoaiSPAdmin{
        function getAllLoaiSP(){
            $p = new MLoaiSP();
            $tbl = $p -> selectAllLoaiSP();
            return $tbl;
        }
    }
?>