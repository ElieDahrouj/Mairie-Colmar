<?php
require_once './tools/common.php';

 if (isset($_GET['page'])){
     switch ($_GET['page']){
         case 'article';
             require_once ('controleurs/article.php');
         break;

         case 'cityInformations';
             require_once ('controleurs/cityInformations.php');
         break;

         case 'event';
             require_once ('controleurs/event.php');
         break;

         case 'contactUs';
             require_once ('controleurs/contactUs.php');
         break;

         case 'faq';
             require_once ('controleurs/faq.php');
         break;

         case 'faq-category';
             require_once ('controleurs/faq-category.php');
         break;

         case 'connexion';
            require_once('controleurs/connexion.php');
         break;

         case 'user-page';
            require_once('controleurs/userPage.php');
         break;

         case 'mentions-legales';
             require_once('controleurs/mentionsLegales.php');
         break;

         case 'coordonnees';
             require_once('controleurs/coordonnees.php');
         break;

         default :
             header('location:index.php');
             exit;
         break;
     }
 }
 else{
     require_once ('controleurs/homePage.php');
 }