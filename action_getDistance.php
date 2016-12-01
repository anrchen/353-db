<?php
    $key='AIzaSyCfVhB-ilQZR9XvTCSGtpUE7ekWI6hXlOE';
    $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?origins=Vancouver+BC|Seattle&destinations=San+Francisco|Victoria+BC&key='.$key;

//    $json = file_get_contents($url);
//    $data = json_decode($json);
//
//    print_r($data);
//    echo 'Hello <br>'.$data->rows[0]['elements'];


  //request the directions
    $routes=json_decode(file_get_contents($url))->routes;

  //sort the routes based on the distance
    usort($routes,create_function('$a,$b','return intval($a->legs[0]->distance->value) - intval($b->legs[0]->distance->value);'));

 //print the shortest distance
    echo $routes[0]->legs[0]->distance->text;//returns 9.0 km

?>

