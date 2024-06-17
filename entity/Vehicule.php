<?php
namespace App\Entity;
use App\Model\AgenceModel;

class Vehicule
{
	private $id_vehicule;
	private $marque;
	private $modele;
	private $prix_journalier;
	private $poids;
	private $etat;
	private $capacite;
	private $image;

	private $id_agence;

	private $comments = [];

	public function __construct(array $data = [])
	{

		foreach ($data as $key => $value) {
			//création des set...
			$methode = "set" . ucfirst($key);

			//test si le setter existe
			if (method_exists($this, $methode)) {
				//appel du setter et on passe le '$value' en paramètre
				$this->$methode($value);
			}
		}
		// foreach ($data as $key => $value) {
		// 	//création des get...
		// 	$methode = "get" . ucfirst($key);

		// 	//test si le get existe
		// 	if (method_exists($this, $methode)) {
		// 		//appel du getter et on passe le '$value' en paramètre
		// 		$this->$methode($value);
		// 	}
		// }

	}

	public function getPhoto()
	{
		return "public/images/" . $this->image;
	}

	public function getPrix_journalier()
	{
		return $this->prix_journalier;
	}


	public function getEtat()
	{
		return $this->etat;
	}

	public function getId_vehicule()
	{
		return $this->id_vehicule;
	}

	public function getMarque()
	{
		return $this->marque;
	}

	public function getModele()
	{
		return $this->modele;
	}

	public function getImage()
	{
		return $this->image;
	}

	public function getPoids()
	{
		return $this->poids;
	}

	public function getCapacite()
	{
		return $this->capacite;
	}

	public function getId_agence()
	{

		return $this->id_agence;
	}

	public function setId_vehicule($id): void
	{
		$this->id_vehicule = $id;
	}

	public function setMarque($marque): void
	{
		$this->marque = $marque;
	}

	public function setModele($modele): void
	{
		$this->modele = $modele;
	}

	public function setImage($image): void
	{
		$this->image = $image;
	}

	public function setPoids($poids): void
	{
		$this->poids = $poids;
	}

	public function setCapacite($type): void
	{
		$this->capacite = $type;
	}

	public function setPrix_journalier($prix_journalier): void
	{
		$this->prix_journalier = $prix_journalier;
	}


	public function setEtat($etat): void
	{
		$this->etat = $etat;
	}

	//juste pour afficher le nom de l'agence
	public function setId_agence($id_agence): void
	{
		$agencemodel = new AgenceModel();
		$agence = $agencemodel->read($id_agence);
		$nomAgence = $agence->getNom();
		$this->id_agence = $nomAgence ;
	}



}