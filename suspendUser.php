<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trip";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
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
<h1>Suspend A Member</h1>

<?php
echo "<h4> Here is a list of drivers who has either a complaint, or a rating of 1. </h4>";

$sql = "SELECT driverID, Reviewer, messages FROM driverreview d
        where d.stars =1 
        OR d.complaint = true";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        $reviewer = $row["Reviewer"];
        $DID =  $row["driverID"];
        $reason = $row["messages"];

        echo "Driver ID: " . $row["driverID"]. "<br>";
        echo "Reviewer ID: " . $row["Reviewer"]. "<br>";
        echo "Reason: " . $row["messages"]. "<br>";

        echo '<a href="action_suspend.php?subject='.$DID.'">Suspend this driver!</a><p>';
    }
} else {
    echo "0 results";
}

?>




</body>
</html>

