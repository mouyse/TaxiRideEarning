<?php
declare(strict_types=1);

/**
 * This file handles implementation of the IRide contract and calculates the maximum earning that can be made for a trip.
 */

namespace TaxiRideEarning;

class Ride implements IRide
{

    public $pickupLocations, $dropLocations, $tips = [];

    /**
     * Initializing the required variables.
     * 
     * @param array $pickupLocations
     * @param array $dropLocations
     * @param array $tips
     * @param \TaxiRideEarning\Taxi $taxi
     */
    public function __construct(array $pickupLocations, array $dropLocations, array $tips)
    {
        $this->pickupLocations = $pickupLocations;
        $this->dropLocations = $dropLocations;
        $this->tips = $tips;
    }

    /**
     * This function calculates the maximum earnings based on the pickup & drop locations + tips provided as a parameters to the constructor.
     * @return int|float
     */
    public function calculateBestRouteAndEarnings(): int|float
    {

        $earningsBasedOnPickupLocation = [];
        /**
         * We are iterating through the list of pickup locations and then deriving the maximum earning that can be made
         * from that specific pickup location, i.e. 'i'. 
         * 
         * Once we have the whole dataset of earnings based on the pick-up location, we are returning the maximum value stating 
         * if the driver starts from that pickup location, he/she would earn the most. 
         */
        for($i=0; $i<count($this->pickupLocations); $i++){

            $earningsBasedOnPickupLocation[$i] = $earningsBasedOnPickupLocation[$i] ?? 0;
            $earningsBasedOnPickupLocation[$i] += $this->dropLocations[$i]-$this->pickupLocations[$i]+$this->tips[$i];

            for($j=0; $j<count($this->pickupLocations); $j++){
                /**
                 * Making sure that the driver is not able to backtrack by checking if the next pickup location
                 * is farther than the previous drop location. 
                 */
                if($this->pickupLocations[$j]>=$this->dropLocations[$i]){                
                    $earningsBasedOnPickupLocation[$i] += $this->dropLocations[$j]-$this->pickupLocations[$j]+$this->tips[$j];
                }
            }
            $earningsBasedOnPickupLocation[$i] ??= 0;
        }
        
        return max($earningsBasedOnPickupLocation);
    }

}