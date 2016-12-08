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
    <h2>Delete Posts by Trip Number</h2>
    <?php
    echo"<div class='serviceContent'>";
    $getMyVar = $_GET['subject'];
    $servername = "vpc353_2.encs.concordia.ca";
    $username = "vpc353_2";
    $password = "A5DNm8";
    $dbname = "vpc353_2";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $result = $conn->query("DELETE FROM trip
                            WHERE trip.tid=$getMyVar");
    echo 'Successfully deleted. <p>';
    echo '<a href="index.php">Go Back to Homepage.</a><br>';
    echo '<p></p></div>';
    ?>
</div>

</body>
</html>
