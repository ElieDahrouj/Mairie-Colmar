<?php
require_once ('./tools-admin/db-admin.php');

if(isset($_POST['save'])){

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

    if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['adress']) && empty($_POST['tel']) && empty($_POST['dateOfBorn'])) {
        if (filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
            $queryString = $db->prepare( 'INSERT INTO user (firstname, lastname, password, email, is_admin, adress) VALUES (?, ?, ?, ?, ?, ?)');
            $NewInfo = $queryString->execute( [
                $_POST['firstname'],
                $_POST['lastname'],
                md5($new),
                $_POST['email'],
                $_POST['is_admin'],
                $_POST['adress'],
            ]);

            if ($NewInfo) {
                $passwordAssigned = $new;

                $header = "From: edarouj95@hotmail.fr\n";
                $header .= "MIME-version: 1.0\n";
                $header .= "Content-type:text/html; charset=utf8\n";
                $header .= "Content-Transfer-Encoding: 8bit";

                $contenu =  "<html>" .
                                "<head></head>" .
                                "<body style='padding: 0;margin: 0;font-family: sans-serif;'>" .
                                    "<div style='padding: 0 5px'>" .
                                        "<p> Bonjour Madame, Monsieur, </p>" .
                                        "<p> Votre compte a été crée et voici votre mot de passe associé à votre adresse mail </p>" .
                                        "<p> Mot de passe : " . $passwordAssigned . "</p>" .
                                        "<p> Identifiant : " . $_POST['email'] . "</p>" .
                                    "</div>" .
                                "</body>" .
                            "</html>";
                mail($_POST['email'], 'Création de votre compte', $contenu, $header);

                header('location:user-list.php');
                exit;
            } else {
                $message = "Impossible d'enregistrer le nouvel utilisateur...";
            }
        }
        else{
            $message = "L'information saisie n'est pas un mail";
        }
    }
    elseif (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['adress']) && !empty($_POST['tel']) && empty($_POST['dateOfBorn'])){
        if (filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
            $queryString = $db->prepare('INSERT INTO user (firstname, lastname, password, email, phone_number, is_admin, adress) VALUES (?, ?, ?, ?, ?, ?, ?)');
            $NewUser = $queryString->execute( [
                $_POST['firstname'],
                $_POST['lastname'],
                md5($new),
                $_POST['email'],
                $_POST['tel'],
                $_POST['is_admin'],
                $_POST['adress'],
            ]);

            if ($NewUser) {
                $passwordAssigned = $new;

                $header = "From: edarouj95@hotmail.fr\n";
                $header .= "MIME-version: 1.0\n";
                $header .= "Content-type:text/html; charset=utf8\n";
                $header .= "Content-Transfer-Encoding: 8bit";

                $contenu =  "<html>" .
                    "<head></head>" .
                    "<body style='padding: 0;margin: 0;font-family: sans-serif;'>" .
                    "<div style='padding: 0 5px'>" .
                    "<p> Bonjour Madame, Monsieur, </p>" .
                    "<p> Votre compte a été crée et voici votre mot de passe associé à votre adresse mail </p>" .
                    "<p> Mot de passe : " . $passwordAssigned . "</p>" .
                    "<p> Identifiant : " . $_POST['email'] . "</p>" .
                    "</div>" .
                    "</body>" .
                    "</html>";
                mail($_POST['email'], 'Création de votre compte', $contenu, $header);

                header('location:user-list.php');
                exit;
            } else {
                $message = "Impossible d'enregistrer le nouvel utilisateur...";
            }
        }
        else{
            $message = "L'information saisie n'est pas un mail";
        }
    }
    elseif(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['adress']) && !empty($_POST['dateOfBorn']) && empty($_POST['tel'])) {
        if (filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
            $date = date_parse($_POST['dateOfBorn']);
            if (checkdate($date['month'], $date['day'], $date['year'])) {
                $queryString = $db->prepare( 'INSERT INTO user (firstname, lastname, password, dateOfBorn, email, is_admin, adress) VALUES (?, ?, ?, ?, ?, ?, ?)');
                $queryNewUser = $queryString->execute( [
                    $_POST['firstname'],
                    $_POST['lastname'],
                    md5($new),
                    $_POST['dateOfBorn'],
                    $_POST['email'],
                    $_POST['is_admin'],
                    $_POST['adress'],
                ]);

                if ($queryNewUser) {
                    $passwordAssigned = $new;

                    $header = "From: edarouj95@hotmail.fr\n";
                    $header .= "MIME-version: 1.0\n";
                    $header .= "Content-type:text/html; charset=utf8\n";
                    $header .= "Content-Transfer-Encoding: 8bit";

                    $contenu =  "<html>" .
                        "<head></head>" .
                        "<body style='padding: 0;margin: 0;font-family: sans-serif;'>" .
                        "<div style='padding: 0 5px'>" .
                        "<p> Bonjour Madame, Monsieur, </p>" .
                        "<p> Votre compte a été crée et voici votre mot de passe associé à votre adresse mail </p>" .
                        "<p> Mot de passe : " . $passwordAssigned . "</p>" .
                        "<p> Identifiant : " . $_POST['email'] . "</p>" .
                        "</div>" .
                        "</body>" .
                        "</html>";
                    mail($_POST['email'], 'Création de votre compte', $contenu, $header);

                    header('location:user-list.php');
                    exit;
                } else {
                    $message = "Impossible d'enregistrer le nouvel utilisateur...";
                }
            }
            else{
                $message = "Date de format incorrect";
            }
        }
        else{
            $message = "L'information saisie n'est pas un mail";
        }
    }
    elseif(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['adress']) && !empty($_POST['dateOfBorn']) && !empty($_POST['tel'])) {
        if (filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
            $date = date_parse($_POST['dateOfBorn']);
            if (checkdate($date['month'], $date['day'], $date['year'])) {
                $queryString = $db->prepare('INSERT INTO user (firstname, lastname, password, dateOfBorn, phone_number, email, is_admin, adress) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
                $resultNewUser = $queryString->execute ([
                    $_POST['firstname'],
                    $_POST['lastname'],
                    md5($new),
                    $_POST['dateOfBorn'],
                    $_POST['tel'],
                    $_POST['email'],
                    $_POST['is_admin'],
                    $_POST['adress'],
                ]);

                if ($resultNewUser) {
                    $passwordAssigned = $new;

                    $header = "From: edarouj95@hotmail.fr\n";
                    $header .= "MIME-version: 1.0\n";
                    $header .= "Content-type:text/html; charset=utf8\n";
                    $header .= "Content-Transfer-Encoding: 8bit";

                    $contenu =  "<html>" .
                        "<head></head>" .
                        "<body style='padding: 0;margin: 0;font-family: sans-serif;'>" .
                        "<div style='padding: 0 5px'>" .
                        "<p> Bonjour Madame, Monsieur, </p>" .
                        "<p> Votre compte a été crée et voici votre mot de passe associé à votre adresse mail </p>" .
                        "<p> Mot de passe : " . $passwordAssigned . "</p>" .
                        "<p> Identifiant : " . $_POST['email'] . "</p>" .
                        "</div>" .
                        "</body>" .
                        "</html>";
                    mail($_POST['email'], 'Création de votre compte', $contenu, $header);

                    header('location:user-list.php');
                    exit;
                } else {
                    $message = "Impossible d'enregistrer le nouvel utilisateur...";
                }
            }
            else{
                $message = "Date de format incorrect";
            }
        }
        else{
            $message = "L'information saisie n'est pas un mail";
        }
    }
    else{
        $message = "Tous les champs ayant ce symbole * sont obligatoire";
    }
}

