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
            
        }
        if (isset($_GET['url']) && $_GET['url']=="") {
            //echo "nous sommes dans index";
            include "./views/home.php";
           
        }
        
        if(isset($_GET['url']) && $_GET['url'] == 'reserver'){
                include "./views/connect.php";   
        }


        //client.
        if (isset($_GET['url']) && $_GET['url'] == 'traitement_connection') {
            //include "./views/connect.php";
            //object utilisateurmodel
            $modelUs = new UtilisateurModel();

            //obtenir le id de l'utilisateur par mail
            $id_utilisateur = $modelUs->getIdutilisateur($_POST['email']);
            $id_vehicule = $_POST['id_vehicule'];
            
            if($modelUs->connection($_POST['email'], $_POST['mdp'])){
                //recuperer le id de vehicule 
                
                
                include "./views/reserver.php";
            }
            else{
                include "./views/connect.php";
            }
        }
        //admin
        if (isset($_GET['email']) && $_GET['email'] == 'salvia@gmail.com') {
            //include "./views/connect.php";
            
        }

        //reservation_traitement
        if (isset($_GET['url']) && $_GET['url'] == 'reservation_traitement') {
            //include "./views/connect.php";
            $modelUs = new UtilisateurModel();
            //$utilisateur = $modelUs->getIdbyEmailUtilisateur()
            
            $modelUs->reserver($_POST['date_reserver'], $_POST['id_utilisateur_post'], $_POST['id_vehicule_post']);
            include "./views/home.php";

        }

       
       
    }
}