<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coordonnées</title>
    <link rel="stylesheet" type="text/css" href="./assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/main.css">
</head>
<body>
<?php require './partials/header.php'; ?>
<main class="homeBody">
    <section class="coordonnees">
        <?php foreach ($coordonnees as $coordonnee): ?>

        <div class="title">
            <h3><?= htmlentities(ucfirst($coordonnee['title'])); ?></h3>

            <div>
                <span><i class="fas fa-phone-volume"></i> <b>Tél.</b> <?= htmlentities($coordonnee['tel']); ?> </span>
                <span><i class="fas fa-fax"></i> <b>Fax.</b> <?= htmlentities($coordonnee['fax']); ?></span>
            </div>

            <p><?= ucfirst(nl2br($coordonnee['schedules'])); ?></p>
        </div>
        <div class="cityHall">
            <img src="./assets/images/informations/<?= $coordonnee['image'] ;?>" alt="">
        </div>
        <?php endforeach; ?>
    </section>
</main>

<?php require './partials/footer.php'; ?>
<script src="./assets/js/navBarMobile.js"></script>
</body>
</html>