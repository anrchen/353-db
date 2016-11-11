<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--       jQuery UI Datepicker -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $( function() {
                $( "#datepicker" ).datepicker();
            } );
        </script>
        <!--end of Datepicker -->

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

<!--        <form method="post" action="/post/generalTrip.php">-->
        <form method="get" action="action.php">
            <div class="new_post">
                <h1 class="head">New Trip</h1>
                <div class="p">

                    <label class="formName">Trip Title</label>
                    <div class="textBoxWrapper">
                        <input type="text" name="formName" id="formName" title="" value="" maxlength="100" class="inputBox">
                    </div>

                    <input type="text" id="datepicker" name="datepicker" placeholder="Departure Date">
                    <input title="" type="time" id="timepicker" name="timepicker" value="00:00">


                    <p></p>



                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "353_project_test";
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    $result = $conn->query("select cityName from city");
                    echo "<select name='id'>";
                    while ($row = $result->fetch_assoc()) {
                        $id = $row['cityName'];
                        echo '<option value="">'.$id.'</option>';
                    }
                    echo "</select>";
                    $conn->close();
                    ?>


                    
                    <div class="textBoxWrapper">
                        <textarea id="formBody" name="formBody" title="" placeholder="Give a short description of your trip!"></textarea>
                    </div>

                    <div class="agreement">
                        By adding this post, you must agree to the terms of the
                        <a href="https://google.com"
                           target="_new">license agreement</a>.
                    </div>

                    <input type="submit" id="addPost" value="Post Trip">
                </div>
            </div>
        </form>
    </body>
</html>

