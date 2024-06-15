<?php

namespace App\Model;

use PDO;
use App\Entity\Vehicule;

class VehiculeModel {
    protected $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:host=127.0.0.1;dbname=salvia_agence", "root", "", [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public function create(Vehicule $vehicule) {
        $query = 'INSERT INTO vehicule ( marque, modele, prix_journalier, img, poids, type, etat, capacite, agence) 
                  VALUES ( :marque, :modele, :prix_journalier, :img, :poids, :type, :etat, :capacite, :agence)';

        $stmt = $this->pdo->prepare($query);

        $stmt->bindValue(':marque', $vehicule->getMarque());
        $stmt->bindValue(':modele', $vehicule->getModele());
        $stmt->bindValue(':prix_journalier', $vehicule->getPrixJournalier());
        $stmt->bindValue(':img', $vehicule->getImg());
        $stmt->bindValue(':poids', $vehicule->getPoids());
        $stmt->bindValue(':type', $vehicule->getType());
        $stmt->bindValue(':etat', $vehicule->getEtat());
        $stmt->bindValue(':capacite', $vehicule->getCapacite());
        $stmt->bindValue(':agence', $vehicule->getAgence());

        return $stmt->execute();
    }

    public function read($id) {
        $query = 'SELECT * FROM vehicule WHERE id = :id';

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch();

        if ($row) {
            return new Vehicule($row);
        }

        return null;
    }

    public function update(Vehicule $vehicule) {
        $query = 'UPDATE vehicule SET marque = :marque, modele = :modele, prix_journalier = :prix_journalier, 
                  img = :img, poids = :poids, type = :type, etat = :etat, capacite = :capacite, agence = :agence 
                  WHERE id = :id';

        $stmt = $this->pdo->prepare($query);

        $stmt->bindValue(':id', $vehicule->getId());
        $stmt->bindValue(':marque', $vehicule->getMarque());
        $stmt->bindValue(':modele', $vehicule->getModele());
        $stmt->bindValue(':prix_journalier', $vehicule->getPrixJournalier());
        $stmt->bindValue(':img', $vehicule->getImg());
        $stmt->bindValue(':poids', $vehicule->getPoids());
        $stmt->bindValue(':type', $vehicule->getType());
        $stmt->bindValue(':etat', $vehicule->getEtat());
        $stmt->bindValue(':capacite', $vehicule->getCapacite());
        $stmt->bindValue(':agence', $vehicule->getAgence());

        return $stmt->execute();
    }

    public function delete($id) {
        $query = 'DELETE FROM vehicule WHERE id = :id';

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }

    public function readAll() {
        $query = 'SELECT * FROM vehicule';

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        $vehicules = [];

        while ($row = $stmt->fetch()) {
            $vehicules[] = new Vehicule($row);
        }

        return $vehicules;
    }
}