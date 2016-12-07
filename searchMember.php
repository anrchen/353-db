<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
}
?>
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

                  include_once 'dbconnect.php';

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "trip";


                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

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
            $MID = $_SESSION['user'];
            ?>
            <a href="#">Support</a>
            <a href="#">About</a>
        </nav>
    </div>
</header>

<div class="match" style="text-align: center">
<p class="success" style="text-align: center">
    <?php

        echo "Selected Username for Search: ";
        echo $_GET['search'];
        echo $_GET['selectRole'];

        //if(isset($_GET['selectRole']) and isset($_GET['search'])){
        if(isset($_GET['search'])){
          $lookIn = $_GET['search'];
          $sql = "SELECT * FROM account a, member m, memberdetails d WHERE a.Username='$lookIn' AND (a.MID = m.MID AND m.MID = d.id)";
          $result = mysql_query($sql);//$conn->query($sql);

//die(mysql_error());

          if (mysql_num_rows($result) > 0) {
              // output data of each row
              while($row = mysql_fetch_assoc($result)) {

                  $MID =  $row["MID"];
                  //$_SESSION['location'] = $row['dCity'].' to '.$row['aCity'];

                  echo "<br><div class='serviceContent'>";
                  echo "Member ID: ".$row['MID'];
                  echo "<br>Username: ".$row['Username'];
                  echo "<br>Email: ".$row['Email'];
                  echo "<br>Registered for Super on: ".$row['registerDate'];
                  if($row['isAdmin'] == 1 )
                  {
                    echo "<br>" .$row['userName'] . " is an ADMINISTRATOR";
                  }
                  echo "<br>--------------------";
                  if($row['isDriver'] == 1 )
                  {
                    echo "<br>" .$row['userName'] . " is registered as a Driver";
                    echo "<br>Driver's liscence number: ".$row['license'];

                    $sql2 = "SELECT driverID, stars FROM driverreview WHERE driverID = '$MID'";
                    $result2 = mysql_query($sql2);//$conn->query($sql);

                    if (mysql_num_rows($result2) > 0) {
                      $lowScore = 10;
                      $topScore = 0;
                      $avgTop = 0;
                      while($rowR = mysql_fetch_assoc($result2)) {

                        $avgTop += $rowR['stars'];

                        if($rowR['stars'] < $lowScore){
                            $lowScore = $rowR['stars'];
                          }
                        if($rowR['stars'] > $topScore){
                            $topScore = $rowR['stars'];
                          }
                      }

                      //echo "<br> Total stars: " .$avgTop;
                      $sql3= "SELECT Reviewer FROM driverreview WHERE driverID='$MID'";
                      $ResultX = mysql_query($sql3);
                      $avgBot = mysql_num_rows($ResultX);
                      echo "<br>";
                      echo "<br>Reviews received: " .$avgBot;
                      echo "<br>Highest Rating received: " .$topScore ." Stars out of 10";
                      echo "<br>Lowest Rating received: " .$lowScore ." Stars out of 10";
                      $avg = $avgTop / $avgBot;
                      echo "<br>";
                      echo "<br> Average Driver Rating: " .$avg ." Stars out of 10.";
                      //echo 'Total Number of Members Registered: '. $rows[0]."<br>"."<br>";


                    }
                    else{
                      echo "<br>This member has not been reviewed yet.";
                    }

                  }
                  // Show rating calculations
                  if($row['isRider'] == 1 )
                  {
                    echo "<br>--------------------";
                    echo "<br>" .$row['userName'] . " is registered as a Rider";
                  }
                  echo "<br>--------------------";
                  echo "<br>Home City: ".$row['city'];
                  echo "<br>Home Province: ".$row['province'];
                  echo "</div>";

              }
              if((isset($_SESSION['isAdmin'])) and $_SESSION['isAdmin']='admin'
                  and isset($_SESSION['adminCode']) and $_SESSION['adminCode']='7hajqnnk00i6isp3gr4q60tncc'){
                  echo "<a href='action_updateUser.php?member=$lookIn'>Update user profile</a>";
              }
          } else {
              echo "<br>User not found!";
          }


          $conn->close();
          //Search by city using search


        }
    ?>
    <p></p>
    <a href="index.php">Return to Index</a><p>
</p>
</div>

</body>
</html>
