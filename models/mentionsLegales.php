<?php
function getMentions(){
    $db = dbConnect();
    $query = $db->prepare('SELECT * FROM mentions_legales ');
    $query->execute();
    $mentions = $query->fetchAll();

    return $mentions;
}