<?php

class modelSupplements extends db {
    private $supplement_id = -1;
    private $supplement_name = "";
    private $supplement_size = -1;
    private $supplement_taste = "";
    private $supplement_price = -1 ;
    private $supplement_img = "";
    private $product_id = -1;
    private $table_name = "supplements";
    private $columns_name = "supplement_name, supplement_size, supplement_taste, supplement_price, supplement_img, product_id";

    public function setSupplementId ($supplement_id) {
        $this->supplement_id=$supplement_id;
    }

    public function getSupplementId () {
        return $this->supplement_id;
    }

    public function setSupplementName($supplement_name) {
        $this->supplement_name=$supplement_name;
    }

    public function getSupplementName() {
        return $this->supplement_name;
    }

    public function setSupplementSize ($supplement_size) {
        $this->supplement_size=$supplement_size;
    }

    public function getSupplementSize () {
        return $this->supplement_size;
    }

    public function setSupplementTaste ($supplement_taste) {
        $this->supplement_taste=$supplement_taste;
    }

    public function getSupplementTaste() {
        return $this->supplement_taste;
    }

    public function setSupplementPrice($supplement_price) {
        $this->supplement_price=$supplement_price;
    }

    public function getSupplementPrice() {
        return $this->supplement_price;
    }

    public function setSupplementImg($supplement_img) {
        $this->supplement_img=$supplement_img;
    }

    public function getSupplementImg() {
        return $this->supplement_img;
    }

    public function setProductId($product_id) {
        $this->product_id=$product_id;
    }

    public function getProductId () {
        return $this->product_id;
    }

    public function insertSupplementsWithSeter () {
        $columns_value = "'$this->supplement_name', $this->supplement_size, '$this->supplement_taste', $this->supplement_price, '$this->supplement_img', $this->product_id";
        parent::insertRow($this->table_name,$this->columns_name,$columns_value);
    }

    public function deleteSupplement() {
        parent::deleteRow($this->table_name,"supplement_id", $this->supplement_id);
    }

    public function selectSupplement () {
        return parent::selectRow($this->table_name." INNER JOIN submenu ON supplements.product_id = submenu.product_id");
    }

    public function editSupplement () {
        $columns = "supplement_name = '$this->supplement_name', supplement_size = $this->supplement_size, supplement_taste = '$this->supplement_taste', supplement_price = $this->supplement_price, supplement_img = '$this->supplement_img', product_id = $this->product_id";
        $condition = "supplement_id = $this->supplement_id";
        parent::editRow($this->table_name,$columns,$condition);
    }
}




?>