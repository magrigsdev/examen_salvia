<?php


//$vehicules = $agencemodel->readAll();

var_dump($vehicules);
?>

<h2 class="text-center">Location de véhicules</h2>

<div class="row mt-3 justify-content-around">
    <?php foreach ($vehicules as $veh):
        $agence = $agencemodel->read($veh->getIdAgence());
        
        ?>
        <?php var_dump($agence) ?>
        <div class="card col-3 m-1 p-1">
            <div class="w-100">
                <img src="https://cdn.pixabay.com/photo/2012/11/02/13/02/car-63930_1280.jpg" class="img-fluid" alt="">
            </div>

            <div class="card-body">
                <h3 class="card-title">ville :<?= $veh->getVille() ?></h3>
                <h3 class="card-text">code postal : <?= $veh->getCp() ?> </h3>
                <h3 class="card-text">agence : <?= $veh->getIdAgence() ?> </h3>
            </div>

            <a class="btn btn-outline-success" href="?actionVehicule=detail&id=<?= $veh->getIdAgence() ?>">Détail du véhicule</a>

        </div>
    <?php endforeach; ?>

</div>