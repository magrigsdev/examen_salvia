<?php

namespace App\Controller;

use App\Model\Model;
use App\Classes\Agence;
use Exception;

class AgenceController {
    protected $model;

    public function __construct() {
        $this->model = new Model();
    }

    public function create($data) {
        try {
            $agence = new Agence($data['id_agence'], $data['nom'], $data['adresse'], $data['cp'], $data['ville']);
            $result = $this->model->create($agence);

            if ($result) {
                return ['status' => 'success', 'message' => 'Agence created successfully'];
            } else {
                return ['status' => 'error', 'message' => 'Failed to create Agence'];
            }
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function read($id_agence) {
        try {
            $agence = $this->model->read($id_agence);

            if ($agence) {
                return ['status' => 'success', 'data' => $agence];
            } else {
                return ['status' => 'error', 'message' => 'Agence not found'];
            }
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function update($data) {
        try {
            $agence = new Agence($data['id_agence'], $data['nom'], $data['adresse'], $data['cp'], $data['ville']);
            $result = $this->model->update($agence);

            if ($result) {
                return ['status' => 'success', 'message' => 'Agence updated successfully'];
            } else {
                return ['status' => 'error', 'message' => 'Failed to update Agence'];
            }
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function delete($id_agence) {
        try {
            $result = $this->model->delete($id_agence);

            if ($result) {
                return ['status' => 'success', 'message' => 'Agence deleted successfully'];
            } else {
                return ['status' => 'error', 'message' => 'Failed to delete Agence'];
            }
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function readAll() {
        try {
            $agences = $this->model->readAll();

            if ($agences) {
                return ['status' => 'success', 'data' => $agences];
            } else {
                return ['status' => 'error', 'message' => 'No agences found'];
            }
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }
}