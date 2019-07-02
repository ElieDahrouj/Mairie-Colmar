<?php
function getCoordonnees(){
    $db =dbConnect();

    $query = $db->prepare('SELECT * FROM coordonnees');
    $query->execute();

    $coordonnees = $query->fetchAll();
    return $coordonnees;
}