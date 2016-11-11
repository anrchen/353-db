<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" type="text/css" href="css/main.css">
            <link rel="stylesheet" type="text/css" href="css/header.css">
            <link rel="stylesheet" type="text/css" href="css/nav.css">
        </head>

        <body>

            <header class="header-basic">

                <div class="header-limiter">

                    <h1><a href="#">Su<span>per</span></a></h1>

                    <nav>
                        <a href="#">Support</a>
                        <a href="#">Log in</a>
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

                    <a href="addPost.php" class="serviceContent">
                        <img src="Images/createTemplateRider2.png" class="serviceIcon">
                        <div class="serviceDetail">
                            <h1 class="serviceHeader">
                                Create a post
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
                                Change your mind? Reschedule or relocate your trip!
                            </span>
                        </div>
                    </a>
                    <a href="Images/rider_viewPost" class="serviceContent">
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
                    <a href="Images/rider_matchPost" class="serviceContent"></a>
                    <a href="Images/rider_rateATrip" class="serviceContent"></a>
                </div>

                <div class="category">
                    <header class="categoryHeader">
                        <h1 class="categoryHeading">Driver</h1>
                    </header>

                    <a href="Images/driver_createPost.jpg" class="serviceContent">
                        <img src="Images/createTemplate.png" class="serviceIcon">
                        <div class="serviceDetail">
                            <h1 class="serviceHeader">
                                Create a post
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
                                Change your mind? Reschedule or relocate your trip!
                            </span>
                        </div>
                    </a>
                    <a href="Images/drider_viewPost" class="serviceContent">
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
                    <a href="Images/drider_matchPost" class="serviceContent"></a>
                </div>

                <div class="category">
                    <header class="categoryHeader">
                        <h1 class="categoryHeading">Administrator</h1>
                    </header>

                    <a href="deletePost.php">Click here to delete a post</a>

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