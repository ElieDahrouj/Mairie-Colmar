<?php
require_once './models/article.php';
$homeArticles = getArticles($limit = 3 , $dateEvent = false);
require_once './views/homePage.php';