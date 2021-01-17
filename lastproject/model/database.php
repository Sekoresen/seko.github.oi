<?php

class db {
    private $conn = null;
    private $db_server = "localhost";
    private $db_username = "root";
    private $db_password = "";
    private $db_name = "lastproject";

    public function __construct() {
		try {
			  $this->conn = new PDO("mysql:host=$this->db_server;dbname=$this->db_name", $this->db_username, $this->db_password);
			  // set the PDO error mode to exception
			  $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 // echo "Connected successfully";
			} catch(PDOException $e) {
			  echo "Connection failed: " . $e->getMessage();
			}
	}
    public function insertRow ($table_name, $columns_name, $columns_value) {
        $query="insert into $table_name ($columns_name)
        values ($columns_value)";
        //use exec() because no results are returned
        $this->conn->exec($query);
    }

    public function callStoredProcedure($storedProcedureName, $columns_value) {
        $query="CALL $storedProcedureName($columns_value)";
        //use exec() because no results are returned
        $this->conn->exec($query);
    }

    public function selectRow ($table_name) {
        $query="SELECT * FROM $table_name";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchALL();
    }

    public function deleteRow ($table_name, $pk_name, $pk_value) {
        $query="DELETE FROM $table_name WHERE $pk_name = $pk_value";
        $this->conn->exec($query);
    }
// delete so like
    public function deleteRowStr ($table_name, $pk_name, $pk_value) {
        $query="DELETE FROM $table_name WHERE $pk_name LIKE '$pk_value'";
        $this->conn->exec($query);
    }



    // public function deleteAllRows ($table_name) {
    //     $query="DELETE * FROM $table_name";
    //     $this->conn->exec($query);
    // }

    public function editRow ($table_name, $columns, $condition) {
		$query= "UPDATE $table_name SET $columns WHERE $condition";
		$this->conn->exec($query);
	}
}

?>


