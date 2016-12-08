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
    <link rel="stylesheet" type="text/css" href="assets/css/main.css"/>


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




<div class="match" style="text-align: center">
    <p class="success" style="text-align: center">
        <?php
        if((isset($_SESSION['isAdmin'])) and $_SESSION['isAdmin']='admin'
            and isset($_SESSION['adminCode']) and $_SESSION['adminCode']='7hajqnnk00i6isp3gr4q60tncc'
            and isset($_GET['member'])) {
            $member = $_GET['member'];
            echo "<h1>Current User Profile</h1>";
            $servername = "vpc353_2.encs.concordia.ca";
            $username = "vpc353_2";
            $password = "A5DNm8";
            $dbname = "vpc353_2";
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            $result = $conn->query("Select * FROM account 
            INNER JOIN member ON member.MID=account.MID 
            INNER JOIN memberdetails ON memberdetails.id=account.MID WHERE account.username='$member'");
            if (!$result) {
                trigger_error('Invalid query: ' . $conn->error);
            }
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='serviceContent'>";
                    $id = $row['id'];
                    $_SESSION['memberUpdate']=$id;
                    echo 'ID: ' . $id;
                    echo '<br><br>Email: ' . $row['Email'];
                    echo '<br><br>Address1: ' . $row["address1"];
                    echo '<br><br>Address2: ' . $row["address2"];
                    echo '<br><br>City: ' . $row["city"];
                    echo '<br><br>Postal Code: ' . $row['postalCode'];
                    echo '<br><br>Province: ' . $row['province'] . '</div>';
                }
            } else {
                echo "0 results";
            }
        }
        ?>


    <h1>Profile update</h1> <h5>Please complete the following form</h5>
    <form method='get' action='action_changeData.php'>

        <div class='serviceContent'>
            <label>Email</label>
            <input title='' align="right" width="200" type="text" name="email" id="email" class="inputBox">
            <p></p>
            <label>Address1</label>
            <input title='' type="text" name="address1" id="address1"  class="inputBox">
            <p></p>
            <label>Address2</label>
            <input title='' type="text" name="address2" id="address2"  class="inputBox">
            <p></p>
            <label>City</label>
            <input title='' type="text" name="city" id="city"  class="inputBox">
            <p></p>
            <label>Postal Code</label>
            <input title='' type="text" name="pc" id="pc"  class="inputBox">
            <p></p>
            <label>Province</label>
            <input title='' type="text" name="province" id="province"  class="inputBox">
            <p></p>
            <input type="submit" id="" value="Update">

        </div>
        <p></p>
        <a href="index.php">Return to Index</a>

</div>


</body>
</html>