<?php

    class Connection{

        public $servername = "localhost";
        protected $username = "root";
        protected $password = "";
        public $dbname = "trip";

        public $conn;

        public function __construct()
        {
            // Create connection
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        }

        public function displaySelectList($attribute, $table, $selected){
            $result = $this->conn->query("SELECT $attribute FROM $table");
            echo "<select name='id'> 
                      <option selected value='default'>$selected</option>>";
            while ($row = $result->fetch_assoc()) {
                $id = $row['$attribute'];
                echo '<option value="">'.$id.'</option>';
            }
            echo "</select>";
        }


        public function close(){
            $this->conn->close();
        }
    }



?>