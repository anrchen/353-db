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


    <div class="styled-select">
        <select>
            <option selected disabled>Select a role</option>
            <option>Posted by Riders</option>
            <option>Posted by Drivers</option>
        </select>
    </div>

    <input type="text" class="nav" name="search" placeholder="Search all posts">


    <!--                <header class="communityHeader">-->
    <!--                    <div class="siteLogo_container">-->
    <!--                        <p class="welcomeMsg">-->
    <!--                            Welcome to the official-->
    <!--                            <span class="SiteName">-->
    <!--                                Car2Go-->
    <!--                            </span>  site-->
    <!--                        </p>-->
    <!--                    </div>-->
    <!--                </header>-->


    <div class="category">
        <header class="categoryHeader">
            <h1 class="categoryHeading">Rider</h1>
        </header>

        <a href="addPost.php?type=onetime&role=rider" class="serviceContent">
            <img src="Images/createTemplateRider2.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Create a one-time trip post
                </h1>
                <span class="serviceDescription">
                                Looking for riders on your next trip? Come here!
                            </span>
            </div>
        </a>
        <a href="addPost.php?type=regular&role=rider" class="serviceContent">
            <img src="Images/createTemplateRider2.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Create a regular trip post
                </h1>
                <span class="serviceDescription">
                                Looking for riders on your next trip? Come here!
                            </span>
            </div>
        </a>
        <a href="Images/rider_editPost" class="serviceContent">
            <img src="Images/editTemplate.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Edit a post
                </h1>
                <span class="serviceDescription">
                                Reschedule or relocate your trip!
                            </span>
            </div>
        </a>
        <a href="viewPosts.php?role=rider" class="serviceContent">
            <img src="Images/viewTemplate.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    View a post
                </h1>
                <span class="serviceDescription">
                                Find the details of your posts!
                            </span>
            </div>
        </a>
        <a href="viewPosts.php?role=rider" class="serviceContent">
            <img src="Images/viewTemplate.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Matching System
                </h1>
                <span class="serviceDescription">
                                Match posts created by you!
                            </span>
            </div>
        </a>

        <!-- Ming's rating system-->
        <a href="ratingSystem.php" class="serviceContent">
            <img src="Images/viewTemplate.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Rating
                </h1>
                <span class="serviceDescription">
                                Rate A Member or A Trip
                            </span>
            </div>
        </a>

    </div>

    <div class="category">
        <header class="categoryHeader">
            <h1 class="categoryHeading">Driver</h1>
        </header>

        <a href="addPost.php?type=onetime&role=driver" class="serviceContent">
            <img src="Images/createTemplate.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Create a one-time trip post
                </h1>
                <span class="serviceDescription">
                                Looking for riders on your next trip? Come here!
                            </span>
            </div>
        </a>
        <a href="addPost.php?type=regular&role=driver" class="serviceContent">
            <img src="Images/createTemplateRider2.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Create a regular trip post
                </h1>
                <span class="serviceDescription">
                                Looking for riders on your next trip? Come here!
                            </span>
            </div>
        </a>
        <a href="Images/drider_editPost" class="serviceContent">
            <img src="Images/editTemplate.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Edit a post
                </h1>
                <span class="serviceDescription">
                                Reschedule or relocate your trip!
                            </span>
            </div>
        </a>
        <a href="viewPosts.php?role=driver" class="serviceContent">
            <img src="Images/viewTemplate.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    View a post
                </h1>
                <span class="serviceDescription">
                                Find the details of your posts!
                            </span>
            </div>
        </a>

        <a href="viewPosts.php?role=driver" class="serviceContent">
            <img src="Images/viewTemplate.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Matching System
                </h1>
                <span class="serviceDescription">
                                Match posts created by you!
                            </span>
            </div>
        </a>

    </div>

    <div class="category">
        <header class="categoryHeader">
            <h1 class="categoryHeading">Administrator</h1>
        </header>

        <a href="deletePost.php" class="serviceContent">
            <img src="Images/viewTemplate.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Delete Post
                </h1>
                <span class="serviceDescription">
                    Delete a post by its ID here!
                </span>
            </div>
        </a>

        <!--suspend a complainted dirver or trip-->
        <a href="suspendUser.php" class="serviceContent">
            <img src="Images/viewTemplate.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Suspend Bad Rating
                </h1>
                <span class="serviceDescription">
                    Suspend user with a bad rating!
                </span>
            </div>
        </a>



        <a href="Images/admin_createPost" class="serviceContent"></a>
        <a href="Images/admin_editPost" class="serviceContent"></a>
        <a href="Images/admin_viewPost" class="serviceContent"></a>
        <a href="Images/admin_matchPost" class="serviceContent"></a>
    </div>


    <footer>
        <p>All rights reserved</p>
    </footer>
</body>
</html>