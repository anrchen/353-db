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
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/header.css">
    <link rel="stylesheet" type="text/css" href="assets/css/nav.css">
</head>

<body bgcolor="#add8e6">

<header class="header-basic">

    <div class="header-limiter">

        <h1><a href="#">Su<span>per</span></a></h1>

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
            $user = $_SESSION['user'];

            ?>
            <a href="#">Support</a>
            <a href="#">About</a>
        </nav>
    </div>
</header>
<div class="match" style="text-align: center">
    <p class="success" style="text-align: center">
<?php

echo '<h1> My Balance </h1>';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trip";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


$sql = "SELECT Balance FROM account where MID='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        echo"<div class='serviceContent'>";
        $Balance =  $row["Balance"];


        echo "<h2><center> Your Current Balance: " . $row["Balance"]. "</center></h2>";


        echo '</div>';
    }
} else {
    echo "No Balance";
}

?>
    </p>
</div>
<section class="community">
    <div class="match" style="text-align: center">
        <p class="success" style="text-align: center">

    <div class="category">
        <header class="categoryHeader">
            <h1 class="categoryHeading">Select the amount of money you wish to add</h1>
        </header>

        <a target="_blank" href="action_addBalance.php?add=10" class="serviceContent">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    $10 CAD
                </h1>
            </div>
        </a>
        <a target="_blank" href="action_addBalance.php?add=20" class="serviceContent">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    $20 CAD
                </h1>
            </div>
        </a>
        <a target="_blank" href="action_addBalance.php?add=50" class="serviceContent">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    $50 CAD
                </h1>
            </div>
        </a>

        <a target="_blank" href="action_addBalance.php?add=100" class="serviceContent">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    $100 CAD
                </h1>

            </div>
        </a>

    </div>
        </p>
    </div>

    <footer>
        <p>All rights reserved</p>
    </footer>
</body>
</html>