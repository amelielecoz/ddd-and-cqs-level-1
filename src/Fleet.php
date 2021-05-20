<?php

class Fleet {
    private $vehicles = [];

    public function registerVehicle($vehicle) {
        $this->vehicles[] = $vehicle;
    }

    public function getVehicles() {
        if(!$this->vehicles) {
            throw new Exception('The fleet is empty.');
        }
        return $this->vehicles;
    }

}