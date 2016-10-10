<?php

    session_start();
    
    if (file_exists(‘home.php')) {
        require_once ‘home.php';
    } else {
        exit;
    }
?>



<!DOCTYPE html>

<html>
<head>
    <?php include ‘home.php’; ?>
    <link rel="stylesheet" type="text/css" href=“style.css" />
    <title>Our website</title>
    <meta name="description" content="">
</head>



<body id="home">
    <header>
        <?php include '../includes/header.php'; ?>
    </header>


<div id="serviceMenu">

<ul>
<li><a href=“post/“>Posting Page</a>

<ul>
<li><a href=“post/newPost.php">Add a new post</a>
<li><a href=“post/oldPost.php”>View/Edit an old post</a>
</ul>

<li><a href=“post/viewAll.php">View all posts</a>
<li><a href=“post/search.php">Search a post</a>
</ul>

</div>





<footer>
<?php include '../includes/footer.php'; ?>
</footer>

</div>
</body>
</html>
