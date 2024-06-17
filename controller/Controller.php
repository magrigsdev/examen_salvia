<?php


namespace App\Controller;
use App\Model\AgenceModel;
use App\Model\UtilisateurModel;
use App\Model\VehiculeModel;


class Controller {

    public function Http(){
        $vehiculeModel = new VehiculeModel();
        $agenceModel = new AgenceModel();

        $crt_vehicule = new VehiculeController();

        //quand url est vide
        if(empty($_GET)){
            //echo "nous sommes dans index";
            include "./views/home.php";
            //include "./views/connect.php";
        }
        if (isset($_GET['url']) && $_GET['url']=="") {
            //echo "nous sommes dans index";
            include "./views/home.php";
            //include "./views/connect.php";
        }
        
        if(isset($_GET['url']) && $_GET['url'] == 'reserver'){
                include "./views/connect.php";   
        }


        //client.
        if (isset($_GET['url']) && $_GET['url'] == 'traitement_connection') {
            //include "./views/connect.php";
            $modelUs = new UtilisateurModel();
            if($modelUs->connection($_POST['email'], $_POST['mdp'])){
                include "./views/reserver.php";
            }
            else{
                include "./views/connect.php";
            }
        }

        //reservation_traitement
        if (isset($_GET['url']) && $_GET['url'] == 'reservation_traitement') {
            //include "./views/connect.php";
            $modelUs = new UtilisateurModel();
            // if ($modelUs->connection($_POST['email'], $_POST['mdp'])) {
            //     include "./views/reserver.php";
            // } else {
            //     include "./views/connect.php";
            // }
        }

       
       
    }
}