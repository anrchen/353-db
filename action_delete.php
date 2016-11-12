
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
<p>Delete Posts by Trip Number</p>


<?php

$getMyVar = $_GET['subject'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trip";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


$result = $conn->query("DELETE FROM trip
                            WHERE trip.tid=$getMyVar");


echo 'Successfully deleted. <p>';
echo '<a href="deletePost.php">Click here to go back and delete more.</a>';

?>
</p>

</body>
</html>

