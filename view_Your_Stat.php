<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trip";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
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
            $user = $_SESSION['user'];
            ?>
            <a href="#">Support</a>
            <a href="#">About</a>
        </nav>
    </div>
</header>




<div class="match" style="text-align: center">
    <p class="success" style="text-align: center">
    <h1>My History</h1>
    <?php
    echo"<div class='serviceContent'>";

    $result = $conn->query("SELECT registerDate FROM memberDetails
                            Where id = '$user'              ");
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            $date =  $row["registerDate"];
            echo '<b>Joined Date: </b>'. $date."<br>"."<br>";

        }
    } else {
        echo "0 results";
    }


    $result = $conn->query("SELECT COUNT(*) FROM trip where authorID = '$user'");
    $row = $result->fetch_row();
    echo '<b>Total Trips Posted: </b>'. $row[0]."<br>"."<br>";

    $result = $conn->query("SELECT COUNT(*) FROM trip where authorID = '$user' AND matchedID IS Null");
    $row = $result->fetch_row();
    echo '<b>Trips Not Matched: </b>'. $row[0]."<br>"."<br>";

    $result = $conn->query("SELECT COUNT(*) FROM trip where authorID = '$user' AND matchedID IS NOT Null");
    $row = $result->fetch_row();
    echo '<b>Trips Matched: </b>'. $row[0]."<br>"."<br>";

    $result = $conn->query("SELECT avg(stars) FROM driverreview where driverID = '$user'");
    $row = $result->fetch_row();
    echo '<b>My User Average Rating: </b>'. $row[0]."<br>"."<br>";

    $result = $conn->query("SELECT avg(stars) FROM tripreview, trip t
                            where t.authorID = '$user'
                            AND t.TID = reviewTrip");
    $row = $result->fetch_row();
    echo '<b>My Trip Average Rating: </b>'. $row[0]."<br>"."<br>";






    echo '</div>';
    ?>
    </p>
</div>


</body>
</html>

