<?php

class Location {
    private $lat;
    private $lon;
    public $isFree;

    function __construct()
    {
        $this->isFree = true;
    }

    public function setCoordinates($lat, $lon)
    {
        $this->lat = $lat;
        $this->lon = $lon;
    }

    public function parkVehicle() {
        $this->isFree = false;
    }

    public function unparkVehicle() {
        $this->isFree = true;
    }
    
}