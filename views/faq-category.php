<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= ucfirst($nameCategory['name']); ?></title>
    <link rel="stylesheet" type="text/css" href="./assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/main.css">
</head>
<body>
<?php require './partials/header.php'; ?>

<main class="homeBody">
    <header><h2> <?= ucfirst($nameCategory['name']); ?> </h2></header>
    <div class="faqCategory">
        <?php if (count($faqCategory) > 0) :?>
            <?php foreach ($faqCategory as $fc) :?>
                <div>
                      <button class="question"> <?= ucfirst($fc['questions']);?> </button>
                      <div class="response">
                          <p> <?= nl2br(ucfirst($fc['responses'])); ?> </p>
                      </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <h3>Aucune question n'est renseigné pour le moment</h3>
        <?php endif; ?>
    </div>
</main>

<?php require './partials/footer.php'; ?>
<script src="./assets/js/navBarMobile.js"></script>
<script src="./assets/js/faqCategory.js"></script>
</body>
</html>