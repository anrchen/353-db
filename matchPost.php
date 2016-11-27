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
            <a href="#">Support</a>
            <a href="#">Log in</a>
            <a href="#">About</a>
        </nav>
    </div>
</header>

<div class="match" style="text-align: center">
    <?php
    session_start();
    $lastID = $_SESSION['newPost'];
    include_once ('connection.php');
    $con = new Connection();
    $query = "SELECT * FROM trip t1, trip t2
                            WHERE t1.dDate=t2.dDate and t1.dCity=t2.dCity
                            and t1.aCity=t2.aCity and t1.Tid=$lastID and t2.TID!=$lastID";
    $con->setQuery($query);
    $con->showPosts('');
    $con->close();
    ?>
</div>

</body>
</html>