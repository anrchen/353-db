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
<h1>CURRENT PERSONAL INFO</h1>


<?php
$user = $_SESSION['user'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trip";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);



$result = $conn->query("Select * FROM memberDetails
                            WHERE memberDetails.id=$user");
if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        $id = $row['id'];
        echo 'ID: '.$id;
        echo '<p>';

        $address1 = $row["address1"];
        echo 'Address1: '.$address1;
        echo '<p>';

        $address2 =  $row["address2"];
        echo 'Address2: '.$address2;
        echo '<p>';

        $city = $row["city"];
        echo 'City: '.$city;
        echo '<p>';

        $postalCode = $row['postalCode'];
        echo 'Postal Code: '.$postalCode;
        echo '<p>';

        $province = $row['province'];
        echo 'Province: '.$province;
        echo '<p>';

    }
} else {
   echo "0 results";
}
?>
</p>
<h1>INPUT CHANGES</h1> <h5>(by completing the form)</h5>
<form method="get" action="action_ChangeMyData.php">

    <label>Address1</label>
    <input type="text" name="address1" id="address1"  class="inputBox">
    <p></p>
    <label>Address2</label>
    <input type="text" name="address2" id="address2"  class="inputBox">
    <p></p>
    <label>City</label>
    <input type="text" name="city" id="city"  class="inputBox">
    <p></p>
    <label>Postal Code</label>
    <input type="text" name="pc" id="pc"  class="inputBox">
    <p></p>
    <label>Province</label>
    <input type="text" name="province" id="province"  class="inputBox">
    <p></p>
            <input type="submit" id="" value="Change">


    <?php
    echo '<p>';
    echo '<p>';
    echo '<a href="index.php">Click here to go home.</a>';
    ?>
</body>
</html>

