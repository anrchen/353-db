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



<?php
$user = $_SESSION['user'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trip";
$conn = new mysqli($servername, $username, $password, $dbname);

$a1=$_GET['address1'];
$a2=$_GET['address2'];
$city=$_GET['city'];
$pc=$_GET['pc'];
$province=$_GET['province'];


echo'<h2>Your New Info</h2>';

echo 'Address1: '.$a1;
echo '<p>';

echo 'Address2: '.$a2;
echo '<p>';

echo 'City: '.$city;
echo '<p>';

echo 'Postal Code: '.$pc;
echo '<p>';

echo 'Province: '.$province;
echo '<p>';



    $result = $conn->query("
                   UPDATE memberDetails 
                   SET address1 = '$a1',
                        address2 = '$a2',
                        city ='$city',
                        postalCode = '$pc',
                        province ='$province'    
                    WHERE id=$user;
                            ");



echo 'Update Successfully.<p>';
echo '<a href="editPersonalData.php">Click here to edit more.</a>';
?>
</p>

</body>
</html>

Contact GitHub API Training Shop Blog About
© 2016 GitHub, Inc. Terms Privacy Security Status Help