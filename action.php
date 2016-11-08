<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv=REFRESH CONTENT=10;url=viewPosts.php>

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

    <p class="success" style="text-align: center">
        <?php
        if(isset($_GET['formName']) and isset($_GET['datepicker']) and isset($_GET['timepicker'])
        and isset($_GET['formBody'])){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "person";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=person", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //        $sql = "CREATE TABLE trip(
        //                    Title varchar(20),
        //                    Time varchar(20),
        //                    Description varchar(255));";
                $formName = $_GET['formName'];
                $timepicker = $_GET['datepicker']."_".$_GET['timepicker'];
                $formBody = $_GET['formBody'];

                $sql = "INSERT INTO trip (title, time, description)
                        VALUES ('$formName', '$timepicker', '$formBody')";
                $conn->exec($sql);
                echo '
                      Your trip has been <span style="color:#1bcd00;">successfully</span> 
                      posted, you will be redirected in 10 secondes.
                      ';
            }
            catch(PDOException $e)
            {
                echo "Connection failed: " . $e->getMessage();
            }

            $conn=null;
        }
        ?>
    </p>

    </body>
</html>


