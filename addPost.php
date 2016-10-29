<!DOCTYPE html>
<html>

    <body>

        <header class="header-basic">
            <link rel="stylesheet" type="text/css" href="css/header.css">
            <link rel="stylesheet" type="text/css" href="css/addPost.css"/>

            <div class="header-limiter">

                <h1><a href="#">Su<span>per</span></a></h1>

                <nav>
                    <a href="#">Support</a>
                    <a href="#">Log in</a>
                    <a href="#">About</a>
                </nav>
            </div>
        </header>

    <!--    <form method="post" action="/post/generalTrip.php">-->
            <div class="new_post">
                <h1 class="head">New Trip</h1>
                <div class="p">
                    <label class="formName">Trip Title</label>
                    <div class="textBoxWrapper">
                        <input type="text" id="formName" title="" value="" maxlength="100" class="inputBox">
                    </div>
                    <div class="textBoxWrapper">
                        <textarea id="formBody" title=""></textarea>
                    </div>
                    <div class="agreement">
                        By adding this post, you must agree to the terms of the
                        <a href="https://google.com"
                           target="_new">license agreement</a>.
                    </div>
                    <input type="submit" id="addPost" value="Post Trip">
                </div>
            </div>
    <!--    </form>-->
    </body>
</html>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "person";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=person", $username, $password);
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