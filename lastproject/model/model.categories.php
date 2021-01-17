<?php

class modelCategories extends db {
    private $category_name = "";
    private $table_name = "categories";
    private $columns_name = "category_name";

    public function setCategoryName ($category_name) {
        $this->category_name=$category_name;
    }

    public function getCategoryName () {
        return $this->category_name;
    }

    public function insertCategoriesWithSeter() {
        $columns_value ="'$this->category_name'";
        parent::insertRow($this->table_name,$this->columns_name,$columns_value);
    }
    public function selectCategories () {
        return parent::selectRow($this->table_name);
    }
    public function deleteCategoriesWithStr(){
        parent::deleteRowStr ($this->table_name,"category_name",$this->category_name);
    }

    // public function editCategories() {
    //     $columns = "category_name = '$this->category_name'";
    //     $condition = "category_name = '$this->category_name'";
    //     parent::editRow($this->table_name,$columns,$condition);
    // }
}


?>