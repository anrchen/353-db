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
                                <a>Welcome ".$_SESSION['user'].
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
    <h1>Rate Your Driver</h1>
<?php
$user = $_SESSION['user'];
// Username is now used and added, please fix the query
$sql = "SELECT account.Username, trip.authorID FROM trip, account, member
          where trip.matchedID='$user'
          and member.MID = trip.authorID
          and member.MID = account.MID
          ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        echo"<div class='serviceContent'>";
        echo 'You have gone with ';
        $MID =  $row["authorID"];
        $type= "Driver";
        echo "username: " . $row["Username"];
        echo " (ID: " . $row["authorID"]. ")<br><br>";
        echo '<a href="action_rate_form.php?subject2='.$type.'&subject1='.$MID.'">Yes, rate this driver!</a><p>';
        echo '<p></p></div>';

    }
} else {
    echo "<br>You <span style='color:orangered;'>have not taken</span> any trip with us yet!";
}

?>
    </p>
</div>

<div class="match" style="text-align: center">
    <p class="success" style="text-align: center">
    <h1>Rate Your Trip</h1>
<?php
$user = $_SESSION['user'];

$sql = "SELECT  TID, dCity, aCity FROM trip, member
        WHERE member.MID='$user'
        And member.MID = trip.authorID
        ORDER BY TID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo"<div class='serviceContent'>"; 
        echo 'You have taken ';
        $TID =  $row["TID"];
        $type= "Trip";
        $dCity = $row["dCity"];
        $aCity = $row["aCity"];
        echo "trip number " . $TID. " ,from ". $dCity." to ".$aCity.". <br><br>";
        echo '<a href="action_rate_form.php?subject1='.$TID.'&subject2='.$type.'">Yes, rate this trip!</a><p>';
        echo '<p></p></div>';

    }
} else {
    echo "You <br><span style='color:orangered;'>have not taken</span> any trip with us yet!";
}

?>
    </p>
</div>

</body>
</html>

