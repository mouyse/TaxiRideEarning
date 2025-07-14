<?php
declare(strict_types=1);

/**
 * This file defines the Contract/Interface that any calling class must implement.
 */

namespace TaxiRideEarning;

interface IRide
{
    public function calculateBestRouteAndEarnings();
}