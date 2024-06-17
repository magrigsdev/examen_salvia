<?php

?>

<h1 class="text-center lead text-uppercase text-primary">la liste des vehicules pour admin</h1>

<img src="" alt="" srcset="">
<div class="row mt-3 justify-content-around">
    <?php foreach ($vehicules as $veh): ?>

        <div class="card p-2" style="width: 18rem;">
            <img src="<?= $veh->getImage(); ?>" class="card-img-top" alt="vehicule">
            <div class="card-body">
                <h5 class="card-title text-uppercase"> <?= $veh->getMarque(); ?>     <?= $veh->getModele(); ?> </h5>
                <p>
                    <span class="card-text text-capitalize small">marque : <?= $veh->getMarque(); ?></span><br>
                    <span class="card-text text-capitalize small">model : <?= $veh->getModele(); ?></span>
                    <span class="card-text text-capitalize small"> capacité : <?= $veh->getCapacite(); ?></span><br>
                    <span class="card-text text-capitalize small">prix : <?= $veh->getPrix_journalier(); ?>€/
                        jour</span><br>
                    <span class="card-text text-capitalize small"> etat : <?= $veh->getEtat(); ?></span>
                    <span class="card-text text-capitalize small">poids : <?= $veh->getPoids(); ?> tonne</span><br>
                    <span class="card-text text-capitalize small">agence : <?= $veh->getId_agence(); ?></span><br>


                </p>

            </div>
            <div class="card-footer">
                <a href="?url=reserver&idvehicule=<?= $veh->getId_vehicule(); ?>" class="btn btn-primary p-1">supprimer</a>
                <a href="?url=reserver&idvehicule=<?= $veh->getId_vehicule(); ?>" class="btn btn-danger p-1">modifier</a>
            </div>
        </div>
    <?php endforeach ?>



</div>