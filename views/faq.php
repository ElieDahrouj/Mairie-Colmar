<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Questions fréquentes</title>
    <link rel="stylesheet" type="text/css" href="./assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/main.css">
</head>
<body>
<?php require './partials/header.php'; ?>

<main class="homeBody">
    <h1> Questions fréquentes triées par catégorie </h1>
    <section class="faq">
        <div>
            <?php foreach ($categories as $categorie ) : ?>
                <a href="index.php?page=faq-category&category_id=<?= $categorie['id']; ?>" > <?= ucfirst($categorie['name']); ?> <i class="fas fa-external-link-square-alt"></i></a>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php require './partials/footer.php'; ?>
<script src="./assets/js/navBarMobile.js"></script>
</body>
</html>