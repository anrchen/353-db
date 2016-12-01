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
                echo"<a>Welcome ".$_SESSION['userName'].", </a>
                     <a href=\"logout.php?logout=true\">Log out</a>";
            }else{
                echo"<a href=\"login.php\">Log in</a>";
            }
            ?>
            <a href="#">Support</a>
            <a href="#">About</a>
        </nav>
    </div>
</header>


<div class="match" style="text-align: center">
    <p class="success" style="text-align: center">
<h2>Temporarily Suspend A Driver</h2>


<?php
echo"<div class='serviceContent'>";
$getMyVar = $_GET['subject'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trip";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$result = $conn->query("
                   UPDATE member SET Status = 0
                    WHERE MID=$getMyVar;
                            ");


echo 'Successfully Suspended this driver. <p>';
echo '<a href="index.php">Click here to go home.</a>';
echo '<p></p></div>';

?>
    </p>
</div>

</body>
</html>

