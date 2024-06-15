<?php
namespace App\Entity;

class Vehicule
{
	private $id;
	private $marque;
	private $modele;
	private $prix_journalier;
	private $poids;
	private $type;
	private $etat;
	private $capacite;
	private $agence;
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

	}

	public function getPhoto()
	{
		return "public/images/" . $this->image;
	}

	public function getPrixJournalier()
	{
		return $this->prix_journalier;
	}


	public function getEtat()
	{
		return $this->etat;
	}

	public function getAgence()
	{
		return $this->agence;
	}

	

	public function getId()
	{
		return $this->id;
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

	public function getType()
	{
		return $this->type;
	}
	public function getCapacite()
	{
		return $this->capacite;
	}

	public function getId_agence()
	{
		return $this->agence;
	}

	public function setId($id): void
	{
		$this->id = $id;
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

	public function setType($type): void
	{
		$this->type = $type;
	}
	public function setCapacite($type): void
	{
		$this->capacite = $type;
	}

	public function setAgence($agence): void
	{
		$this->agence = $agence;
	}


	public function setPrixJournalier($prix_journalier): void
	{
		$this->prix_journalier = $prix_journalier;
	}


	public function setEtat($etat): void
	{
		$this->etat = $etat;
	}

	public function setIdAgence($id_agence): void
	{
		$this->agence = $id_agence;
	}



}