<?php

namespace App\Controller;

use App\Model\UtilisateurModel;
use App\Classes\Utilisateur;
use Exception;

class UtilisateurController {
    protected $model;

    public function __construct() {
        $this->model = new UtilisateurModel();
    }

    public function create($data) {
        try {
            $utilisateur = new Utilisateur(
                null, // L'ID utilisateur sera généré automatiquement par la base de données
                $data['nom'],
                $data['prenom'],
                $data['sexe'],
                $data['email'],
                $data['mdp'],
                $data['date_inscription']
            );
            $result = $this->model->create($utilisateur);

            if ($result) {
                return ['status' => 'success', 'message' => 'Utilisateur créé avec succès'];
            } else {
                return ['status' => 'error', 'message' => 'Échec de la création de l\'utilisateur'];
            }
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function read($id_utilisateur) {
        try {
            $utilisateur = $this->model->read($id_utilisateur);

            if ($utilisateur) {
                return ['status' => 'success', 'data' => $utilisateur];
            } else {
                return ['status' => 'error', 'message' => 'Utilisateur non trouvé'];
            }
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function update($data) {
        try {
            $utilisateur = new Utilisateur(
                $data['id_utilisateur'],
                $data['nom'],
                $data['prenom'],
                $data['sexe'],
                $data['email'],
                $data['mdp'],
                $data['date_inscription']
            );
            $result = $this->model->update($utilisateur);

            if ($result) {
                return ['status' => 'success', 'message' => 'Utilisateur mis à jour avec succès'];
            } else {
                return ['status' => 'error', 'message' => 'Échec de la mise à jour de l\'utilisateur'];
            }
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function delete($id_utilisateur) {
        try {
            $result = $this->model->delete($id_utilisateur);

            if ($result) {
                return ['status' => 'success', 'message' => 'Utilisateur supprimé avec succès'];
            } else {
                return ['status' => 'error', 'message' => 'Échec de la suppression de l\'utilisateur'];
            }
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function readAll() {
        try {
            $utilisateurs = $this->model->readAll();

            if ($utilisateurs) {
                return ['status' => 'success', 'data' => $utilisateurs];
            } else {
                return ['status' => 'error', 'message' => 'Aucun utilisateur trouvé'];
            }
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }
}