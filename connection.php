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

        public function showPosts($table){
            $result = $this->conn->query("SELECT * FROM $table");
            while ($row = $result->fetch_assoc()) {
                echo "Trip ID: ".$row['TID'];
                echo "<br>Departure Date: ".$row['dDate'];
                echo "<br>Arrival Date: ".$row['aDate'];
                echo "<br>Departure Postal Code: ".$row['dPostal'];
                echo "<br>Arrival Postal Code: ".$row['aPostal'];
                echo "<br>Description: ".$row['Description'];
                $city = $row["cityName"];
                if ($row['restriction']){
                    $city = $this->conn->query("SELECT citySurrounded FROM $table WHERE cityName=$city");
                    echo "<br>Restricted to drivers from the following regions: ";
                    while ($row2 = $city->fetch_assoc()) {
                        $row2['citySurrounded'];
                    }
                }
                echo "Departure Date: ".$row['dDate'];
            }
        }

        public function close(){
            $this->conn->close();
        }
    }



?>