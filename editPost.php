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

<<<<<<< HEAD
        <nav>
            <?php
            session_start();
            if(isset($_SESSION['user'])){
                echo"
=======
            <h1><a href="index.php">Su<span>per</span></a></h1>

            <nav>
                <?php
                if(isset($_SESSION['user'])){
                    echo"
>>>>>>> origin/feature
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
        <?php
        echo "<h1>  Your Current Postings  </h1>";
        $user = $_SESSION['user'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "trip";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);



        $result = $conn->query("Select * FROM trip
                            WHERE authorID=$user");
        if (!$result) {
            trigger_error('Invalid query: ' . $conn->error);
        }
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {

                echo"<div class='serviceContent'>";

                echo 'Please select the trip that you would like to edit'."<br><br>";
                $TID = $row['TID'];
                echo 'Trip ID: '.$TID;
                echo '<p>';

                $title = $row["Title"];
                echo 'Title: '.$title;
                echo '<p>';

                echo '<p></p></div>';

                echo '<a href="action_edit.php?subject='.$TID.'">Edit!</a>';

            }
        } else {
            echo "0 results";
        }
        ?>
    </p>
</div>






</body>
</html>

<<<<<<< HEAD
=======
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trip";

try {
    $conn = new PDO("mysql:host=$servername;$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        $sql = "INSERT INTO SAILORS (sname, rating, age)
//                VALUES ('John', '8', '18')";
//        $conn->exec($sql);
//        echo "New record created successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

$conn=null;
?>
>>>>>>> origin/feature
