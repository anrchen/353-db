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
            ?>
            <a href="#">Support</a>
            <a href="#">About</a>
        </nav>
    </div>
</header>

<p class="success" style="text-align: center">
<h1>MY PERSONAL INFO</h1>


<?php
$user = $_SESSION['user'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trip";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);



$result = $conn->query("Select * FROM member, memberDetails
                            WHERE member.mid=$user
                            and member.mid = memberDetails.id");

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        $id = $row['id'];
        echo 'ID: '.$id. '<p>';
        $address1 = $row["address1"];
        echo 'ID: '.$address1. '<p>';
        $address2 =  $row["address2"];
        echo 'ID: '.$address2. '<p>';
        $city = $row["city"];
        echo 'ID: '.$city. '<p>';
        $postalCode = $row['postalCode'];
        echo 'ID: '.$postalCode. '<p>';
        $province = $row['province'];
        echo 'ID: '.$province. '<p>';

       // echo '<a href="action_suspend.php?subject='.$DID.'">Suspend this driver!</a><p>';
    }
} else {
    echo "0 results";
}

echo '<a href="index.php">Click here to go home.</a>';
?>
</p>

</body>
</html>

