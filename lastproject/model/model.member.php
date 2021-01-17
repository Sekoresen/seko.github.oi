<?php

class modelMember extends db {
    private $member_id = -1;
    private $member_name = "";
    private $member_surname = "";
    private $member_email = "";
    private $member_phonenumber = -1;
    private $member_hometown = "";
    private $table_name = "member";
    private $columns_name = "member_name, member_surname, member_email, member_phonenumber, member_hometown";

    public function setMemberId ($member_id) {
        $this->member_id=$member_id;
    }

    public function getMemberId () {
        return $this->member_id;
    }

    public function setMemberName ($member_name) {
        $this->member_name=$member_name;
    }

    public function getMemberName () {
        return $this->member_name;
    }

    public function setMemberSurname ($member_surname){
        $this->member_surname=$member_surname;
    }

    public function getMemberSurname () {
        return $this->member_surname;
    }

    public function setMemberEmail ($member_email) {
        $this->member_email=$member_email;
    }

    public function getMemberEmail () {
        return $this->member_email;
    }

    public function setMemberPhonenumber($member_phonenumber) {
        $this->member_phonenumber=$member_phonenumber;
    }

    public function getMemberPhonenumber () {
        return $this->member_phonenumber;
    }

    public function setMemberHometown ($member_hometown) {
        $this->member_hometown=$member_hometown;
    }

    public function getMemberHometown () {
        return $this->member_hometown;
    }

 public function insertMemberWithSeter() {
     $columns_value = "'$this->member_name','$this->member_surname','$this->member_email',$this->member_phonenumber, '$this->member_hometown'";
     parent::insertRow($this->table_name,$this->columns_name,$columns_value);
    //  storedProcedures
 }
 public function insertMemberWithoutSeter($member_name,$member_surname,$member_email,$member_phonenumber,$member_hometown) {
     $columns_value="'$member_name','$member_surname','$member_email', $member_phonenumber, '$member_hometown'";
     parent::insertRow($this->table_name,$this->columns_name,$columns_value);
 }

 public function selectMember() {
     return parent::selectRow ($this->table_name);
    //  storedProcedures
 }

public function editMember () {
    $columns = "member_name = '$this->member_name', member_surname = '$this->member_surname', member_email='$this->member_email', member_phonenumber='$this->member_phonenumber', member_hometown='$this->member_hometown'";
    $condition = "member_id = $this->member_id";
    parent::editRow($this->table_name,$columns,$condition);
}
public function deleteMemberWithSeter() {
    parent::deleteRow($this->table_name,"member_id",$this->member_id);
}
public function deleteMemberWithoutSeter($member_id) {
    parent::deleteRow($this->table_name,"member_id",$this->member_id);
}

}


?>