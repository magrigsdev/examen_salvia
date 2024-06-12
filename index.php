<?php

use App\Autoloader;
use App\Controller\Controller;
use App\Model\AgenceModel;
use App\Model\VehiculeModel;



include_once "./Autoloader.php";
Autoloader::register();

$agence = new AgenceModel();
$vehicules = new VehiculeModel();
var_dump($vehicules);

include "./views/header.php";
$crt = new Controller();
$crt->http();
include "./views/footer.php";