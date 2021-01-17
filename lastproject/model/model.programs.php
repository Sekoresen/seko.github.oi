<?php

class modelPrograms extends db {
    private $program_id = -1;
    private $program_name = "";
    private $program_type = "";
    private $table_name = "programs";
    private $columns_name = "program_name, program_type";

    public function setProgramId ($program_id) {
        $this->program_id=$program_id;
    }

    public function getProgramId () {
        return $this->program_id;
    }

    public function setProgramName($program_name) {
        $this->program_name=$program_name;
    }

    public function getProgramName () {
        return $this->program_name;
    }

    public function setProgramType ($program_type) {
        $this->program_type=$program_type;
    }

    public function getProgramType () {
        return $this->program_type;
    }

    public function insertProgramWithSeter() {
        $columns_value = "'$this->program_name','$this->program_type'";
        parent::insertRow($this->table_name,$this->columns_name,$columns_value);
    }

    public function  deleteProgramWithSeter() {
        parent::deleteRow($this->table_name,"program_id",$this->program_id);
    }

    public function selectProgram() {
        return parent::selectRow($this->table_name." INNER JOIN programs_type ON programs.program_type = programs_type.program_type");
    }

    public function editProgram () {
        $columns = "program_name = '$this->program_name', program_type = '$this->program_type' ";
        $condition = "program_id = $this->program_id";
        parent::editRow($this->table_name,$columns,$condition);
    }    


}






?>