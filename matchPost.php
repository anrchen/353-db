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
            session_start();
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
            ?>
            <a href="#">Support</a>
            <a href="#">About</a>
        </nav>
    </div>
</header>

<div class="match" style="text-align: center">
    <?php

    if(isset($_GET['match'])){
        $_SESSION['newPost']=$_GET['match'];
    }

    if(isset($_SESSION['newPost'])){
        $lastID = $_SESSION['newPost'];
        $user = $_SESSION['user'];
        $role = $_SESSION['role'];

        if($role=='rider'){
            $lookingStatus=1;
        }else{
            $lookingStatus=0;
        }

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "trip";


        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM trip t1, trip t2
                  WHERE t1.dDate=t2.dDate and t1.dCity=t2.dCity
                  and t1.aCity=t2.aCity and t1.authorID='$user' and t2.authorID!='$user'
                  and t2.status=$lookingStatus and t1.TID=$lastID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {

                $TID =  $row["TID"];

                echo "<br><div class='serviceContent'>";
                echo "Trip ID: ".$row['TID'];
                echo "<br>Departure Date: ".$row['dDate'];
                echo "<br>Departure Postal Code: ".$row['dPostal'];
                echo "<br>Arrival Postal Code: ".$row['aPostal'];
                echo "<br>Description: ".$row['Description'];
                $city = $row["dCity"];
                if ($row['Restriction']){
                    $city2 = $this->conn->query("SELECT * FROM city WHERE cityName='$city'");
                    echo "<br>Restricted to drivers from the following regions: ";
                    while ($row2 = $city2->fetch_assoc()) {
                        echo $row2['citySurrounded'];
                    }
                }
                echo "</div>";
                echo '<a href="action_match?match='.$TID.'">Yes, match!</a><p>';
            }
        } else {
            echo "0 results";
        }

        $conn->close();
    }


    ?>
</div>

</body>
</html>