<?php
 class modelProgramsType extends db {
     private $program_type = "";
     private $table_name = "programs_type";
     private $columns_name = "program_type";

     public function setProgramType ($program_type) {
        $this->program_type=$program_type;
     }

     public function getProgramType () {
         return $this->program_type;
     }

     public function insertProgramsTypeWithSeter () {
         $columns_value = "'$this->program_type'";
         parent::insertRow($this->table_name,$this->columns_name,$columns_value);
     }

     public function selectProgramsType() {
         return parent::selectRow($this->table_name);
     }

     public function deleteProTypeWithStr(){
        parent::deleteRowStr ($this->table_name,"program_type",$this->program_type);
    }

 }





?>