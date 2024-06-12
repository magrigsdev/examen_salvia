<?php

namespace App\Controller;

use App\Model\VehiculeModel;
use App\Classes\Vehicule;
use Exception;

class VehiculeController {
    protected $model;

    public function __construct() {
        $this->model = new VehiculeModel();
    }

    public function create($data) {
        try {
            $vehicule = new Vehicule($data);
            $result = $this->model->create($vehicule);

            if ($result) {
                return ['status' => 'success', 'message' => 'Vehicule created successfully'];
            } else {
                return ['status' => 'error', 'message' => 'Failed to create Vehicule'];
            }
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function read($id) {
        try {
            $vehicule = $this->model->read($id);

            if ($vehicule) {
                return ['status' => 'success', 'data' => $vehicule];
            } else {
                return ['status' => 'error', 'message' => 'Vehicule not found'];
            }
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function update($data) {
        try {
            $vehicule = new Vehicule($data);
            $result = $this->model->update($vehicule);

            if ($result) {
                return ['status' => 'success', 'message' => 'Vehicule updated successfully'];
            } else {
                return ['status' => 'error', 'message' => 'Failed to update Vehicule'];
            }
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function delete($id) {
        try {
            $result = $this->model->delete($id);

            if ($result) {
                return ['status' => 'success', 'message' => 'Vehicule deleted successfully'];
            } else {
                return ['status' => 'error', 'message' => 'Failed to delete Vehicule'];
            }
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function readAll() {
        try {
            $vehicules = $this->model->readAll();

            if ($vehicules) {
                return ['status' => 'success', 'data' => $vehicules];
            } else {
                return ['status' => 'error', 'message' => 'No vehicules found'];
            }
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }
}