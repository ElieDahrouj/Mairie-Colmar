<?php
header("Access-Control-Allow-Origin: *");

try{
    $db = new PDO('mysql:host=localhost;dbname=finalproject;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $exception)
{
    die( 'Erreur : ' . $exception->getMessage() );
}

    $mot_de_passe = "";
    $nb_caractere = 6;
    $chaine = "abcdefghjkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ023456789+@!$%?&";
    $longeur_chaine = strlen($chaine);

    for($i = 1; $i <= $nb_caractere; $i++)
    {
        $place_aleatoire = mt_rand(0,($longeur_chaine-1));
        $mot_de_passe .= $chaine[$place_aleatoire];
    }

    $new = $mot_de_passe;


$response = new \stdClass();

if (isset($_POST['lostID']) AND !empty($_POST['lostID'])){
    if (filter_input(INPUT_POST, 'lostID', FILTER_VALIDATE_EMAIL)) {
        $querymail = $db->prepare('SELECT email FROM user WHERE email = ?');

        $querymail->execute(array($_POST['lostID']));
        $result = $querymail->fetch();

        if ($result) {
            $queryRegisterPass = $db->prepare('UPDATE user SET password = ? WHERE email = ?');
            $updatePass = $queryRegisterPass->execute([
                md5($new),
                $_POST['lostID']
            ]);
            if ($updatePass) {
                $response->type = 1;
                $response->msg = 'Un nouveau mot de passe vous a été attribué';
                echo json_encode($response);
                $newPass = $new;

                $header = "From: edarouj95@hotmail.fr\n";
                $header .= "MIME-version: 1.0\n";
                $header .= "Content-type:text/html; charset=utf8\n";
                $header .= "Content-Transfer-Encoding: 8bit";

                $contenu = "<html>" .
                    "<head></head>" .
                    "<body style='padding: 0;margin: 0;font-family: sans-serif;'>" .
                    "<div>" .
                    "<p> Bonjour, </p>" .
                    "<p>Voici votre nouveau mot de passe: </p>" .
                    "<p>Le mot de passe est : " . $newPass . "</p>" .
                    "</div>" .
                    "</body>" .
                    "</html>";
                mail($_POST['lostID'], 'Nouveau mot de passe', $contenu, $header);
            }
            else{
                $response->type = 0;
                $response->msg = 'Mise à jour du mot de passe impossible';
                echo json_encode($response);
            }
        }
        else {
            $response->type = 0;
            $response->msg = 'Le mail renseigné n\'existe pas';
            echo json_encode($response);
        }
    }
    else{
        $response->type = 0;
        $response->msg = 'L\'adresse fournis n\'est pas un mail';
        echo json_encode($response);
    }
}
else{
    $response->type = 0;
    $response->msg = 'Merci de renseigner un mail ';
    echo json_encode($response);
}
