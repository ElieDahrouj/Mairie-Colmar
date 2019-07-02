<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="./assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/main.css">
</head>
<body>
<?php require './partials/header.php'; ?>

<main class="homeBody">
<section>
    <header> <h1>Dernières actualités présentes</h1> </header>
    <div class="slideshow-container">
        <?php foreach($homeArticles as $key => $article): ?>
            <article class="mySlides fade">
                <div class="structuration">
                    <img src="./assets/images/articles/<?= $article['image']; ?>" alt="">
                    <h2><?= $article['title']; ?></h2>
                    <p><?= $article['summary']; ?></p>
                    <a href="index.php?page=article&article_id=<?= $article['id']; ?>"><button>En savoir plus</button></a>
                </div>
            </article>
        <?php endforeach;?>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
</section>
</main>

<?php require './partials/footer.php'; ?>

<script src="./assets/js/homeSlide.js"></script>
<script src="./assets/js/navBarMobile.js"></script>
</body>
</html>