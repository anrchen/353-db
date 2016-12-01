<?php



    $dCity='New York';
    $dCity=str_replace(' ', '_', $dCity);
    $dProvince='NY';
    $aCity='Montreal';
    $aCity=str_replace(' ', '_', $aCity);
    $aProvince='QC';
    $key='AIzaSyCfVhB-ilQZR9XvTCSGtpUE7ekWI6hXlOE';
    $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$dCity.'+'.$dProvince.'&destinations='.$aCity.'+'.$aProvince.'&key='.$key;

    $json = file_get_contents($url);
    $data = json_decode($json);
//
    print_r($data);
//    echo 'Hello <br>'.$data->rows[0]['elements'];


  //request the directions
    $distance = $routes=$data->rows[0]->elements[0]->distance->value;
    $distance *= 0.001;

    echo $distance.'km';

//  //sort the routes based on the distance
//    usort($routes,create_function('$a,$b','return intval($a->legs[0]->distance->value) - intval($b->legs[0]->distance->value);'));
//
// //print the shortest distance
//    echo $routes[0]->legs[0]->distance->text;//returns 9.0 km

?>

