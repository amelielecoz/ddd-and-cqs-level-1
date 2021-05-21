<?php

namespace App\App\Command;

use App\Domain\Model\Fleet;
use App\Domain\Model\Vehicle;

final class RegisterVehicleCommand
{
    public function __invoke(Vehicle $vehicle, Fleet $fleet): void
    {
        $fleet->registerVehicle($vehicle);
    }
}
