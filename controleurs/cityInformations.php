<?php
require_once ('./models/cityInformations.php');
$informations = getInformationCity();
$images = getAtYourService();
require_once ('./views/cityInformations.php');