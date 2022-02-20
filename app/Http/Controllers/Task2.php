<?php

/*
There is a code supporting calculation if a car is damaged.
Now it should be extended to support calculating if a painting of car's exterior is
damaged (this means, if a painting of any of car details is not OK - for example a door is scratched).

*/

Interface broken{
    public function isBroken();
}

abstract class CarDetail implements broken {

    protected $isBroken;

    public function __construct(bool $isBroken){
        $this->isBroken = $isBroken;
    }

    public function isBroken(): bool{
        return $this->isBroken;
    }

}

class Door extends CarDetail{


}

class Tyre extends CarDetail{


}

class Car{

    /**
     * @var CarDetail[]
     */
    private $details;

    /**
     * @param CarDetail[] $details
     */
    public function __construct(array $details){
        $this->details = $details;
        die(var_dump($this->details));
    }

    public function isBroken(): bool
    {
        foreach ($this->details as $detail) {

            if ($detail->isBroken()) {
                return true;
            }
        }

        return false;
    }

    public function isPaintingDamaged(): bool{
        // MAKE AN IMPLEMENTATION
    }
}

$car = new Car([new Door(true),
    new Tyre(false)]); // we pass a list of all details
