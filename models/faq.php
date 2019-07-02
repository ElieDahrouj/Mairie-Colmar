<?php
function getCategories(){
    $db = dbConnect();

    $queryCategories = $db->query('SELECT * FROM category_faq');
    $categories = $queryCategories->fetchAll();

    return $categories;
}

function getQuestions($getFaqCategory){
    $db = dbConnect();

    $queryQuestions = $db->prepare('SELECT * FROM faq WHERE categorie_id = ?');
    $queryQuestions->execute( array( $getFaqCategory ) );
    $questions = $queryQuestions->fetchAll();

    return $questions;
}

function getNameCategory($getNameCategory){
    $db = dbConnect();

    $queryNameCategory = $db->prepare('SELECT * FROM category_faq WHERE id = ?');
    $queryNameCategory->execute( array( $getNameCategory ) );
    $nameCategory = $queryNameCategory->fetch();

    if($nameCategory == false){
        header('location:index.php');
        exit;
    }
    return $nameCategory;
}