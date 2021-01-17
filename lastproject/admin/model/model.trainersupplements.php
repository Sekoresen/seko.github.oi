<?php

class modelTrainerSupplement extends db {
    private $trainer_supplement_id = -1;
    private $trainer_id = -1;
    private $supplement_id = -1;
    private $table_name = "trainer_supplement";
    private $columns_name = "trainer_id, supplement_id";

    public function setTrainerSupplementId ($trainer_supplement_id) {
        $this->trainer_supplement_id=$trainer_supplement_id;
    }

    public function getTrainerSupplementId () {
        return $this->trainer_supplement_id;
    }

    public function setTrainerId ($trainer_id) {
        $this->trainer_id=$trainer_id;
    }

    public function getTrainerId () {
        return $this->trainer_id;
    }

    public function setSupplementId ($supplement_id) {
        $this->supplement_id=$supplement_id;
    }

    public function getSupplementId () {
        return $this->supplement_id;
    }

    public function insertTrainerSupplements() {
        $columns_value = "$this->trainer_id, $this->supplement_id";
        parent::insertRow($this->table_name, $this->columns_name, $columns_value);
    }

    public function deleteTrainerSupplements () {
        parent::deleteRow($this->table_name,"trainer_supplement_id", $this->trainer_supplement_id);
    }

    public function selectTrainerSupplement () {
        return parent::selectRow($this->table_name." INNER JOIN trainer ON trainer_supplement.trainer_id = trainer.trainer_id INNER JOIN supplements ON trainer_supplement.supplement_id = supplements.supplement_id");
    }

    public function editTrainerSupplement () {
        $columns = "trainer_id = $this->trainer_id, supplement_id = $this->supplement_id";
        $condition = "trainer_supplement_id = $this->trainer_supplement_id";
        parent::editRow($this->table_name,$columns,$condition);
    }

}



?>