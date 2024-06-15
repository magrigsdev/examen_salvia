<?php

$vehicules = $vehiculeModel->readAll();

?>

<h2 class="text-center">Location de véhicules</h2>

<div class="row mt-3 justify-content-around">
    <?php foreach ($vehicules as $veh):
        
        //$agence = $agenceModel->read($veh->getId());
        ?>
        <?php ?>
        <div class="card col-3 p-1">
            <div class="w-100">
                <img src="https://cdn.pixabay.com/photo/2012/11/02/13/02/car-63930_1280.jpg" class="img-fluid" alt="">
            </div>

            <div class="card-body">
                <h5 class="card-title">ville :<?= $veh->getId() ?></h5>
                <h5 class="card-text">marque : <?= $veh->getMarque()  ?> </h5>
                <h5 class="card-text">poids : <?= $veh->getPoids() ?> </h5>
                <h5 class="card-text">etat : <?= $veh->getEtat() ?> </h5>
                <h5 class="card-text">capacité : <?= $veh->getCapacite() ?> </h5>
            </div>

            <a class="btn btn-outline-success" href="?actionVehicule=detail&id=<?php ?>">Réserver</a>

        </div>
    <?php endforeach; ?>

</div>