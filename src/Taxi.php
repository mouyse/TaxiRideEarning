<?php
declare(strict_types=1);

/**
 * A Taxi class handling the DI through constructor and acting as an intermediatory.
 */

namespace TaxiRideEarning;

class Taxi 
{
    private static $obj;
    public Ride $ride;

    /**
     * Injecting the dependency of Ride class through constructor to calculate the earnings. 
     * @param \TaxiRideEarning\Ride $ride
     */
    public function __construct(Ride $ride)
    {
        $this->ride = $ride;
    }
    /**
     * Calls the actual method to calculate the max earnings. 
     * @return float|int
     */
    public function calculateMaxEarning()
    {
        return $this->ride->calculateBestRouteAndEarnings();
    }
}
