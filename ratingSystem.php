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
<h1>Rate A Driver</h1>


<?php
$user = $_SESSION['user'];
// Username is now used and added, please fix the query
$sql = "SELECT  Username FROM member m1, member m2
          where m2.Role = 'driver' and m1.Role='rider'
          and m1.MID='$user'
          ORDER BY MID
          ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $Username =  $row["Username"];
        $type= "Driver";
        echo "Driver ID: " . $row["MID"]. "<br>";
        echo '<a href="action_rate_form.php?subject2='.$type.'&subject1='.$Username.'">Yes, rate this driver!</a><p>';
    }
} else {
    echo "0 results";
}

?>

<p class="success" style="text-align: center">
<h1>Rate A TRIP</h1>

<?php


$sql = "SELECT  TID FROM trip
        WHERE MID='$user'
        ORDER BY TID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $TID =  $row["TID"];
        $type= "Trip";
        echo "TRIP ID: " . $row["TID"]. "<br>";
        echo '<a href="action_rate_form.php?subject1='.$TID.'&subject2='.$type.'">Yes, rate this trip!</a><p>';
    }
} else {
    echo "0 results";
}

?>

</body>
</html>

