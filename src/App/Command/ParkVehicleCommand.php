<?php

namespace App\App\Command;

use App\Domain\Model\Vehicle;
use App\Domain\Model\Location;

final class ParkVehicleCommand
{
    public function __invoke(Vehicle $vehicle, Location $location): void
    {
        $vehicle->parkAtLocation($location);
    }
}