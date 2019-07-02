<?php
if(!isset($_SESSION['user'])){
    header('location:index.php?page=connexion');
    exit;
}
require_once ('./models/userPage.php');
$paymentAdvice = getReceiptsUser($_SESSION['user']['id']);
$infosUser = getInformationsUser($_SESSION['user']['id']);

require_once ('./views/userPage.php');