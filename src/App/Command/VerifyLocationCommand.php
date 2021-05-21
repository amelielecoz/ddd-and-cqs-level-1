<?php

namespace App\App\Command;

use App\Domain\Model\Vehicle;
use App\Domain\Model\Location;

final class VerifyLocationCommand
{
    public function __invoke(Vehicle $vehicle, Location $location): void
    {
        $vehicle->verifyLocation($location);
    }
}