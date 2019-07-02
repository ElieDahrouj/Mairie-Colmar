<?php
if(isset($_GET['logout']) && isset($_SESSION['user'])){
    unset($_SESSION["user"]);
    header('location:index.php?page=connexion');
    exit;
}
?>

<nav class="navBar">
    <img id="logo" src="./assets/logo/Colmar-logo.png" alt="">

    <div class="navigation">
        <a href="index.php">Accueil </a>
        <a href="index.php?page=cityInformations"> Informations </a>
        <a href="index.php?page=event">Evènements</a>
        <a href="index.php?page=contactUs"> Contactez-nous </a>
        <?php if(isset($_SESSION['user'])): ?>
            <a href="index.php?page=user-page"> <?php echo $_SESSION['user']['lastname']; ?> </a>
        <?php else:?>
            <a href="index.php?page=connexion"> Connectez-vous </a>
        <?php endif; ?>
    </div>

    <div class="socialNetwork">
        <a href="https://fr-fr.facebook.com/villecolmar/"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.instagram.com/colmar_tourisme/?hl=fr"><i class="fab fa-instagram"></i></a>
    </div>
</nav>

<nav class="navBarMobile">
    <div id="mobileContainer">
        <div class="menu">
            <i class="fas fa-bars"></i>
        </div>

        <div id="logoMobile">
            <img src="./assets/logo/Colmar-logo.png" alt="">
        </div>
        <?php if (isset($_SESSION['user'])): ?>
            <a href="index.php?page=user-page" ><i class="far fa-user-circle"></i></i></a>
        <?php else: ?>
            <a href="index.php?page=connexion" ><i class="fas fa-user-circle"></i></a>
        <?php endif; ?>
    </div>

    <div id="modal" class="modalOpening" >
        <div class="closeModal">
            <i class="fas fa-times"></i>
        </div>
       <div class="linksMobiles">
           <a href="index.php?page=homePage">Accueil </a>
           <a href="index.php?page=cityInformations"> Informations </a>
           <a href="index.php?page=event">Evènements</a>
           <a href="index.php?page=contactUs"> Contactez-nous </a>
           <?php if(isset($_SESSION['user'])): ?>
               <a href="index.php?page=user-page"> <?php echo $_SESSION['user']['lastname']; ?> </a>
           <?php else:?>
                <a href="index.php?page=connexion"> Connectez-vous </a>
           <?php endif; ?>
       </div>
        <div class="socialNetworkMobile">
            <a href="https://fr-fr.facebook.com/villecolmar/"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/colmar_tourisme/?hl=fr"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</nav>

<header class="image">
    <img id="picture" src="./assets/images/header/colmar.jpg" alt="">
</header>