<?php if(session_status()==PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION['user'])){
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/header.css">
    <link rel="stylesheet" type="text/css" href="assets/css/nav.css">
</head>

<body bgcolor="#add8e6">

<header class="header-basic">

    <div class="header-limiter">

        <h1><a href="#">Su<span>per</span></a></h1>

        <nav>
            <?php
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


<section class="community">


    <div class="category">
        <header class="categoryHeader">
            <h1 class="categoryHeading">Select the amount of money you wish to add</h1>
        </header>

        <a target="_blank" href="action_addBalance.php?add=10" class="serviceContent">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    $10 CAD
                </h1>
            </div>
        </a>
        <a target="_blank" href="action_addBalance.php?add=20" class="serviceContent">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    $20 CAD
                </h1>
            </div>
        </a>
        <a target="_blank" href="action_addBalance.php?add=50" class="serviceContent">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    $50 CAD
                </h1>
            </div>
        </a>

        <a target="_blank" href="action_addBalance.php?add=100" class="serviceContent">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    $100 CAD
                </h1>

            </div>
        </a>

    </div>


    <footer>
        <p>All rights reserved</p>
    </footer>
</body>
</html>