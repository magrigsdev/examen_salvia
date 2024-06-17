


<div class="row text-center m-4">
    <div class="col-6">
        <form action="?url=reservation_traitement" method="post">
            <div class="input-group">
                <input type="date" class="form-control" name="date_reserver" >
                <input type="text" class="form-control" placeholder="Recipient's username" name="id_utilisateur_post" value="<?= $id_utilisateur ?>" hidden>
                <input type="text" class="form-control" placeholder="Recipient's username" name="id_vehicule_post" hidden value="<?= $id_vehicule ?>">
                <button class="btn btn-outline-danger" type="submit">Reserver</button>
                <a href="?url="" class="btn btn-outline-secondary" type="button">retour</a>
            </div>
        </form>
    </div>
</div>
