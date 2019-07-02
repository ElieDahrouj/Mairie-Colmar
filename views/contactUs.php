<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contactez-nous</title>
    <link rel="stylesheet" type="text/css" href="./assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/main.css">
</head>
<body>
<?php require './partials/header.php'; ?>

<main class="signal">
    <header><h1> Veuillez sélectionner le motif de votre demande</h1></header>
    <section class="report">
        <form id="register">
            <div id="firstBlock">
                <div>
                    <label for="motif">Motif *</label>
                    <select id="motif" name="motif">
                        <option id="choice"> Choissisez votre motif</option>
                        <?php foreach ($motifs as $motif) : ?>
                            <option value="<?= isset($motif) ? htmlentities($motif['id']) : '';?>"><?= $motif['motif'] ;?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div id="secondBlock">
                <div>
                    <div>
                        <label for="email">E - mail <i class="fas fa-at"></i> *</label>
                        <input id="email" type="email" name="email" placeholder="Adresse e-mail">
                    </div>

                    <div>
                        <button type="submit" id="sendContact">Envoyé <i class="fas fa-share"></i> </button>
                    </div>
                </div>

                <div>
                    <label for="message">Entrez votre message *</label>
                    <textarea name="message" id="message" cols="75" rows="5"></textarea>
                </div>
            </div>
        </form>
    </section>
</main>


<?php require './partials/footer.php'; ?>

<script src="./assets/js/navBarMobile.js"></script>
<script src="./assets/js/contact.js"></script>
</body>
</html>