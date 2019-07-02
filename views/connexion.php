<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="./assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/main.css">
</head>
<body>
<?php require './partials/header.php'; ?>

<main>
    <div class="foundMail" id="focus">
        <form id="lostPass" method="post">

            <div class="closeModalMail">
                <i id="closeAll" class="fas fa-times"></i>
            </div>

            <div class="register">
                <label for="lostID">Veuillez indiquer votre adresse e-mail <i class="fas fa-id-card"></i></label>
                <div id="valid"><input type="email" id="lostID" name="lostID" value="" placeholder="Identifiant" ></div>
            </div>

            <div>
                <button type="submit" id="send" name="send">Envoyer <i class="far fa-share-square"></i></button>
            </div>
        </form>
    </div>

    <section class="homeBody">
        <div class="connexion">
            <h1>Veuillez renseigner les champs ci-dessous afin d’accéder à votre espace personnel</h1>

            <form autocomplete="off" action="index.php?page=connexion" method="post">
                <div>
                    <label for="userID">Renseigner l’identifiant fournis par mail <i class="fas fa-id-card"></i></label>
                    <div id="status"> <input type="email" id="userID" name="userID" value="<?= isset($loginError) ? $_POST['userID'] : '';?>" placeholder="Identifiant" ></div>

                    <label for="passwordID">Ainsi que le mot de passe qui vous a été attribué  <i class="fas fa-key"></i></label>
                    <input type="password" id="passwordID" name="passwordID" placeholder="Mot de passe">
                </div>

                <div>
                    <a id="mail" href="#focus">Mot de passe perdu <i class="fas fa-question"></i></a>
                    <button type="submit" id="connexion" name="connexion">Connexion <i class="fas fa-sign-in-alt"></i></button>
                </div>


                <?php if(isset($loginError)): ?>
                    <p> <?= $loginError; ?> </p>
                <?php endif; ?>
            </form>
        </div>
    </section>
</main>

<?php require './partials/footer.php'; ?>

<script src="./assets/js/connexion.js"></script>
<script src="./assets/js/lostPassword.js"></script>
<script src="./assets/js/navBarMobile.js"></script>

</body>
</html>