<?php
 class modelTrainer extends db {
     private $trainer_id = -1;
     private $trainer_name = "";
     private $trainer_surname = "";
     private $trainer_experience = -1;
     private $trainer_program = "";
     private $trainer_img = "";
     private $table_name = "trainer";
     private $columns_name = "trainer_name, trainer_surname, trainer_experience, trainer_program, trainer_img";

     public function setTrainerId($trainer_id) {
         $this->trainer_id=$trainer_id;
     }

     public function getTrainerId () {
         return $this->trainer_id;
     }

     public function setTrainerName ($trainer_name) {
         $this->trainer_name=$trainer_name;
     }

     public function getTrainerName () {
         return $this->trainer_name;
     }

     public function setTrainerSurname ($trainer_surname) {
         $this->trainer_surname=$trainer_surname;
     }

     public function getTrainerSurname () {
         return $this->trainer_surname;
     }

     public function setTrainerExperience ($trainer_experience) {
         $this->trainer_experience=$trainer_experience;
     }

     public function getTrainerExperience () {
         return $this->trainer_experience;
     }

     public function setTrainerProgram ($trainer_program) {
         $this->trainer_program=$trainer_program;
     }

     public function getTrainerProgram () {
         return $this->trainer_program;
     }

     public function setTrainerImg ($trainer_img) {
         $this->trainer_img=$trainer_img;
     }

     public function getTrainerImg () {
         return $this->trainer_img;
     }

     public function insertTrainerWithSeter () {
         $columns_value ="'$this->trainer_name','$this->trainer_surname',$this->trainer_experience,'$this->trainer_program','$this->trainer_img'";
         parent::insertRow($this->table_name,$this->columns_name,$columns_value);
     }

     public function deleteTrainerWithSeter() {
         parent::deleteRow($this->table_name,"trainer_id", $this->trainer_id);
     }

     public function selectTrainer() {
         return parent::selectRow($this->table_name);
     }

     public function editTrainer() {
         $columns = "trainer_name = '$this->trainer_name', trainer_surname = '$this->trainer_surname', trainer_experience = $this->trainer_experience, trainer_program = '$this->trainer_program', trainer_img = '$this->trainer_img'";
         $condition = "trainer_id = $this->trainer_id";
         parent::editRow($this->table_name,$columns,$condition);
     }

 }





?>