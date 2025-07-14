<?php

function taxiDriver($pickup, $drop, $tip){

    $ride = new Ride($pickupLocations, $drop, $tip);
    echo "<pre>";
    echo "<br />Pickup Array with ".count($pickup)." items Min: ".min($pickup)." | Max: ".max($pickup)." | <br />";print_r($pickup);
    echo "<br />Drop Array with ".count($drop)." items Min: ".min($drop)." | Max: ".max($drop)." | <br />";print_r($drop);
    echo "<br />Tips Array with ".count($tip)." items  Min: ".min($tip)."| Max: ".max($tip)." | <br />";print_r($tip);
    $earnings = [];
    for($i=0; $i<count($pickup); $i++){
        $earnings[] = $drop[$i]-$pickup[$i]+$tip[$i];
    }
    echo "<br />Earnings Array with ".count($earnings)." items<br />";print_r($earnings);

    $earnings_based_on_pickup_start_location = [];
    for($i=0; $i<count($pickup); $i++){

        $earnings_based_on_pickup_start_location[$i] = $earnings_based_on_pickup_start_location[$i] ?? 0;
        $earnings_based_on_pickup_start_location[$i] += $drop[$i]-$pickup[$i]+$tip[$i];

        for($j=0; $j<count($pickup); $j++){
            if($pickup[$j]>=$drop[$i]){                
                $earnings_based_on_pickup_start_location[$i] += $drop[$j]-$pickup[$j]+$tip[$j];
            }
        }
        $earnings_based_on_pickup_start_location[$i] = $earnings_based_on_pickup_start_location[$i] ?? 0;
    }
    echo "<br />Earnings based on the pickup location with ".count($earnings_based_on_pickup_start_location)." items<br />";print_r($earnings_based_on_pickup_start_location);
    
    echo "</pre>";

    return max($earnings_based_on_pickup_start_location);
}

echo "Maximum earnings: ".taxiDriver($pickup, $drop, $tip);