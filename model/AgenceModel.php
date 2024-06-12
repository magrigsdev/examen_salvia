<?php 
namespace App\Model;

use PDO;
use App\Entity\Agence;

class AgenceModel
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=127.0.0.1;dbname=salvia_agence", "root", "", [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public function create(Agence $agence) {
        $query = 'INSERT INTO agences (id_agence, nom, adresse, cp, ville) VALUES (:id_agence, :nom, :adresse, :cp, :ville)';

        $stmt = $this->pdo->prepare($query);

        $stmt->bindValue(':id_agence', $agence->getIdAgence());
        $stmt->bindValue(':nom', $agence->getNom());
        $stmt->bindValue(':adresse', $agence->getAdresse());
        $stmt->bindValue(':cp', $agence->getCp());
        $stmt->bindValue(':ville', $agence->getVille());

        return $stmt->execute();
    }

    public function read($id_agence) {
        $query = 'SELECT * FROM agence WHERE id_agence = :id_agence';

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':id_agence', $id_agence);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Agence($row['id_agence'], $row['nom'], $row['adresse'], $row['cp'], $row['ville']);
        }

        return null;
    }

    public function update(Agence $agence) {
        $query = 'UPDATE agences SET nom = :nom, adresse = :adresse, cp = :cp, ville = :ville WHERE id_agence = :id_agence';

        $stmt = $this->pdo->prepare($query);

        $stmt->bindValue(':id_agence', $agence->getIdAgence());
        $stmt->bindValue(':nom', $agence->getNom());
        $stmt->bindValue(':adresse', $agence->getAdresse());
        $stmt->bindValue(':cp', $agence->getCp());
        $stmt->bindValue(':ville', $agence->getVille());

        return $stmt->execute();
    }

    public function delete($id_agence) {
        $query = 'DELETE FROM agence WHERE id_agence = :id_agence';

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':id_agence', $id_agence);

        return $stmt->execute();
    }

    public function readAll() {
        $query = 'SELECT * FROM agence';

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        $agences = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $agences[] = new Agence($row['id_agence'], $row['nom'], $row['adresse'], $row['cp'], $row['ville']);
        }

        return $agences;
    }
}