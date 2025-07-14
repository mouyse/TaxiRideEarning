<?php
require_once '../vendor/autoload.php';

$pickupLocations = [0, 2, 9, 10, 11, 12];
$dropLocations = [5, 9, 11, 11, 14, 17];
$tip = [1, 2, 3, 2, 2, 1];

function taxiDriver(array $pickups,array $drops,array $tips){

    $ride = new TaxiRideEarning\Ride($pickups, $drops, $tips);
    $taxi = new TaxiRideEarning\Taxi($ride);
    
    return $taxi->calculateMaxEarning();
}

echo "Maximum earnings: ".taxiDriver($pickupLocations, $dropLocations, $tip);
