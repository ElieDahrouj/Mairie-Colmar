<?php
header("Access-Control-Allow-Origin: *");

try{
    $db = new PDO('mysql:host=localhost;dbname=finalproject;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $exception)
{
    die( 'Erreur : ' . $exception->getMessage() );
}
session_start();
$response = new \stdClass();

$query = $db->prepare('UPDATE user SET is_confirmed = :isConfirmed WHERE id = :id');
$infosUser = $query->execute([
   'isConfirmed' => 1,
    'id' => $_SESSION['user']['id']
]);

if ($infosUser) {
    $response->type = 1;
    $response->msg = 'Enregistrement des informations définitives effectué avec succès';
    echo json_encode($response);
}
else{
    $response->type = 0;
    $response->msg = 'Une erreur est survenue lors de l\'enregistrement de vos informations';
    echo json_encode($response);
}