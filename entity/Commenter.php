<?php

namespace App\Classes ;

class Commenter{
    private $personne;
    private $vehicule;
    private $dateComment;

    public function __construct( $personne,  $vehicule,  $dateComment){
        $this->personne = $personne;$this->vehicule = $vehicule;$this->dateComment = $dateComment;
    }

    public function getPersonne() {
        return $this->personne;
    }

	public function getVehicule() {
        return $this->vehicule;
    }

	public function getDateComment() {
        return $this->dateComment;
    }

    public function setPersonne( $personne): void {
        $this->personne = $personne;
    }

	public function setVehicule( $vehicule): void {
        $this->vehicule = $vehicule;
    }

	public function setDateComment( $dateComment): void {
        $this->dateComment = $dateComment;
    }

	

	
	

}