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
            $user = $_SESSION['user'];
            ?>
            <a href="#">Log in</a>
            <a href="#">About</a>
        </nav>
    </div>
</header>


<div class="match" style="text-align: center">
    <p class="success" style="text-align: center">
        <?php
        echo"<div class='serviceContent'>";
        $servername = "vpc353_2.encs.concordia.ca";
        $username = "vpc353_2";
        $password = "A5DNm8";
        $dbname = "vpc353_2";
        $conn = new mysqli($servername, $username, $password, $dbname);
        $TID=$_GET['TID'];
        $dCity=$_GET['dCity'];
        $aCity=$_GET['aCity'];
        $dPostal=$_GET['dPostal'];
        $aPostal=$_GET['aPostal'];
        $Title=$_GET['title'];
        $desc=$_GET['desc'];
        echo "My New Updated Result<P>";
        echo "TID: " .$TID;
        echo "<P>";
        echo "Departure City: " .$dCity;
        echo "<P>";
        echo "Arrival City: " .$aCity;
        echo "<P>";
        echo "Departure Postal Code: " .$dPostal;
        echo "<P>";
        echo "Arrival Postal Code: " . $aPostal ;
        echo "<P>";
        echo "Title: " .$Title;
        echo "<P>";
        echo "Description: " .$desc;
        echo "<P>";
        $result = $conn->query("UPDATE trip
                                SET dCity = '$dCity',
                                 aCity = '$aCity',
                                 dPostal = '$dPostal',
                                 aPostal = '$aPostal',
                                 Title = '$Title',
                                 Description = '$desc'
                                WHERE TID = '$TID';
                                ");
        echo '<p>'.'Your trip has been successfully updated.  ';
        echo '<p>';
        echo '<a href="index.php">Go Back To Home Page.</a>';
        echo '<p></p></div>';
        ?>
    </p>
</div>


</body>
</html>