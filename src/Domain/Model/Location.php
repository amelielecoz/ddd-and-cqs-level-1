<?php

namespace App\Domain\Model;

class Location
{
    private $lat;
    private $lon;
    public $isFree;
    private $vehicle = null;

    public function __construct()
    {
        $this->isFree = true;
    }

    public function setCoordinates($lat, $lon): void
    {
        $this->lat = $lat;
        $this->lon = $lon;
    }

    public function parkVehicle($vehicle)
    {
        if (null === $this->vehicle) {
            $this->vehicle = $vehicle;
            $this->isFree = false;
        } elseif ($this->vehicle === $vehicle) {
            return new \Exception('My vehicle is already parked here.');
        } else {
            return new \Exception('A vehicle is already parked here.');
        }
    }

    public function unparkVehicle(): void
    {
        $this->vehicle = null;
        $this->isFree = true;
    }
}
