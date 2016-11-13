<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>

    <body>

        <header class="header-basic">
            <link rel="stylesheet" type="text/css" href="css/header.css">
            <link rel="stylesheet" type="text/css" href="css/addPost.css"/>
            <link rel="stylesheet" type="text/css" href="css/main.css"/>


            <div class="header-limiter">

                <h1><a href="index.php">Su<span>per</span></a></h1>

                <nav>
                    <a href="#">Support</a>
                    <a href="#">Log in</a>
                    <a href="#">About</a>
                </nav>
            </div>
        </header>

        <div class="match" style="text-align: center">
            <?php
                include_once ('connection.php');
                $con = new Connection();
                $con->setQuery("");
                $con->showPosts('');
                $con->close();
            ?>
        </div>

    </body>
</html>


