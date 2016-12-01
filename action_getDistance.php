<?php

    $postID = $_SESSION['newPost'];

    include_once ('connection.php');
    $aCity='';
    $dCity='';
    $aProvince='';
    $dProvince='';
    $con = new Connection();
    $sql = "SELECT * FROM trip WHERE TID=$postID";
    $con->setQuery($sql);
    $con->execute();
    $result=$con->getResult();
    while ($row = $result->fetch_assoc()) {
        $aCity = $row['aCity'];
        $dCity = $row['dCity'];
    }

    $sql = "SELECT province FROM city WHERE cityName='$dCity'";
    $con->setQuery($sql);
    $con->execute();
    $result=$con->getResult();
    while ($row = $result->fetch_assoc()) {
        $dProvince = $row['province'];
    }

    $sql = "SELECT province FROM city WHERE cityName='$aCity'";
    $con->setQuery($sql);
    $con->execute();
    $result=$con->getResult();
    while ($row = $result->fetch_assoc()) {
        $aProvince = $row['province'];
    }


    $dCity=str_replace(' ', '_', $dCity);
    $aCity=str_replace(' ', '_', $aCity);

    $distance=10;
    if($dCity==$aCity){
        $key='AIzaSyCfVhB-ilQZR9XvTCSGtpUE7ekWI6hXlOE';
        $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$dCity.'+'.$dProvince.'&destinations='.$aCity.'+'.$aProvince.'&key='.$key;

        $json = file_get_contents($url);
        $data = json_decode($json);

        //request the directions
        $distance = $routes=$data->rows[0]->elements[0]->distance->value;
        $distance *= 0.001;
    }


    $_SESSION['distance']=round($distance);


?>

