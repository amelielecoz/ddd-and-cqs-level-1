<?php

class Vehicle {
    private $location;
    private $fleet;

    public function __construct() {
    }

    public function parkAtLocation(Location $location) {
        if(!$location->isFree) {
            return new Exception('A vehicle is already parked here');
        }
        $location->parkVehicle($this);
        $this->location = $location;
    }

    public function getFleet() {
        return $this->fleet;
    }

    public function getLocation() {
        return $this->location;
    }


}