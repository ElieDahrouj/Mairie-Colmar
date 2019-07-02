<?php
header("Access-Control-Allow-Origin: *");

try{
    $db = new PDO('mysql:host=localhost;dbname=finalproject;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $exception)
{
    die( 'Erreur : ' . $exception->getMessage() );
}

$response = new \stdClass();

if (!empty($_POST['motif']) && isset($_POST['details']) && !empty($_POST['details']) && !empty($_POST['email']) && !empty($_POST['message'])){
    if (filter_input(INPUT_POST, 'motif', FILTER_VALIDATE_INT) && filter_input(INPUT_POST, 'details', FILTER_VALIDATE_INT)) {
        if (filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
            $query = $db->prepare('INSERT INTO messages (motif, detail, email, explications) VALUES (?, ?, ?, ?)');
            $newMessage = $query->execute([
                $_POST['motif'],
                $_POST['details'],
                $_POST['email'],
                $_POST['message']
            ]);

            if ($newMessage) {
                $response->type = 1;
                $response->msg = 'Votre message a bien été envoyé';
                echo json_encode($response);

                $header = "From:" .$_POST['email'] ."\n";
                $header .= "MIME-version: 1.0\n";
                $header .= "Content-type:text/html; charset=utf8\n";
                $header .= "Content-Transfer-Encoding: 8bit";

                $contenu = "<html>".
                    "<head></head>".
                    "<body style='padding: 0;margin: 0;font-family: sans-serif;'>".
                    "<div>".
                    "<p> Bonjour </p>".
                    "<p>Un signalement a été envoyé par une personne </p>".
                    "<p>Le motif est : " .$_POST['motif'] ."</p>".
                    "<p>Le détail est : " .$_POST['details'] ."</p>".
                    "<p>Le mail est : " .$_POST['email'] ."</p>".
                    "<p>Le message est : " .$_POST['message'] ."</p>".
                    "</div>".
                    "</body>".
                    "</html>";
                mail('edarouj@hotmail.com','Signalement d\'un problème dans la ville',$contenu, $header);
            }
        }
        else {
            $response->type = 0;
            $response->msg = 'L\'adresse fournis n\'est pas un mail';
            echo json_encode($response);
        }
    }
    else{
        $response->type = 0;
        $response->msg = 'Erreur lors de la selection d\'informations';
        echo json_encode($response);
    }
}
elseif (!empty($_POST['motif']) && isset($_POST['textInfo']) && !empty($_POST['textInfo']) && !empty($_POST['email']) && !empty($_POST['message'])){
    if (filter_input(INPUT_POST, 'motif', FILTER_VALIDATE_INT)) {
        if (filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
            $query = $db->prepare('INSERT INTO messages (motif, detail, email, explications) VALUES (?, ?, ?, ?)');
            $newMessage = $query->execute([
                $_POST['motif'],
                $_POST['textInfo'],
                $_POST['email'],
                $_POST['message']
            ]);

            if ($newMessage) {
                $response->type = 1;
                $response->msg = 'Votre message a bien été envoyé';
                echo json_encode($response);

                $header = "From:" .$_POST['email'] ."\n";
                $header .= "MIME-version: 1.0\n";
                $header .= "Content-type:text/html; charset=utf8\n";
                $header .= "Content-Transfer-Encoding: 8bit";

                $contenu = "<html>".
                    "<head></head>".
                    "<body style='padding: 0;margin: 0;font-family: sans-serif;'>".
                    "<div>".
                    "<p> Bonjour </p>".
                    "<p>Un signalement a été envoyé par une personne </p>".
                    "<p>Le motif est : " .$_POST['motif'] ."</p>".
                    "<p>Le détail est : " .$_POST['textInfo'] ."</p>".
                    "<p>Le mail est : " .$_POST['email'] ."</p>".
                    "<p>Le message est : " .$_POST['message'] ."</p>".
                    "</div>".
                    "</body>".
                    "</html>";
                mail('edarouj@hotmail.com','Signalement d\'un problème dans la ville',$contenu, $header);
            }
        }
        else {
            $response->type = 0;
            $response->msg = 'L\'adresse fournis n\'est pas un mail';
            echo json_encode($response);
        }
    }
    else{
        $response->type = 0;
        $response->msg = 'Erreur lors de la selection d\'informations';
        echo json_encode($response);
    }
}
else{
    $response->type = 0;
    $response->msg = 'Tous les champs sont obligatoire';
    echo json_encode($response);
}
