<?php


namespace App\Controller;
use App\Model\AgenceModel;
use App\Model\VehiculeModel;


class Controller {

    public function Http(){
        $vehiculeModel = new VehiculeModel();
        $agenceModel = new AgenceModel();

        //quand url est vide
        if(empty($_GET)){
            //echo "nous sommes dans index";
            include "./views/home.php";
            //include "./views/connect.php";
        }
       
       
    }
}