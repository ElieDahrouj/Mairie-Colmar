<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Espace personnel de <?= $_SESSION['user']['lastname']; ?></title>
    <link rel="stylesheet" type="text/css" href="./assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/main.css">
</head>
<body>
<?php require './partials/header.php'; ?>

<main class="homeBody" id="messageOnlyUserConnected">
    <nav id="navSession">
        <a href="index.php?logout">Déconnexion</a>

        <?php if($_SESSION['user']['is_admin'] == 1): ?>
            <a href="admin/index.php">Administration</a>
        <?php endif; ?>
    </nav>
    <section class="tableOfReceipt">
        <?php if (count($paymentAdvice) > 0) :?>
            <table>
                <thead>
                    <tr>
                        <th>N°facture</th>
                        <th>Date</th>
                        <th>Consulter</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($paymentAdvice as $receipt): ?>
                        <tr>
                            <th><?= htmlentities($receipt['name']); ?></th>
                            <td><?= htmlentities(strftime("%d/%m/%y", strtotime($receipt['date']))); ?></td>
                            <td><a href="./assets/factures clients/<?=htmlentities($receipt['name']); ?>" target="_blank">
                                    <i class="far fa-eye"></i> </a>
                            </td>
                            <td class="downloadReceipt">
                                <a href="./assets/factures clients/<?=htmlentities($receipt['name']); ?>"
                                   download="<?=htmlentities($receipt['name']); ?>"><i class="fas fa-download"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Vous n'avez pas de factures</p>
        <?php endif;?>
    </section>

    <?php foreach ($infosUser as $infoUserSession) : ?>
        <?php if ($infoUserSession['is_confirmed'] == 0) :?>
            <section class="infoUser">
                <h3>Informations personnelles</h3>
                <div class="prevent">
                    <h5>Verifiez les informations afin de les enregistrer définitivement</h5>
                    <h5>En cas de fautes vous pouvez nous contacter via le formulaire </h5>
                </div>
                <div id="confirmInfo">
                    <div id="displaySession">
                            <div>
                                <h4>Nom :</h4>
                                 <span><?= ucfirst(htmlentities($infoUserSession['lastname'])); ?></span>

                                <h4>Prénom :</h4>
                                <span><?= ucfirst(htmlentities($infoUserSession['firstname'])); ?></span>

                                <h4>E - mail :</h4>
                                <span><?= ucfirst(htmlentities($infoUserSession['email'])) ;?></span>
                            </div>

                            <div>
                                <h4>Adresse :</h4>
                                <span><?= ucfirst(htmlentities($infoUserSession['adress'])); ?></span>

                                <?php if (!empty($infoUserSession['phone_number'])) :?>
                                    <h4>Numéro de téléphone :</h4>
                                    <span><?= htmlentities($infoUserSession['phone_number']); ?></span>
                                <?php endif; ?>

                                <?php if (!empty($infoUserSession['dateOfBorn'])) :?>
                                    <h4>Date de naissance :</h4>
                                     <span>
                                        <?= htmlentities(strftime("%d/%m/%y", strtotime($infoUserSession['dateOfBorn']))); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                    </div>
                    <form id="isConfirmed" class="confirmBtn">
                        <button type="submit" name="confirmation">Enregistrer</button>
                    </form>
                </div>
            </section>
        <?php endif; ?>
    <?php endforeach; ?>
</main>

<?php require './partials/footer.php'; ?>

<script src="./assets/js/navBarMobile.js"></script>
<script src="./assets/js/userPage.js"></script>
</body>
</html>