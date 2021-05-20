<?php

use function PHPUnit\Framework\throwException;

class Fleet {
    private $vehicles = [];

    public function registerVehicle($vehicle) {
        if($this->vehicles && in_array($vehicle, $this->vehicles)) {
            return new Exception('This vehicle has already been registered into my fleet.');
        }
        $this->vehicles[] = $vehicle;
    }

    public function getVehicles() {
        if(!$this->vehicles) {
            throw new Exception('The fleet is empty.');
        }
        return $this->vehicles;
    }

}