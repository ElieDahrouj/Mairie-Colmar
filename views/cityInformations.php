<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informations sur la ville</title>
    <link rel="stylesheet" type="text/css" href="./assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/main.css">
</head>
<body>
<?php require './partials/header.php'; ?>

<main class="moreInformations">
    <section class="presentation">
        <header> <h1>Présentation de la ville</h1> </header>
        <?php foreach ($informations as $city): ?>
            <article>
                <img src="./assets/images/informations/<?= $city['illustration'];?>">
                <p> <?= htmlentities(ucfirst($city['informations']));?> </p>
            </article>
        <?php endforeach; ?>
    </section>

    <section class="services">
        <header> <h1>Les services fournis par la ville</h1> </header>
        <div>
            <?php foreach ($images as $colmarCity): ?>
                <a id="cityServices" href="#map" data-lat="<?=$colmarCity['latitude'];?>"
                   data-title="<?=$colmarCity['title'];?>" data-long="<?=$colmarCity['longitude'];?>"
                    data-address="<?=$colmarCity['address'];?>" data-schedules="<?=$colmarCity['schedules'];?>">
                    <figure>
                        <div>
                            <img src="./assets/images/informations/<?= $colmarCity['images']; ?>">
                        </div>
                        <figcaption> <?= htmlentities(ucfirst($colmarCity['title'])); ?> </figcaption>
                    </figure>
                </a>
            <?php endforeach; ?>
        </div>
        <div id="map" style="height: 60vh;"></div>
    </section>
</main>

<?php require './partials/footer.php'; ?>

<script src="./assets/js/cityServices.js"></script>
<script src="./assets/js/navBarMobile.js"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1gzk6m9WMAKk9lM_Y6LY_lmypMV-7L8I&callback=initMap">
</script>
</body>
</html>