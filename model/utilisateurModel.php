<?php

namespace App\Model;

use PDO;
use App\Classes\Utilisateur;

class UtilisateurModel {
    protected $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:host=127.0.0.1;dbname=projet_examen", "root", "", [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public function create(Utilisateur $utilisateur) {
        $query = 'INSERT INTO utilisateurs (id_utilisateur, nom, prenom, sexe, email, mdp, date_inscription) 
                  VALUES (:id_utilisateur, :nom, :prenom, :sexe, :email, :mdp, :date_inscription)';

        $stmt = $this->pdo->prepare($query);

        $stmt->bindValue(':id_utilisateur', $utilisateur->getIdUtilisateur());
        $stmt->bindValue(':nom', $utilisateur->getNom());
        $stmt->bindValue(':prenom', $utilisateur->getPrenom());
        $stmt->bindValue(':sexe', $utilisateur->getSexe());
        $stmt->bindValue(':email', $utilisateur->getEmail());
        $stmt->bindValue(':mdp', $utilisateur->getMdp());
        $stmt->bindValue(':date_inscription', $utilisateur->getDateInscription());

        return $stmt->execute();
    }

    public function read($id_utilisateur) {
        $query = 'SELECT * FROM utilisateurs WHERE id_utilisateur = :id_utilisateur';

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':id_utilisateur', $id_utilisateur);
        $stmt->execute();

        $row = $stmt->fetch();

        if ($row) {
            return new Utilisateur($row['id_utilisateur'], $row['nom'], $row['prenom'], $row['sexe'], $row['email'], $row['mdp'], $row['date_inscription']);
        }

        return null;
    }

    public function update(Utilisateur $utilisateur) {
        $query = 'UPDATE utilisateurs SET nom = :nom, prenom = :prenom, sexe = :sexe, email = :email, mdp = :mdp, date_inscription = :date_inscription 
                  WHERE id_utilisateur = :id_utilisateur';

        $stmt = $this->pdo->prepare($query);

        $stmt->bindValue(':id_utilisateur', $utilisateur->getIdUtilisateur());
        $stmt->bindValue(':nom', $utilisateur->getNom());
        $stmt->bindValue(':prenom', $utilisateur->getPrenom());
        $stmt->bindValue(':sexe', $utilisateur->getSexe());
        $stmt->bindValue(':email', $utilisateur->getEmail());
        $stmt->bindValue(':mdp', $utilisateur->getMdp());
        $stmt->bindValue(':date_inscription', $utilisateur->getDateInscription());

        return $stmt->execute();
    }

    public function delete($id_utilisateur) {
        $query = 'DELETE FROM utilisateurs WHERE id_utilisateur = :id_utilisateur';

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':id_utilisateur', $id_utilisateur);

        return $stmt->execute();
    }

    public function readAll() {
        $query = 'SELECT * FROM utilisateurs';

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        $utilisateurs = [];

        while ($row = $stmt->fetch()) {
            $utilisateurs[] = new Utilisateur($row['id_utilisateur'], $row['nom'], $row['prenom'], $row['sexe'], $row['email'], $row['mdp'], $row['date_inscription']);
        }

        return $utilisateurs;
    }
}