<?php 

namespace App\Classes ;
class Reservation{
    private $personne;
    private $vehicule;
    private $dateReservation;
	private $debut;
	private $fin;

public function __construct( $personne,  $vehicule,  $dateReservation,  $debut,  $fin){
    $this->personne = $personne;$this->vehicule = $vehicule;$this->dateReservation = $dateReservation;$this->debut = $debut;$this->fin = $fin;
}
public function getPersonne() {
    return $this->personne;
}

	public function getVehicule() {
        return $this->vehicule;
    }

	public function getDateReservation() {
        return $this->dateReservation;
    }

	public function getDebut() {
        return $this->debut;
    }

	public function getFin() {
        return $this->fin;
    }

	public function setPersonne( $personne): void {
        $this->personne = $personne;
    }

	public function setVehicule( $vehicule): void {
        $this->vehicule = $vehicule;
    }

	public function setDateReservation( $dateReservation): void {
        $this->dateReservation = $dateReservation;
    }

	public function setDebut( $debut): void {
        $this->debut = $debut;
    }

	public function setFin( $fin): void {
        $this->fin = $fin;
    }

	
	

}