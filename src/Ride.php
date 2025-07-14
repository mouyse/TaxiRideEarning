<?php
declare(strict_types=1);

namespace TaxiRideEarning;

class Ride implements IRide{
    public $pickupLocations, $dropLocations, $tips = [];
    public Taxi $taxi;

    public function __construct(array $pickupLocations, array $dropLocations, array $tips, Taxi $taxi){
        $this->pickupLocations = $pickupLocations;
        $this->dropLocations = $dropLocations;
        $this->tips = $tips;
        $this->taxi = $taxi;
    }

    public function calculateBestRouteAndEarnings(): int|float{

        $earningsBasedOnPickupLocation = [];
        for($i=0; $i<count($this->pickupLocations); $i++){

            $earningsBasedOnPickupLocation[$i] = $earningsBasedOnPickupLocation[$i] ?? 0;
            $earningsBasedOnPickupLocation[$i] += $this->dropLocations[$i]-$this->pickupLocations[$i]+$this->tips[$i];

            for($j=0; $j<count($this->pickupLocations); $j++){
                if($this->pickupLocations[$j]>=$this->dropLocations[$i]){                
                    $earningsBasedOnPickupLocation[$i] += $this->dropLocations[$j]-$this->pickupLocations[$j]+$this->tips[$j];
                }
            }
            $earningsBasedOnPickupLocation[$i] ??= 0;
        }
        
        return max($earningsBasedOnPickupLocation);
    }

}