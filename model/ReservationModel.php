<?php 
namespace App\Model;

use PDO;
use App\Classes\Reservation;

class ReservationModel {
    protected $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:host=127.0.0.1;dbname=projet_vente_billet", "root", "", [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public function create(Reservation $reservation) {
        $query = 'INSERT INTO reservations (personne, vehicule, dateReservation, debut, fin) VALUES (:personne, :vehicule, :dateReservation, :debut, :fin)';

        $stmt = $this->pdo->prepare($query);

        $stmt->bindValue(':personne', $reservation->getPersonne());
        $stmt->bindValue(':vehicule', $reservation->getVehicule());
        $stmt->bindValue(':dateReservation', $reservation->getDateReservation());
        $stmt->bindValue(':debut', $reservation->getDebut());
        $stmt->bindValue(':fin', $reservation->getFin());

        return $stmt->execute();
    }

    public function read($personne, $vehicule) {
        $query = 'SELECT * FROM reservations WHERE personne = :personne AND vehicule = :vehicule';

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':personne', $personne);
        $stmt->bindValue(':vehicule', $vehicule);
        $stmt->execute();

        $row = $stmt->fetch();

        if ($row) {
            return new Reservation($row['personne'], $row['vehicule'], $row['dateReservation'], $row['debut'], $row['fin']);
        }

        return null;
    }

    public function update(Reservation $reservation) {
        $query = 'UPDATE reservations SET dateReservation = :dateReservation, debut = :debut, fin = :fin WHERE personne = :personne AND vehicule = :vehicule';

        $stmt = $this->pdo->prepare($query);

        $stmt->bindValue(':personne', $reservation->getPersonne());
        $stmt->bindValue(':vehicule', $reservation->getVehicule());
        $stmt->bindValue(':dateReservation', $reservation->getDateReservation());
        $stmt->bindValue(':debut', $reservation->getDebut());
        $stmt->bindValue(':fin', $reservation->getFin());

        return $stmt->execute();
    }

    public function delete($personne, $vehicule) {
        $query = 'DELETE FROM reservations WHERE personne = :personne AND vehicule = :vehicule';

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':personne', $personne);
        $stmt->bindValue(':vehicule', $vehicule);

        return $stmt->execute();
    }

    public function readAll() {
        $query = 'SELECT * FROM reservations';

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        $reservations = [];

        while ($row = $stmt->fetch()) {
            $reservations[] = new Reservation($row['personne'], $row['vehicule'], $row['dateReservation'], $row['debut'], $row['fin']);
        }

        return $reservations;
    }
}