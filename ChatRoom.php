<?php
ob_start();
session_start();
require_once 'dbconnect.php';
// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) ) {
    header("Location: index.php");
    exit;
}
// select loggedin users detail
//$res=mysql_query("SELECT * FROM account WHERE MID=".$_SESSION['user']);
//$userRow=mysql_fetch_array($res);
//$Uname = $res[0];
//die(mysql_errno($conn) . ": " . mysql_error($conn));
//die($_SESSION['userName']);
$Name = $_SESSION['userName'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="assets/css/header.css">
    <title>Chat</title>

    <link rel="stylesheet" href="style.css" type="text/css" />

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="chat.js"></script>
    <script type="text/javascript">
        // ask user for name with popup prompt
        var name = "<?php echo $Name ?>";  // prompt("Enter your chat name:", "Guest");
        // default name is 'Guest'
        if (!name || name === ' ') {
            name = "NO NAME";
            //name = "Guest";
        }
        // strip tags
        name = name.replace(/(<([^>]+)>)/ig,"");
        // display name on page
        $("#name-area").html("You are: <span>" + name + "</span>");
        // kick off chat
        var chat =  new Chat();
        $(function() {
            chat.getState();
            // watch textarea for key presses
            $("#sendie").keydown(function(event) {
                var key = event.which;
                //all keys including return.
                if (key >= 33) {
                    var maxLength = $(this).attr("maxlength");
                    var length = this.value.length;
                    // don't allow new content if length is maxed out
                    if (length >= maxLength) {
                        event.preventDefault();
                    }
                }
            });
            // watch textarea for release of key press
            $('#sendie').keyup(function(e) {
                if (e.keyCode == 13) {
                    var text = $(this).val();
                    var maxLength = $(this).attr("maxlength");
                    var length = text.length;
                    // send
                    if (length <= maxLength + 1) {
                        chat.send(text, name);
                        $(this).val("");
                    } else {
                        $(this).val(text.substring(0, maxLength));
                    }
                }
            });
        });
    </script>

</head>


<header class="header-basic">

    <div class="header-limiter">

        <h1><a href="index.php">Su<span>per</span></a></h1>

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

<body onload="setInterval('chat.update()', 1000)">


<div id="page-wrap">
    <div id="return-link">
        <a href="index.php" >Return to Index</a>

    </div>

    <h2>Super Chat</h2>

    <p id="name-area"></p>

    <div id="chat-wrap"><div id="chat-area"></div></div>

    <form id="send-message-area">
        <p>Your message: </nl> (Press Enter to send text) </p>
        <textarea id="sendie" maxlength = '100' ></textarea>
    </form>


</div>

</body>
</html>