<?php
    session_start();
    $addRole=$_GET['role'];
    $MID=$_SESSION['user'];
    include_once ("connection.php");
    $con=new Connection();
    if($addRole=='driver'){
        $sql="UPDATE member SET isDriver=1 WHERE MID=$MID";
    }else if($addRole=='rider'){
        $sql="UPDATE member SET isRider=1 WHERE MID=$MID";
    }
    $con->setQuery($sql);
    $con->execute();
    $con->close();
    header("Location: selectRole.php");
?>