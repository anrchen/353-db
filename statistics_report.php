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
    <h1>Member Statistics</h1>
        <?php
        echo"<div class='serviceContent'>";

        $result = $conn->query("SELECT COUNT(*) FROM member");
        $row = $result->fetch_row();
        echo 'Total Number of Members Registered: '. $row[0]."<br>"."<br>";


        $result = $conn->query("SELECT COUNT(*) FROM member where status=1");
        $row = $result->fetch_row();
        echo 'Total Number of Members Active: '. $row[0]."<br>"."<br>";

        $result = $conn->query("SELECT COUNT(*) FROM member where status=2");
        $row = $result->fetch_row();
        echo 'Total Number of Members Inactive: '. $row[0]."<br>"."<br>";

        $result = $conn->query("SELECT COUNT(*) FROM member where status=0");
        $row = $result->fetch_row();
        echo 'Total Number of Members Suspended: '. $row[0]."<br>"."<br>";

        $result = $conn->query("SELECT COUNT(*) FROM member where isAdmin=1");
        $row = $result->fetch_row();
        echo 'Total Number of Administrator: '. $row[0]."<br>"."<br>";

        $result = $conn->query("SELECT COUNT(*) FROM member where isAdmin=1");
        $row = $result->fetch_row();
        echo 'Total Number of Administrator: '. $row[0]."<br>"."<br>";

        $result = $conn->query("SELECT COUNT(*) FROM memberDetails where city='Montreal'");
        $row = $result->fetch_row();
        echo 'Total Number of Members Reside in Montreal: '. $row[0]."<br>"."<br>";

        $result = $conn->query("SELECT COUNT(*) FROM memberDetails where city='Toronto'");
        $row = $result->fetch_row();
        echo 'Total Number of Members Reside in Toronto: '. $row[0]."<br>"."<br>";

        $result = $conn->query("SELECT COUNT(*) FROM memberDetails where city='New York'");
        $row = $result->fetch_row();
        echo 'Total Number of Members Reside in New York: '. $row[0]."<br>"."<br>";

        $result = $conn->query("SELECT COUNT(*) FROM memberDetails where license IS NOT NULL");
        $row = $result->fetch_row();
        echo 'Total Number of Members Who Does Have a License: '. $row[0]."<br>"."<br>";

        $result = $conn->query("SELECT COUNT(*) FROM memberDetails where license IS NULL");
        $row = $result->fetch_row();
        echo 'Total Number of Members Who Does Not Have a License: '. $row[0]."<br>"."<br>";

        $result = $conn->query("SELECT COUNT(*) FROM driverreview where stars >6 or stars = 6");
        $row = $result->fetch_row();
        echo 'Total Number of Members with a Rating Over Six: '. $row[0]."<br>"."<br>";

        $result = $conn->query("SELECT COUNT(*) FROM driverreview where complaint = 'true'");
        $row = $result->fetch_row();
        echo 'Total Number of Members that got a Complaint: '. $row[0]."<br>"."<br>";

        echo '</div>';
        ?>
    </p>
</div>

<div class="match" style="text-align: center">
    <p class="success" style="text-align: center">
    <h1>Trip Statistics</h1>
    <?php
    echo"<div class='serviceContent'>";

    $result = $conn->query("SELECT COUNT(*) FROM trip");
    $row = $result->fetch_row();
    echo 'Total Number of Trips: '. $row[0]."<br>"."<br>";

    $result = $conn->query("SELECT COUNT(*) FROM trip where matchedID IS NOT NULL");
    $row = $result->fetch_row();
    echo 'Total Number of Trips Matched: '. $row[0]."<br>"."<br>";

    $result = $conn->query("SELECT COUNT(*) FROM trip where matchedID IS NULL");
    $row = $result->fetch_row();
    echo 'Total Number of Trips Not Matched: '. $row[0]."<br>"."<br>";

    $result = $conn->query("SELECT COUNT(*) FROM trip where dDate > 2000-01-01");
    $row = $result->fetch_row();
    echo 'Total Number of Trips Post 2000: '. $row[0]."<br>"."<br>";

    $result = $conn->query("SELECT COUNT(*) FROM trip where dDate < 2000-01-01");
    $row = $result->fetch_row();
    echo 'Total Number of Trips Before 2000: '. $row[0]."<br>"."<br>";

    $result = $conn->query("SELECT COUNT(*) FROM trip where dCity = 'Montreal'");
    $row = $result->fetch_row();
    echo 'Total Number of Trips Depart From Montreal: '. $row[0]."<br>"."<br>";

    $result = $conn->query("SELECT COUNT(*) FROM trip where aCity = 'Montreal'");
    $row = $result->fetch_row();
    echo 'Total Number of Trips Arrive In Montreal: '. $row[0]."<br>"."<br>";

    $result = $conn->query("SELECT COUNT(*) FROM trip where Category = 'specialized'");
    $row = $result->fetch_row();
    echo 'Total Number of Specialized Trips: '. $row[0]."<br>"."<br>";

    $result = $conn->query("SELECT COUNT(*) FROM trip where Category = 'normal'");
    $row = $result->fetch_row();
    echo 'Total Number of Regular Trips: '. $row[0]."<br>"."<br>";

    $result = $conn->query("SELECT COUNT(*) FROM tripreview where stars >6 or stars = 6");
    $row = $result->fetch_row();
    echo 'Total Number of Trips with a Rating Over Six: '. $row[0]."<br>"."<br>";

    $result = $conn->query("SELECT COUNT(*) FROM tripreview where complaint = 'true'");
    $row = $result->fetch_row();
    echo 'Total Number of Trips that got a Complaint: '. $row[0]."<br>"."<br>";

    echo '</div>';
    ?>
    </p>
</div>

</body>
</html>

