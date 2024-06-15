<?php

use App\Autoloader;
use App\Controller\Controller;
use App\Model\AgenceModel;
use App\Model\VehiculeModel;


include_once "./Autoloader.php";
Autoloader::register();

//declaration des models
$agence = new AgenceModel();
$vehicules = new VehiculeModel();

//j'appelle les fichier static
include "./views/header.php";
$crt = new Controller();
$crt->http();

//j'appelle les fichier static
include "./views/footer.php";