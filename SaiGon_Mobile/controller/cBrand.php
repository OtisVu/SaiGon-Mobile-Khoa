<?php
include_once("model/mBrand.php");

class ControlBrand {
    private $model;

    public function __construct() {
        $this->model = new ModelBrand();
    }

    public function getAllBrand() {
        return $this->model->getAllBrands();
    }

    public function getBrand($brandID) {
        return $this->model->getBrandByID($brandID);
    }

    // Additional functions for adding, updating, and deleting brands can be added here
}
?>
