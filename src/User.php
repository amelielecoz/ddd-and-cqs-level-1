<?php

class User {
    private $fleet;

    public function setFleet(Fleet $fleet) {
        $this->fleet = $fleet;
    }

    public function getFleet() {
        if(!$this->fleet) {
            return new Exception('This user has no fleet.');
        }
        return $this->fleet;
    }

}