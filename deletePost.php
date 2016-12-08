<?php if(session_status()==PHP_SESSION_NONE){
    session_start();
}
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
    <p class="success" style="text-align: center">


        <?php
        echo "<h1>Delete Posts by Trip Number</h1>";
        $servername = "vpc353_2.encs.concordia.ca";
        $username = "vpc353_2";
        $password = "A5DNm8";
        $dbname = "vpc353_2";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "SELECT * FROM trip";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo"<div class='serviceContent'>";
                $TID =  $row["TID"];
                $dCity = $row['dCity'];
                $aCity = $row['aCity'];
                $author = $row['authorID'];
                echo "Trip ID: " . $row["TID"]. "<br>";
                echo "Author ID: " . $row["authorID"]. "<br>";
                echo "Departure City: " . $row["dCity"]. "<br>";
                echo "Arrival City: " . $row["aCity"]. "<br>";
                echo '<a href="action_delete.php?subject='.$TID.'">Yes, delete!</a>';
                echo '</div><br>';
            }
        } else {
            echo "0 results";
        }
        ?>

        <a href="index.php">Return to Index</a><p>
</div>


</body>
</html>