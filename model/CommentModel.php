<?php 
namespace App\Model;

use PDO;
use App\Classes\Commenter;

class CommenterModel {
    

    protected $pdo;
    public function __construct()
    {
        $this->pdo = new \PDO("mysql:host=127.0.0.1;dbname=projet_vente_billet", "root", "", [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ]);
    }

    public function create(Commenter $commenter) {
        $query = 'INSERT INTO commenter (personne, vehicule, dateComment) VALUES (:personne, :vehicule, :dateComment)';

        $stmt = $this->pdo->prepare($query);

        $stmt->bindValue(':personne', $commenter->getPersonne());
        $stmt->bindValue(':vehicule', $commenter->getVehicule());
        $stmt->bindValue(':dateComment', $commenter->getDateComment());

        return $stmt->execute();
    }

    public function read($personne, $vehicule) {
        $query = 'SELECT * FROM commenter WHERE personne = :personne AND vehicule = :vehicule';

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':personne', $personne);
        $stmt->bindValue(':vehicule', $vehicule);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Commenter($row['personne'], $row['vehicule'], $row['dateComment']);
        }

        return null;
    }

    public function update(Commenter $commenter) {
        $query = 'UPDATE commenter SET dateComment = :dateComment WHERE personne = :personne AND vehicule = :vehicule';

        $stmt = $this->pdo->prepare($query);

        $stmt->bindValue(':personne', $commenter->getPersonne());
        $stmt->bindValue(':vehicule', $commenter->getVehicule());
        $stmt->bindValue(':dateComment', $commenter->getDateComment());

        return $stmt->execute();
    }

    public function delete($personne, $vehicule) {
        $query = 'DELETE FROM commenter WHERE personne = :personne AND vehicule = :vehicule';

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':personne', $personne);
        $stmt->bindValue(':vehicule', $vehicule);

        return $stmt->execute();
    }

    public function readAll() {
        $query = 'SELECT * FROM commenter';

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        $commenters = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $commenters[] = new Commenter($row['personne'], $row['vehicule'], $row['dateComment']);
        }

        return $commenters;
    }
}