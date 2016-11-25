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
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/addPost.css"/>


    <div class="header-limiter">

        <h1><a href="index.php">Su<span>per</span></a></h1>

        <nav>
            <a href="#">Support</a>
            <a href="#">Log in</a>
            <a href="#">About</a>
        </nav>
    </div>
</header>

<p class="success" style="text-align: center">
<h1>Rate A Driver</h1>


<?php
/* PHILIP *
    need to fix the condition,
    with session user id matching the driver he has been with

    something like
    "SELECT  MID FROM member
          where Role = 'driver'
     ***  AND "driver and rider has been on the same trip"          ***
          ORDER BY MID
          ";
*/
$sql = "SELECT  MID FROM member
          where Role = 'driver'
          ORDER BY MID
          ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $MID =  $row["MID"];
        $type= "Driver";
        echo "Driver ID: " . $row["MID"]. "<br>";
        echo '<a href="action_rate_form.php?subject2='.$type.'&subject1='.$MID.'">Yes, rate this driver!</a><p>';
    }
} else {
    echo "0 results";
}

?>

<p class="success" style="text-align: center">
<h1>Rate A TRIP</h1>

<?php


$sql = "SELECT  TID FROM trip
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

