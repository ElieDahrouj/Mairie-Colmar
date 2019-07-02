<?php
function getInformationCity(){
    $db = dbConnect();

    $queryInformations = $db->query('SELECT * FROM city_informations');
    $informationsCity = $queryInformations->fetchAll();

    return $informationsCity;
}

function getAtYourService(){
    $db = dbConnect();

    $queryImages = $db->query('SELECT * FROM city_images');
    $imagesCity = $queryImages->fetchAll();

    return $imagesCity;
}