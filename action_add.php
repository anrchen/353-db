<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv=REFRESH CONTENT=10;url=matchPost.php>

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
        if(isset($_GET['formName']) and isset($_GET['dCity']) and isset($_GET['formBody'])){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "trip";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $authorID="1";
                if(isset($_GET['weekday'])){
                    $dDate=implode(",", $_GET['weekday']);;
                    $category = 'regular';
                    echo "weekday";
                }else{
                    $dDate=$_GET['date'];
                    $category = 'onetime';
                    echo $dDate;
                }
                $dCity=$_GET['dCity'];
                $aCity=$_GET['aCity'];
                $dPostal=$_GET['dPostal'];
                $aPostal=$_GET['aPostal'];
                $Description=$_GET['formBody'];
                $Restriction=$_GET['restriction'];
                $Title=$_GET['formName'];

                $sql = "INSERT INTO trip (authorID,dDate,dCity,aCity,dPostal,aPostal,Description,Restriction,Title, Category)
                        VALUES ('$authorID','$dDate','$dCity','$aCity','$dPostal','$aPostal','$Description','$Restriction','$Title', '$category')";
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


