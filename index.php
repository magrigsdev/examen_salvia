<?php

use App\Autoloader;
use App\Controller\Controller;

include_once "./Autoloader.php";
Autoloader::register();

//declaration des models

//j'appelle les fichier static
include "./views/header.php";
$crt = new Controller();
$crt->http();

//j'appelle les fichier static
include "./views/footer.php";