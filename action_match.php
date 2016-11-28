<?php
    session_start();
    $postID = $_SESSION['newPost'];
    $matchID = $_GET['match'];
    include_once ('connection.php');

    $con = new Connection();
    $query="UPDATE trip SET matchedID='$matchID', status='2' WHERE TID='$postID';
            UPDATE trip SET matchedID='$postID', status='2' WHERE TID='$matchID'";
    $con->setQuery($query);
    $con->execute();
    $con->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv=REFRESH CONTENT=10;url=action_pay.php>

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
    Your trip has been <span style="color:#1bcd00;">successfully</span>
    matched, you will be redirected to payment page in 10 seconds.

</p>



</body>
</html>

