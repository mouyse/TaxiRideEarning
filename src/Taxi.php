<?php
declare(strict_types=1);

namespace TaxiRideEarning;

class Taxi {
    private static $obj;

    protected function __clone() {}

    protected function __wake(): void {}

    private  function __construct(){ }

    public static function getInstance(){
        $subclass = Taxi::class;
        if(!isset(self::$obj)){
            self::$obj = new Taxi();
        }
        return self::$obj;
    }
}
