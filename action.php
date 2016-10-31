<?php


echo "Here is my variable".$_POST['formName'];
if(isset($_POST['formName'])){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "person";

    $message = "Defined message";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=person", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        $sql = "CREATE TABLE trip(
//                    Title varchar(20),
//                    Time varchar(20),
//                    Description varchar(255));";
//        $sql = "INSERT INTO trip (title, time, description)
//                VALUES ('$formName', '$timepicker', '$formBody')";
        $sql = "INSERT INTO trip (title, time, description)
                VALUES ('formName', 'timepicker', 'formBody')";
        $conn->exec($sql);
        echo "New record created successfully";
    }
    catch(PDOException $e)
    {
       echo "Connection failed: " . $e->getMessage();
    }

    $conn=null;
}

?>
