<?php
declare(strict_types=1);

namespace TaxiRideEarning;

interface IRide{
    public function calculateBestRouteAndEarnings();
}