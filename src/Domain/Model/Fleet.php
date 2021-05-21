<?php

namespace App\Domain\Model;

class Fleet
{
    private $vehicles = [];

    public function registerVehicle(Vehicle $vehicle): self
    {
        if (\in_array($vehicle, $this->vehicles)) {
            return new \Exception('This vehicle has already been registered into my fleet.');
        }
        $this->vehicles[] = $vehicle;

        return $this;
    }

    public function hasVehicle(Vehicle $vehicle): bool
    {
        return \in_array($vehicle, $this->vehicles);
    }
}
