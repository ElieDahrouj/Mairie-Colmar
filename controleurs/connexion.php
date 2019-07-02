<?php
if(isset($_SESSION['user'])){
    header('location:index.php?page=user-page');
    exit;
}
require_once ('./models/connexion.php');
if (isset($_POST['userID']) AND isset($_POST['passwordID'])) {
    $loginError = getLogin(isset($_POST['connexion']), $_POST['userID'], $_POST['passwordID']);
}
require_once ('./views/connexion.php');