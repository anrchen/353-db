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



<p class="success" style="text-align: center">
<h1>Rate a driver that you have gone with</h1>
<div class="match" style="text-align: center">
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
        echo 'You have gone with ';
        $MID =  $row["authorID"];
        $type= "Driver";
        echo "username: " . $row["Username"];
        echo " (ID: " . $row["authorID"]. ")<br>";
        echo '<a href="action_rate_form.php?subject2='.$type.'&subject1='.$MID.'">Yes, rate this driver!</a><p>';
    }
} else {
    echo "<br>You <span style='color:orangered;'>have not taken</span> any trip with us yet!";
}

?>
</div>
<p class="success" style="text-align: center">

<h1>Rate a trip that you have taken</h1>
<div class="match" style="text-align: center">
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
        echo 'You have taken ';
        $TID =  $row["TID"];
        $type= "Trip";
        $dCity = $row["dCity"];
        $aCity = $row["aCity"];
        echo "trip number " . $TID. " ,from ". $dCity." to ".$aCity.". <br>";
        echo '<a href="action_rate_form.php?subject1='.$TID.'&subject2='.$type.'">Yes, rate this trip!</a><p>';
    }
} else {
    echo "You <br><span style='color:orangered;'>have not taken</span> any trip with us yet!";
}

?>
</div>

</body>
</html>