if(isset($_POST['update'])){
    if (!empty($_POST['dateOfBorn']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['adress'])) {
        if (filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
            $date = date_parse($_POST['dateOfBorn']);
            if (checkdate($date['month'], $date['day'], $date['year'])) {
                $queryString = 'UPDATE user SET firstname = :firstname, lastname = :lastname, dateOfBorn = :dateOfBorn, email = :email, adress = :adress ';
                $queryParameters = [
                    'firstname' => $_POST['firstname'],
                    'lastname' => $_POST['lastname'],
                    'dateOfBorn' => $_POST['dateOfBorn'],
                    'email' => $_POST['email'],
                    'adress' => $_POST['adress'],
                    'id' => $_POST['id']
                ];

                if (!empty($_POST['tel'])) {
                    $queryString .= ', phone_number = :phone_number ';
                    $queryParameters['phone_number'] = $_POST['tel'];
                }
                elseif (empty($_POST['tel'])) {
                    $queryString .= ', phone_number = :phone_number ';
                    $queryParameters['phone_number'] = $_POST['tel'];
                }

                $queryString .= 'WHERE id = :id';

                $query = $db->prepare($queryString);
                $result = $query->execute($queryParameters);

                if ($result) {
                    header('location:user-list.php');
                    exit;
                }
                else {
                    $message = 'Erreur.';
                }
            }
            else{
                $message = "Date de format incorrect";
            }
        }
        else{
            $message = "L'information saisie n'est pas un mail";
        }
    }
    elseif (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['adress']) && empty($_POST['dateOfBorn'])) {
        if (filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
            $defaultValue = '1000-01-01';
            $queryString = 'UPDATE user SET firstname = :firstname, lastname = :lastname , dateOfBorn = :dateOfBorn, email = :email, adress = :adress ';
            $queryParameters = [
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'email' => $_POST['email'],
                'dateOfBorn' => $defaultValue,
                'adress' => $_POST['adress'],
                'id' => $_POST['id']
            ];

            if (!empty($_POST['tel'])) {
                $queryString .= ', phone_number = :phone_number ';
                $queryParameters['phone_number'] = $_POST['tel'];
            }
            elseif (empty($_POST['tel'])) {
                $queryString .= ', phone_number = :phone_number ';
                $queryParameters['phone_number'] = $_POST['tel'];
            }

            $queryString .= 'WHERE id = :id';

            $query = $db->prepare($queryString);
            $result = $query->execute($queryParameters);

            if ($result) {
                header('location:user-list.php');
                exit;
            }
            else {
                $message = 'Erreur.';
            }
        }
        else{
            $message = "L'information saisie n'est pas un mail";
        }
    }
    else{
        $message = "Tous les champs ayant ce symbole * sont obligatoire à remplir";
    }
}

