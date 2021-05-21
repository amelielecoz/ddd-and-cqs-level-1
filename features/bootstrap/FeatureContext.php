<?php

use App\Domain\Model\Fleet;
use App\Domain\Model\Vehicle;
use PHPUnit\Framework\Assert;
use App\Domain\Model\Location;
use Behat\Behat\Context\Context;
use App\App\Command\ParkVehicleCommand;
use App\App\Command\VerifyLocationCommand;
use App\App\Command\RegisterVehicleCommand;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context 
{
    private $fleet;
    private $anotherFleet;
    private $vehicle;
    private $location;
    private $lastError = null;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {

    }

    /**
     * @Given my fleet
     */
    public function myFleet()
    {
        $this->fleet = new Fleet();
    }

    /**
     * @Given a vehicle
     */
    public function aVehicle()
    {
        $this->vehicle = new Vehicle();
    }
    
    /**
     * @Given a location
     */
    public function aLocation()
    {
        $this->location = new Location();
    }


    /**
     * @When I park my vehicle at this location
     * @When I try to park my vehicle at this location
     * @Given my vehicle has been parked into this location
     */
    public function iParkMyVehicleAtThisLocation()
    {
        $command = new ParkVehicleCommand();

        try {
            $command($this->vehicle, $this->location);
        } catch (\Throwable $th) {
            $this->lastError = $th;
        }
    }

    /**
     * @Then the known location of my vehicle should verify this location
     */
    public function theKnownLocationOfMyVehicleShouldVerifyThisLocation()
    {
        $command = new VerifyLocationCommand();

        try {
            $command($this->vehicle, $this->location);
        } catch (\Throwable $th) {
            $this->lastError = $th;
        }
    }


    /**
     * @Then I should be informed that my vehicle is already parked at this location
     */
    public function iShouldBeInformedThatMyVehicleIsAlreadyParkedAtThisLocation()
    {
        Assert::assertNotNull($this->lastError);
    }

    /**
     * @Then this vehicle should be part of my vehicle fleet
     */
    public function thisVehicleShouldBePartOfMyVehicleFleet()
    {
        Assert::assertTrue($this->fleet->hasVehicle($this->vehicle), 'This vehicle is not part of this fleet.');
    }

    /**
     * @When I try to register this vehicle into my fleet
     * @Given I have registered this vehicle into my fleet
     * @When I register this vehicle into my fleet
     */
    public function iRegisterThisVehicleIntoMyFleet()
    {
        $command = new RegisterVehicleCommand();

        try {
            $command($this->vehicle, $this->fleet);
        } catch (\Throwable $th) {
            $this->lastError = $th;
        }
    }

    /**
     * @Then I should be informed this vehicle has already been registered into my fleet
     */
    public function iShouldBeInformedThisThisVehicleHasAlreadyBeenRegisteredIntoMyFleet()
    {
        // verifie que $this->lastError n'est pas nul et vérifie le message
        Assert::assertNotNull($this->lastError);
    }

    /**
     * @Given the fleet of another user
     */
    public function theFleetOfAnotherUser()
    {
        $this->anotherFleet = new Fleet();
    }

    /**
     * @Given this vehicle has been registered into the other user's fleet
     */
    public function thisVehicleHasBeenRegisteredIntoTheOtherUsersFleet()
    {
        $command = new RegisterVehicleCommand();

        try {
            $command($this->vehicle, $this->anotherFleet);
        } catch (\Throwable $th) {
            $this->lastError = $th;
        }
    }
}
