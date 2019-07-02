<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Événements</title>
    <link rel="stylesheet" type="text/css" href="./assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/main.css">
</head>
<body>
<?php require './partials/header.php'; ?>

<main class="homeBody">
    <form class="calendar" action="index.php?page=event" method="post">
        <div class="dateEvent">
            <label for="eventDate"> <b>Calendrier</b> </label>
            <input type="date" name="eventDate" id="eventDate" value="<?php if (isset($_POST['eventDate'])): echo $memoDate; endif;?>">
        </div>

        <div>
            <input class="article" type="submit" name="send" id="send" value="Trier les articles">
        </div>

        <div>
            <input class="article" type="submit" name="allArticles" id="allArticles" value="Tous les articles">
        </div>
    </form>

    <div class="new">
        <form action="index.php?page=event" method="post">
            <div class="buttonArticle">
                <button name="allArticles" type="submit"><i class="fas fa-sync"></i></button>
            </div>

            <div class="dateEvent">
                <label for="eventDate"> <b>Calendrier</b> </label>
                <input type="date" name="eventDate" id="eventDate" value="<?php if (isset($_POST['eventDate'])): echo $memoDate; endif;?>">
            </div>

            <div class="buttonArticle">
                <button name="send" type="submit"><i class="fas fa-sort-alpha-up"></i></button>
            </div>
        </form>
    </div>

    <section>
        <?php if (isset($message)): ?>
            <p class="message"><?= $message ?></p>
        <?php endif; ?>

        <div class="bodyArticles">
            <?php if (count($allArticles) > 0) :?>
                <?php foreach ($allArticles as $eventArticles) :?>
                    <article>
                        <div>
                            <img src="./assets/images/articles/<?= $eventArticles['image']; ?>" alt="">
                        </div>
                        <h2><?= htmlentities(ucfirst($eventArticles['title'])); ?></h2>
                        <p><?= $eventArticles['summary']; ?></p>
                        <a href="index.php?page=article&article_id=<?= $eventArticles['id']; ?>"><button>En savoir plus</button></a>
                    </article>
                <?php endforeach; ?>
            <?php else :?>
                <span> Pas d'articles disponibles à cette date </span>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php require './partials/footer.php'; ?>

<script src="./assets/js/navBarMobile.js"></script>
<script src="./assets/js/event.js"></script>
</body>
</html>