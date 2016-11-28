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
                <a>Welcome ".$_SESSION['userName'].
                    ", </a>
                <a href=\"logout.php?logout=true\">Log out</a>
                ";
            }else{
                echo"
                <a href=\"login.php\">Log in</a>
                ";
            }
            $MID = $_SESSION['user'];
            $_SESSION['role']=$_GET['role'];
            $role = $_SESSION['role'];
            ?>
            <a href="#">Support</a>
            <a href="#">About</a>
        </nav>
    </div>
</header>

<p class="success" style="text-align: center">
    <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "trip";

        if($role=='rider'){
            $role=0;
        }else{
            $role=1;
        }

            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT tid FROM trip WHERE authorID='$MID' 
                    AND role=$role";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {

                    $TID =  $row["tid"];

                    echo "Trip ID: " . $row["tid"]. "<br>";
                    echo '<a href="matchPost.php?match='.$TID.'">Yes, match!</a><p>';
                }
            } else {
                echo "0 results";
            }

            $conn->close();

    ?>
</p>

</body>
</html>


