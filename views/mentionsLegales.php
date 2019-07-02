<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mentions légales</title>
    <link rel="stylesheet" type="text/css" href="./assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/main.css">
</head>
<body>
<?php require './partials/header.php'; ?>
<main class="homeBody">
    <section class="mentions">
        <h3>Mentions légales</h3>
        <?php foreach ($mentions as $mentionLegales) :?>
            <?= nl2br($mentionLegales['text']); ?>
        <?php endforeach; ?>
    </section>
</main>

<?php require './partials/footer.php'; ?>
<script src="./assets/js/navBarMobile.js"></script>
</body>
</html>