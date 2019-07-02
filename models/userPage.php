<?php
function getReceiptsUser($sessionUser){
    $db = dbConnect();

    $queryReceipt = $db->prepare('SELECT * FROM factures WHERE user_id = ?');
    $queryReceipt->execute( array( $sessionUser ) );
    $allReceipts = $queryReceipt->fetchAll();

    return $allReceipts;
}

function getInformationsUser($userConnected){
    $db = dbConnect();

    $queryInfosUser = $db->prepare('SELECT * FROM user WHERE id = ?');
    $queryInfosUser->execute( array( $userConnected ) );
    $allInfosUser = $queryInfosUser->fetchAll();

    return $allInfosUser;
}