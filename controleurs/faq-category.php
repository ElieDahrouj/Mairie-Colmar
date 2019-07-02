<?php
if(isset($_GET['category_id']) AND ctype_digit($_GET['category_id'])) {

    require_once ('./models/faq.php');
    $nameCategory = getNameCategory($_GET['category_id']);
    $faqCategory = getQuestions($_GET['category_id']);
    require_once ('./views/faq-category.php');
}
else{
    header('location:index.php');
    exit;
}