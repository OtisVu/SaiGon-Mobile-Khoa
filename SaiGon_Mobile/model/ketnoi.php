
<?php
    class clsketnoi{
        function ketnoiDB(& $conn){
            $conn = mysqli_connect("localhost", "root", "", "saigon_mobile");
            if ($conn){
                mysqli_set_charset($conn, "utf8");
                return $conn;
            }else{
                return false;
            }
        }
    
        function dongKetNoi($conn){
            mysqli_close($conn);
        }
    }
    
?> 