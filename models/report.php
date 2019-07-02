<?php
function motifs(){
    $db = dbConnect();

    $queryReport = $db->query('SELECT * from report');
    $report = $queryReport->fetchAll();

    return $report;
}