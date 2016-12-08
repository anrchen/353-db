<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

<header class="header-basic">
    <link rel="stylesheet" type="text/css" href="assets/css/header.css">
    <link rel="stylesheet" type="text/css" href="assets/css/addPost.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css"/>

    <div class="header-limiter">

        <h1><a href="index.php">Su<span>per</span></a></h1>

        <nav>
            <?php
            include_once 'dbconnect.php';
            $servername = "vpc353_2.encs.concordia.ca";
            $username = "vpc353_2";
            $password = "A5DNm8";
            $dbname = "vpc353_2";
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            if(isset($_SESSION['user'])){
                echo"
                <a>Welcome ".$_SESSION['userName'].
                    ", </a>
                <a href=\"logout.php?logout=true\">Log out</a>
                ";
            }else{
                echo"
                <a href=\"login.php\">Log in</a>
                ";
            }
            $MID = $_SESSION['user'];
            ?>
            <a href="#">Support</a>
            <a href="#">About</a>
        </nav>
    </div>
</header>

<div class="match" style="text-align: center">
    <p class="success" style="text-align: center">
        <?php
        echo "Selected City for Search: ";
        echo $_GET['search'];
        echo $_GET['selectRole'];
        //if(isset($_GET['selectRole']) and isset($_GET['search'])){
        if(isset($_GET['search'])){
            $lookIn = $_GET['search'];
            $sql = "SELECT * FROM trip WHERE (dCity='$lookIn' OR aCity='$lookIn') AND role=1";
            //AND role='SelectRole'";
            $result = mysql_query($sql);//$conn->query($sql);
            /*$sql = "SELECT * FROM trip WHERE (dCity='$lookIn' OR aCity='$lookIn')";
                      //AND role='SelectRole'";
              $result = mysql_query($sql);//$conn->query($sql);
              */
            $sql2 = "SELECT * FROM trip WHERE (dCity='$lookIn' OR aCity='$lookIn') AND role=0";
            //AND role='SelectRole'";
            $result2 = mysql_query($sql2);//$conn->query($sql);
//die(mysql_error());
            echo "<br><br>POSTED BY DRIVERS:";
            if (mysql_num_rows($result) > 0) {
                // output data of each row
                while($row = mysql_fetch_assoc($result)) {
                    $TID =  $row["TID"];
                    $_SESSION['location'] = $row['dCity'].' to '.$row['aCity'];
                    echo "<br><div class='serviceContent'>";
                    echo "Trip ID: ".$row['TID'];
                    echo "<br>Title: ".$row['Title'];
                    echo "<br>Departure Date: ".$row['dDate'];
                    echo "<br>--------------------";
                    echo "<br>Departure City: ".$row['dCity'];
                    echo "<br>Departure Postal Code: ".$row['dPostal'];
                    echo "<br>--------------------";
                    echo "<br>Arrival City: ".$row['aCity'];
                    echo "<br>Arrival Postal Code: ".$row['aPostal'];
                    echo "<br>--------------------";
                    echo "<br>Description: ".$row['Description'];
                    $city = $row["dCity"];
                    if ($row['Restriction']){
                        $city2 = $conn->query("SELECT * FROM city WHERE cityName='$city'");
                        echo "<br>--------------------";
                        echo "<br>Restricted to drivers from the following regions: ";
                        while ($row2 = $city2->fetch_assoc()) {
                            echo $row2['citySurrounded'];
                        }
                    }
                    echo "</div>";
                }
            } else {
                echo "<br>0 results";
            }
            echo "<br>POSTED BY RIDERS: <br>";
            if (mysql_num_rows($result2) > 0) {
                // output data of each row
                while($rowT = mysql_fetch_assoc($result2)) {
                    $TIDT =  $rowT["TID"];
                    $_SESSION['location'] = $rowT['dCity'].' to '.$rowT['aCity'];
                    echo "<br><div class='serviceContent'>";
                    echo "Trip ID: ".$rowT['TID'];
                    echo "<br>Title: ".$rowT['Title'];
                    echo "<br>Departure Date: ".$rowT['dDate'];
                    echo "<br>--------------------";
                    echo "<br>Departure City: ".$rowT['dCity'];
                    echo "<br>Departure Postal Code: ".$rowT['dPostal'];
                    echo "<br>--------------------";
                    echo "<br>Arrival City: ".$rowT['aCity'];
                    echo "<br>Arrival Postal Code: ".$rowT['aPostal'];
                    echo "<br>--------------------";
                    echo "<br>Description: ".$rowT['Description'];
                    $cityT = $rowT["dCity"];
                    if ($rowT['Restriction']){
                        $city2T = $conn->query("SELECT * FROM city WHERE cityName='$cityT'");
                        echo "<br>--------------------";
                        echo "<br>Restricted to drivers from the following regions: ";
                        while ($row2T = $city2T->fetch_assoc()) {
                            echo $row2T['citySurrounded'];
                        }
                    }
                    echo "</div>";
                }
            } else {
                echo "<br>0 results<br>";
            }
            $conn->close();
            //Search by city using search
        }
        ?>

        <a href="index.php">Return to Index</a><p>
    </p>
</div>

</body>
</html>