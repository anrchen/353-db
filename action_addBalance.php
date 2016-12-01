<?php if(session_status()==PHP_SESSION_NONE){
    session_start();
    }

    if(!isset($_SESSION['user'])){
        header("Location: login.php");
    }

    if(isset($_GET['add'])){
        $_SESSION['add']=$_GET['add'];
    }

    if(isset($_GET['success'])){
        $message="Your balance has been updated!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script>window.close();</script>";

    }
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv=REFRESH CONTENT=10;url=action_payAddBalance.php>

</head>

<body>

<header class="header-basic">
    <link rel="stylesheet" type="text/css" href="assets/css/header.css">
    <link rel="stylesheet" type="text/css" href="assets/css/addPost.css"/>


    <div class="header-limiter">

        <h1><a href="index.php">Su<span>per</span></a></h1>

        <nav>
            <?php
            if(isset($_SESSION['user'])){
                echo"<a>Welcome ".$_SESSION['userName'].", </a>
                     <a href=\"logout.php?logout=true\">Log out</a>";
            }else{
                echo"<a href=\"login.php\">Log in</a>";
            }
            ?>
            <a href="#">Support</a>
            <a href="#">About</a>
        </nav>
    </div>
</header>

<p class="success" style="text-align: center">
    You will be redirecting to your <span style="color:orangered;">PayPal</span>
    account in 10 seconds.

</p>



</body>
</html>


