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

        <nav><!--MING added -->
            <a href="editPersonalData.php">Edit Personal Info</a>
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


<section class="community">


    <div class="category">
        <header class="categoryHeader">
            <h1 class="categoryHeading">Select the amount of money you wish to add</h1>
        </header>

        <a href="addPost.php?type=onetime&role=rider" class="serviceContent">
<!--            <img src="Images/createTemplateRider2.png" class="serviceIcon">-->
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    $10 CAD
                </h1>
<!--                <span class="serviceDescription">-->
<!--                                Looking for riders on your next trip? Come here!-->
<!--                            </span>-->
            </div>
        </a>
        <a href="addPost.php?type=regular&role=rider" class="serviceContent">
<!--            <img src="Images/createTemplateRider2.png" class="serviceIcon">-->
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                   $20 CAD
                </h1>
<!--                <span class="serviceDescription">-->
<!--                                Looking for riders on your next trip? Come here!-->
<!--                            </span>-->
            </div>
        </a>
        <a href="Images/rider_editPost" class="serviceContent">
<!--            <img src="Images/editTemplate.png" class="serviceIcon">-->
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    $50 CAD
                </h1>
<!--                <span class="serviceDescription">-->
<!--                                Reschedule or relocate your trip!-->
<!--                            </span>-->
            </div>
        </a>

        <a href="viewPosts.php?role=rider" class="serviceContent">
<!--            <img src="Images/viewTemplate.png" class="serviceIcon">-->
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    $100 CAD
                </h1>
<!--                <span class="serviceDescription">-->
<!--                                Find the details of your posts!-->
<!--                            </span>-->
            </div>
        </a>

    </div>


    <footer>
        <p>All rights reserved</p>
    </footer>
</body>
</html>