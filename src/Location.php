<?php

class Location {
    private $lat;
    private $lon;
    public $isFree;
    private $vehicle = null;

    function __construct()
    {
        $this->isFree = true;
    }

    public function setCoordinates($lat, $lon)
    {
        $this->lat = $lat;
        $this->lon = $lon;
    }

    public function parkVehicle($vehicle) {
        if($this->vehicle === null) 
        
        {
            $this->vehicle = $vehicle;
            $this->isFree = false;
        }
        else if ($this->vehicle === $vehicle) {
            return new Exception('My vehicle is already parked here.');
        } else {
            return new Exception('A vehicle is already parked here.');
        }
    }

    public function unparkVehicle() {
        $this->vehicle = null;
        $this->isFree = true;
    }
    
}