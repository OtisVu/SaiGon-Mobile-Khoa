<?php
include_once("controller/cBrand.php");

class ViewBrand {
    private $controller;

    public function __construct() {
        $this->controller = new ControlBrand();
    }

    public function showAllBrands() {
        $brands = $this->controller->getAllBrand();
        if (mysqli_num_rows($brands) > 0) {
            echo "<table>";
            echo "<tr><th>BrandID</th><th>BrandName</th></tr>";
            while ($row = mysqli_fetch_assoc($brands)) {
                echo "<tr>";
                echo "<td>" . $row['BrandID'] . "</td>";
                echo "<td>" . $row['BrandName'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No brands found.";
        }
    }

    // Additional functions for displaying brand details, forms, etc., can be added here
}
?>
