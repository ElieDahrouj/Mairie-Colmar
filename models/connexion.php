<?php

function getLogin($login , $mail , $password){
    $db = dbConnect();
    if ($login) {
        if(!empty($mail) AND !empty($password)) {
            if (filter_input(INPUT_POST, 'userID', FILTER_VALIDATE_EMAIL)) {
                $query = $db->prepare('SELECT *
                FROM user
                WHERE email = ? AND password = ?');
                $query->execute(array($mail, md5($password)));
                $user = $query->fetch();

                if ($user) {
                    $_SESSION['user']['is_admin'] = $user['is_admin'];
                    $_SESSION['user']['lastname'] = $user['lastname'];
                    $_SESSION['user']['id'] = $user['id'];
                    $_SESSION['user']['is_confirmed'] = $user['is_confirmed'];

                    header('location:index.php?page=user-page');
                    exit;
                }
                else {
                    return $loginError = "Mauvais identifiants";
                }
            }
            else{
                return $loginError = "L'adresse fournis n'est pas un mail";
            }
        }
        else{
            return $loginError = "Merci de remplir tous les champs";
        }
    }
}