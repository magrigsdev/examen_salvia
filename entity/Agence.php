<?php
namespace App\Entity;
class Agence{
    private $id_agence;
    private $nom;
    private $adresse;
    private $cp;
    private $ville;

    public function __construct( $id_agence,  $nom,  $adresse,$cp,  $ville)
    {$this->id_agence = $id_agence;$this->nom = $nom;$this->adresse = $adresse;$this->cp = $cp;$this->ville = $ville;
    }

    public function getIdAgence() {return $this->id_agence;}

	public function getNom() {
        return $this->nom;
    }

	public function getAdresse() {
        return $this->adresse;
    }

	public function getCp() {
        return $this->cp;
    }

	public function getVille() {
        return $this->ville;
    }

	public function setIdAgence( $id_agence): void {
        $this->id_agence = $id_agence;
    }

	public function setNom( $nom): void {
        $this->nom = $nom;
    }

	public function setAdresse( $adresse): void {
        $this->adresse = $adresse;
    }

	public function setCp( $cp): void {
        $this->cp = $cp;
    }

	public function setVille( $ville): void {
        $this->ville = $ville;
    }

	
	
}