<?php

class modelOrders extends db {
    private $order_id= -1;
    private $product_id = -1;
    private $member_id = -1;
    private $payment_status = "";
    private $table_name = "orders";
    private $columns_name = "product_id, member_id, payment_status";

    public function setOrderId ($order_id) {
        $this->order_id=$order_id;
    }

    public function getOrderId () {
        return $this->order_id;
    }

    public function setProductId ($product_id) {
        $this->product_id=$product_id;
    }

    public function getProductId() {
        return $this->product_id;
    }

    public function setMemberId ($member_id) {
        $this->member_id=$member_id;
    }

    public function getMemberId () {
        return $this->member_id;
    }

    public function setPaymentStatus ($payment_status) {
        $this->payment_status=$payment_status;
    }

    public function getPaymentStatus () {
        return $this->payment_status;
    }

    public function insertOrderWithSeter() {
        $columns_value="$this->product_id, $this->member_id, '$this->payment_status'";
        parent::insertRow($this->table_name,$this->columns_name,$columns_value);
    }
    public function deleteOrderWithSeter() {
        parent::deleteRow($this->table_name,"order_id",$this->order_id);
    }
    public function selectOrder () {
        return parent::selectRow($this->table_name." INNER JOIN submenu ON orders.product_id = submenu.product_id INNER JOIN member ON orders.member_id = member.member_id");
    }

    public function editOrder() {
        $columns="product_id = $this->product_id, member_id = $this->member_id, payment_status = '$this->payment_status'";
        $condition ="order_id = $this->order_id";
        parent::editRow($this->table_name,$columns,$condition);
    }
}



?>