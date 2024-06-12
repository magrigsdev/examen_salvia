<?php


namespace App\Controller;
use App\Model\AgenceModel;


class Controller {

    public function Http(){
        
        if(empty($_GET)){
            //echo "nous sommes dans index";
            include "./views/home.php";
        }
       
       
    }
}