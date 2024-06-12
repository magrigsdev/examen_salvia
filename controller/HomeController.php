<?php

namespace App\Controller;

use App\Model\CommenterModel;
use App\Classes\Commenter;
use Exception;

class CommenterController {
    protected $model;

    public function __construct() {
        $this->model = new CommenterModel();
    }

    public function create($data) {
        try {
            $commenter = new Commenter($data['personne'], $data['vehicule'], $data['dateComment']);
            $result = $this->model->create($commenter);

            if ($result) {
                return ['status' => 'success', 'message' => 'Commenter created successfully'];
            } else {
                return ['status' => 'error', 'message' => 'Failed to create Commenter'];
            }
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function read($personne, $vehicule) {
        try {
            $commenter = $this->model->read($personne, $vehicule);

            if ($commenter) {
                return ['status' => 'success', 'data' => $commenter];
            } else {
                return ['status' => 'error', 'message' => 'Commenter not found'];
            }
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function update($data) {
        try {
            $commenter = new Commenter($data['personne'], $data['vehicule'], $data['dateComment']);
            $result = $this->model->update($commenter);

            if ($result) {
                return ['status' => 'success', 'message' => 'Commenter updated successfully'];
            } else {
                return ['status' => 'error', 'message' => 'Failed to update Commenter'];
            }
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function delete($personne, $vehicule) {
        try {
            $result = $this->model->delete($personne, $vehicule);

            if ($result) {
                return ['status' => 'success', 'message' => 'Commenter deleted successfully'];
            } else {
                return ['status' => 'error', 'message' => 'Failed to delete Commenter'];
            }
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function readAll() {
        try {
            $commenters = $this->model->readAll();

            if ($commenters) {
                return ['status' => 'success', 'data' => $commenters];
            } else {
                return ['status' => 'error', 'message' => 'No commenters found'];
            }
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }
}