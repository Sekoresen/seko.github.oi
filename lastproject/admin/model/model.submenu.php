<?php
class modelSubmenu extends db {
    private $product_id = -1;
    private $product_type = "";
    private $category_name = "";
    private $table_name = "submenu";
    private $columns_name = "product_type, category_name";

    public function setProductId ($product_id) {
        $this->product_id=$product_id;
    }

    public function getProductId () {
        return $this->product_id;
    }
    
    public function setProductType ($product_type) {
        $this->product_type=$product_type;
    }

    public function getProductType () {
        return $this->product_type;
    }

    public function setCategoryName ($category_name) {
        $this->category_name=$category_name;
    }

    public function getCategoryName () {
        return $this->category_name;
    }

    public function insertSubmenuWithSeter () {
        $columns_value = "'$this->product_type','$this->category_name'";
        parent::insertRow($this->table_name,$this->columns_name,$columns_value);
    }

    public function deleteSubmenuWithSeter() {
        parent::deleteRow($this->table_name,"product_id",$this->product_id);
    }

    public function selectSubmenu () {
        return parent::selectRow($this->table_name." INNER JOIN categories ON submenu.category_name = categories.category_name");
    }

    public function editSubmenu () {
        $columns = "product_type = '$this->product_type', category_name = '$this->category_name' ";
        $condition = "product_id = $this->product_id";
        parent::editRow($this->table_name,$columns,$condition);
    }

}



?>