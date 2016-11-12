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
                echo "<br><br>Trip ID: ".$row['TID'];
                echo "<br>Departure Date: ".$row['dDate'];
                echo "<br>Arrival Date: ".$row['aDate'];
                echo "<br>Departure Postal Code: ".$row['dPostal'];
                echo "<br>Arrival Postal Code: ".$row['aPostal'];
                echo "<br>Description: ".$row['Description'];
                $city = $row["cityName"];
                if ($row['Restriction']){
                    $city2 = $this->conn->query("SELECT * FROM city WHERE cityName='$city'");
                    echo "<br>Restricted to drivers from the following regions: ";
                    while ($row2 = $city2->fetch_assoc()) {
                        echo $row2['citySurrounded'];
                    }
                }else{
                    echo "<br>No restriction is given by the poster.";
                }
                echo "<br>Departure Date: ".$row['dDate'];
                echo '<a href="action_delete.php?subject='.$row['TID'].'">Yes, delete!</a>';
            }
        }

        public function close(){
            $this->conn->close();
        }
    }



?>