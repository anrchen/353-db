<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

<header class="header-basic">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/addPost.css"/>


    <div class="header-limiter">

        <h1><a href="index.php">Su<span>per</span></a></h1>

        <nav>
            <a href="#">Support</a>
            <a href="#">Log in</a>
            <a href="#">About</a>
        </nav>
    </div>
</header>


    <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "trip";
        $conn = new mysqli($servername, $username, $password, $dbname);


            $stars=$_GET['rating'];
            $rateComments=$_GET['comments'];
            $ID = $_GET['ID'];
            $type = $_GET['type'];

            echo "<P>";
            echo "ID: " .$ID;
            echo "<P>";
            echo "Type: " .$type;
            echo "<P>";
            echo "Stars: " .$stars;
            echo "<P>";
            echo "Comments: " . $rateComments ;

    /* PHILIP
    fix the reviewer value with session ID
    for example insert into (blabla) Values ('session userId', etc);
    just replace '1' with session userID
    */
        if ($type == "Trip") {
            $result = $conn->query("INSERT INTO tripreview (Reviewer, reviewTrip, stars, messages)
                     VALUES ('1', '$ID', '$stars', '$rateComments')");
        }
        if ($type == "Driver") {
        $result = $conn->query("INSERT INTO driverreview (Reviewer, reviewTrip, stars, messages)
                     VALUES ('1', '$ID', '$stars', '$rateComments')");
        }


        echo '<p>'.'Your rating has been successfully saved.  ';



    ?>


</body>
</html>


