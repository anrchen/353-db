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

            $complaint = $_GET ['complaint'];

            /*
            //$complaint = $_GET['complaint'];
            if($_GET['complaint']!=null){
        $complaint=$_GET['complaint'];
    }

            if ($_GET['complaint']=='on') {
                $complaint = 'true';
            }else{
                $complaint = 'false';
            }

            /*
            if ($complaint == 'false'){
                $complaint = 'false';
            }else {
                $complaint = 'true';
            }
*/

            echo "<P>";
            echo "ID: " .$ID;
            echo "<P>";
            echo "Type: " .$type;
            echo "<P>";
            echo "Stars: " .$stars;
            echo "<P>";
            echo "Complaint: " .$complaint;
            echo "<P>";
            echo "Comments: " . $rateComments ;


        if ($type == "Trip") {
            $result = $conn->query("INSERT INTO tripreview (Reviewer, reviewTrip, stars, complaint, messages)
                     VALUES ('1', '$ID', '$stars', '$complaint', '$rateComments')");
        }
        if ($type == "Driver") {
        $result = $conn->query("INSERT INTO driverreview (Reviewer, driverID, stars, complaint, messages)
                     VALUES ('1', '$ID', '$stars', '$complaint', '$rateComments')");
        }


        echo '<p>'.'Your rating has been successfully saved.  ';



    ?>


</body>
</html>


