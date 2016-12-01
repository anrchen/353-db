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
                echo"<a>Welcome ".$_SESSION['userName'].", </a>"?>
              <a href="logout.php?logout=true">Log out</a>;
            <?php

            }else{
                echo"<a href=\"login.php\">Log in</a>";
            }?>
            <a href="editPersonalData.php">Edit Personal Info</a>

            <a href="#">Support</a>
            <a href="#">About</a>
        </nav>
    </div>
</header>


<section class="community">


  <form method="get" action="searchPost.php">

<!--
      <div class="styled-select" name="selectRole">
          <select>
              <option selected disabled>Select a role</option>
              <option value="1">>Posted by Riders</option>
              <option value="2">>Posted by Drivers</option>
          </select>
      </div>
-->
      <input type="text" class="nav" name="search" placeholder="Search all posts by City Name (use _ instead of spaces)">
      <!-- <input type="submit" id="DoSearch" value="SEARCH FOR POST" align="right"> -->


  </form>



    <?php
        if((isset($_GET['role']))){
            $_SESSION['role']=$_GET['role'];
        }

        if((isset($_SESSION['role'])) and $_SESSION['role']=='rider'){

    ?>
    <div class="category">
        <header class="categoryHeader">
            <h1 class="categoryHeading">Rider</h1>
        </header>

        <a href="addPost.php?type=onetime&role=rider" class="serviceContent">
            <img src="Images/createTemplateRider2.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Create A One-Time Trip
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
                    Create A Regular Trip
                </h1>
                <span class="serviceDescription">
                                Looking for riders on your next trip? Come here!
                            </span>
            </div>
        </a>
        <a href="editPost.php?role=rider" class="serviceContent">
            <img src="Images/editTemplate.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Edit Your Post
                </h1>
                <span class="serviceDescription">
                                Reschedule or relocate your trip!
                            </span>
            </div>
        </a>
        <a href="delete_Personal_Post.php?role=rider" class="serviceContent">
            <img src="Images/editTemplate.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Delete Your Posts
                </h1>
                <span class="serviceDescription">
                                Delete and then re-create!
                            </span>
            </div>
        </a>
        <a href="viewPosts.php?role=rider" class="serviceContent">
            <img src="Images/viewTemplate.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    View Your Posts
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
                                Match your posts!
                            </span>
            </div>
        </a>

        <a href="ratingSystem.php?role=rider" class="serviceContent">
            <img src="Images/rating.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Rating system
                </h1>
                <span class="serviceDescription">
                                Rate A Member or A Trip
                            </span>
            </div>
        </a>

        <a href="addBalance.php" class="serviceContent">
            <img src="Images/addBalance.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Add Balance
                </h1>
                <span class="serviceDescription">
                    Add more money to your balance here!
                            </span>
            </div>
        </a>

        <a href="ChatRoom.php" class="serviceContent">
            <img src="Images/editTemplate.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Chatroom
                </h1>
                <span class="serviceDescription">
                    Access the Chatroom to chat with other super users
                </span>
            </div>
        </a>

        <a href="selectRole.php" class="serviceContent">
            <img src="Images/switchRole.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Switch Role
                </h1>
                <span class="serviceDescription">
                    Switch your role between rider or driver!
                </span>
            </div>
        </a>
    </div>
    <?php
        }
    ?>

    <?php
    if((isset($_SESSION['role'])) and $_SESSION['role']=='driver'){
    ?>
    <div class="category">
        <header class="categoryHeader">
            <h1 class="categoryHeading">Driver</h1>
        </header>

        <a href="addPost.php?type=onetime&role=driver" class="serviceContent">
            <img src="Images/createTemplate.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Create A One-Time Trip
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
                    Create A Regular Trip
                </h1>
                <span class="serviceDescription">
                                Looking for riders on your next trip? Come here!
                            </span>
            </div>
        </a>
        <a href="editPost.php" class="serviceContent">
            <img src="Images/editTemplate.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Edit Your Posts
                </h1>
                <span class="serviceDescription">
                                Reschedule or relocate your trip!
                            </span>
            </div>
        </a>
        <a href="delete_Personal_Post.php" class="serviceContent">
            <img src="Images/editTemplate.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Delete Your Posts
                </h1>
                <span class="serviceDescription">
                                Delete and then re-create!
                            </span>
            </div>
        </a>
        <a href="viewPosts.php?role=driver" class="serviceContent">
            <img src="Images/viewTemplate.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    View Your Posts
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

        <a href="ChatRoom.php" class="serviceContent">
            <img src="Images/editTemplate.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Chatroom
                </h1>
                <span class="serviceDescription">
                    Access the Chatroom to chat with other super users
                </span>
            </div>
        </a>

        <a href="selectRole.php" class="serviceContent">
            <img src="Images/switchRole.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Switch Role
                </h1>
                <span class="serviceDescription">
                    Switch your role between rider or driver!
                </span>
            </div>
        </a>
    </div>
        <?php
    }
    ?>

    <?php
    if((isset($_SESSION['isAdmin'])) and $_SESSION['isAdmin']='admin'
        and isset($_SESSION['adminCode']) and $_SESSION['adminCode']='7hajqnnk00i6isp3gr4q60tncc'){
    ?>
    <div class="category">
        <header class="categoryHeader">
            <h1 class="categoryHeading">Administrator</h1>
        </header>

        <a href="deletePost.php" class="serviceContent">
            <img src="Images/viewTemplate.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Delete Posts
                </h1>
                <span class="serviceDescription">
                    Delete a post by its ID here!
                </span>
            </div>
        </a>

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

        <!--review all the statistics-->
        <a href="statistics_report.php" class="serviceContent">
            <img src="Images/viewTemplate.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Review Statistics
                </h1>
                <span class="serviceDescription">
                    Admin Report
                </span>
            </div>
        </a>

              <a href="ChatRoom.php" class="serviceContent">
                  <img src="Images/editTemplate.png" class="serviceIcon">
                  <div class="serviceDetail">
                      <h1 class="serviceHeader">
                          Chatroom
                      </h1>
                      <span class="serviceDescription">
                          Access the Chatroom to chat with other super users
                      </span>
                  </div>
              </a>

        <a href="selectRole.php" class="serviceContent">
            <img src="Images/switchRole.png" class="serviceIcon">
            <div class="serviceDetail">
                <h1 class="serviceHeader">
                    Switch Role
                </h1>
                <span class="serviceDescription">
                    Switch your role between rider or driver!
                </span>
            </div>
        </a>



        <a href="Images/admin_createPost" class="serviceContent"></a>
        <a href="Images/admin_editPost" class="serviceContent"></a>
        <a href="Images/admin_viewPost" class="serviceContent"></a>
        <a href="Images/admin_matchPost" class="serviceContent"></a>
    </div>
        <?php
    }else if ((isset($_SESSION['role'])) and $_SESSION['role']='admin'){
        $message="Cheating aren't you? You are not supposed to be here!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script>window.close();</script>";
    }
    ?>

    <footer>
        <p>All rights reserved</p>
    </footer>
</body>
</html>
