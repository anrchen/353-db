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
                                <a>Welcome ".$_SESSION['userName'].
                    ", </a>
                                <a href=\"logout.php?logout=true\">Log out</a>
                            ";
            }else{
                echo"
                                <a href=\"login.php\">Log in</a>
                            ";
            }
            $user = $_SESSION['user'];
            $TID = $_GET['subject'];
            ?>
            <a href="#">Support</a>
            <a href="#">About</a>
        </nav>
    </div>
</header>






<div class="match" style="text-align: center">
    <h1>Profile update</h1> <h5>Please complete the following form</h5>
    <form method="get" action="action_edit_result.php">

        <div class='serviceContent'>
            <input type='hidden' name='TID' value='<?php echo "$TID";?>'/>
            <label>Departure City</label>
            <input type="text" name="dCity" id="dCity"  class="inputBox">
            <p></p>
            <label>Arrival City</label>
            <input type="text" name="aCity" id="aCity"  class="inputBox">
            <p></p>
            <label>Departure Postal Code</label>
            <input type="text" name="dPostal" id="dPostal"  class="inputBox">
            <p></p>
            <label>Arrival Postal Code</label>
            <input type="text" name="aPostal" id="aPostal"  class="inputBox">
            <p></p>
            <label>Title</label>
            <input type="text" name="title" id="title"  class="inputBox" maxlength="200">
            <p></p>
            <label>Description</label>
            <input type="text" name="desc" id="desc"  class="inputBox" maxlength="200">
            <p></p>

            <input type="submit" id="" value="Click Here to Update">

        </div>
        <?php
        echo '<p>';
        echo '<p>';

        ?>

</div>
</body>
</html>

