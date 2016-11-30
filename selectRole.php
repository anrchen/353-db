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
                echo"<a>Welcome ".$_SESSION['userName'].", </a>
              <a href=\"logout.php?logout=true\">Log out</a>";
            }else{
                echo"<a href=\"login.php\">Log in</a>";
            }?>
            <a href="editPersonalData.php">Edit Personal Info</a>

            <a href="#">Support</a>
            <a href="#">About</a>
        </nav>
    </div>
</header>


<section class="community">

    <?php
        $driver=0;
        $rider=0;
        $admin=0;
        $MID = $_SESSION['user'];

        $servername = "vpc353_2.encs.concordia.ca";
        $username = "vpc353_2";
        $password = "A5DNm8";
        $dbname = "vpc353_2";


        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql="SELECT isAdmin, isDriver, isRider FROM member WHERE MID='$MID'";
        $result = $conn->query($sql);
    echo'Hello'.$sql;
        if ($result->num_rows > 0) {
            echo'Hello';
        while($row = $result->fetch_assoc()) {
                if ($row['isRider'] == 1) {
                    $rider = true;
                }
                if ($row['isDriver'] == 1) {
                    $driver = true;
                }
                if ($row['isAdmin'] == 1) {
                    $admin = true;
                }
            }
        }
        $conn->close();
    ?>
    <div class="category">
<?php
   if($driver){
?>
        <a href="index.php?role=driver" class="serviceContent">
            <img src="Images/viewTemplate.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Driver
                </h1>
                <span class="serviceDescription">
                    Log in as a driver!
                            </span>
            </div>
        </a>
<?php
    }
    if($rider) {
?>

        <a href="index.php?role=rider" class="serviceContent">
            <img src="Images/createTemplateRider2.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Rider
                </h1>
                <span class="serviceDescription">
                    Log in as a rider!
                            </span>
            </div>
        </a>
<?php
    }
    if($admin){
?>
        <a href="index.php?admin=7hajqnnk00i6isp3gr4q60tncc" class="serviceContent">
            <img src="Images/createTemplateRider2.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Administrator
                </h1>
                <span class="serviceDescription">
                    Log in as an administrator!
                            </span>
            </div>
        </a>
<?php
    }
?>
    </div>


    <footer>
        <p>All rights reserved</p>
    </footer>
</body>
</html>