if(isset($_GET['user_id']) && isset($_GET['action']) && $_GET['action'] == 'edit'){
	$query = $db->prepare('SELECT * FROM user WHERE id = ?');
    $query->execute(array($_GET['user_id']));
	$user = $query->fetch();

	if ($user == false){
        header('location:user-list.php');
        exit;
    }
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Administration des utilisateurs - Mon premier blog !</title>
		<?php require 'partials/head_assets.php'; ?>
	</head>
	<body class="index-body">
		<div class="container-fluid">
			<?php require 'partials/header.php'; ?>
			<div class="row my-3 index-content">
				<?php require 'partials/nav.php'; ?>
				<section class="col-9">
					<header class="pb-3">
						<h4><?php if(isset($user)): ?>Modifier<?php else: ?>Ajouter<?php endif; ?> un utilisateur</h4>
					</header>

					<?php if(isset($message)):?>
                        <div class="bg-danger text-white">
                            <?= $message; ?>
                        </div>
					<?php endif; ?>

					<form action="user-form.php" method="post" enctype="multipart/form-data">

						<div class="form-group">
							<label for="firstname">Prénom : <b class="text-danger">*</b></label>
							<input class="form-control" value="<?= isset($user) ? htmlentities($user['firstname']) : '';?>" type="text" placeholder="Prénom" name="firstname" id="firstname" />
						</div>

						<div class="form-group">
							<label for="lastname">Nom de famille : <b class="text-danger">*</b></label>
							<input class="form-control" value="<?= isset($user) ? htmlentities($user['lastname']) : '';?>" type="text" placeholder="Nom de famille" name="lastname" id="lastname" />
						</div>

                        <div class="form-group">
                            <label for="dateOfBorn">Date de naissance : </label>
                            <input class="form-control" value="<?= isset($user) ? htmlentities($user['dateOfBorn']) : '';?>" type="date" placeholder="Date de naissance" name="dateOfBorn" id="dateOfBorn" />
                        </div>

						<div class="form-group">
							<label for="email">Email : <b class="text-danger">*</b></label>
							<input class="form-control" value="<?= isset($user) ? htmlentities($user['email']) : '';?>" type="email" placeholder="Email" name="email" id="email" />
						</div>

                        <div class="form-group">
                            <label for="tel">Numéro de téléphone :</label>
                            <input class="form-control" value="<?= isset($user) ? htmlentities($user['phone_number']) : '';?>" type="tel" placeholder="Phone number" name="tel" id="tel" />
                        </div>

						<div class="form-group">
							<label for="adress">Adresse postale  : <b class="text-danger">*</b></label>
							<textarea class="form-control" name="adress" id="adress" placeholder="Adresse exemple : 60 Quai de Jemmapes 75010 Paris"><?= isset($user) ? htmlentities($user['adress']) : '';?></textarea>
						</div>

						<div class="form-group">
							<label for="is_admin"> Admin ? <b class="text-danger">*</b></label>
							<select class="form-control" name="is_admin" id="is_admin">
								<option value="0" <?= isset($user) && $user['is_admin'] == 0 ? 'selected' : '';?>>Non</option>
								<option value="1" <?= isset($user) && $user['is_admin'] == 1 ? 'selected' : '';?>>Oui</option>
							</select>
						</div>

						<div class="text-right">
							<?php if(isset($user)): ?>
							    <input class="btn btn-success" type="submit" name="update" value="Mettre à jour" />
							<?php else: ?>
							    <input class="btn btn-success" type="submit" name="save" value="Enregistrer" />
							<?php endif; ?>
						</div>

						<?php if(isset($user)): ?>
						    <input type="hidden" name="id" value="<?= $user['id']?>" />
						<?php endif; ?>
					</form>
				</section>
			</div>
		</div>
	</body>
</html>
