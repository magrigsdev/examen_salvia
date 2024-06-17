<?php 
namespace App\Entity ;

class Utilisateur{
    private $id_utilisateur;
    private $nom;
    private $prenom;
    private $sexe;
    private $email;
    private $mdp;
    private $date_inscription;

    public function __construct( $id_utilisateur,  $nom,  $prenom,  $sexe,  $email,  $mdp,  $date_inscription){
        $this->id_utilisateur = $id_utilisateur;$this->nom = $nom;$this->prenom = $prenom;$this->sexe = $sexe;$this->email = $email;$this->mdp = $mdp;$this->date_inscription = $date_inscription;
    }

public function getIdUtilisateur() {
    return $this->id_utilisateur;
}

	public function getNom() {
        return $this->nom;
    }

	public function getPrenom() {
        return $this->prenom;
    }

	public function getSexe() {
        return $this->sexe;
    }

	public function getEmail() {
        return $this->email;
    }

	public function getMdp() {
        return $this->mdp;
    }

	public function getDateInscription() {
        return $this->date_inscription;
    }
    public function setIdUtilisateur( $id_utilisateur): void {
        $this->id_utilisateur = $id_utilisateur;
    }

	public function setNom( $nom): void {
        $this->nom = $nom;
    }

	public function setPrenom( $prenom): void {
        $this->prenom = $prenom;
    }

	public function setSexe( $sexe): void {
        $this->sexe = $sexe;
    }

	public function setEmail( $email): void {
        $this->email = $email;
    }

	public function setMdp( $mdp): void {
        $this->mdp = $mdp;
    }

	public function setDateInscription( $date_inscription): void {
        $this->date_inscription = $date_inscription;
    }

	

	
	
}
