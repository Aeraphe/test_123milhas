<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Http\Milhas123\FlightHttpService;
use App\Helpers\Flight123MilhasApiTrait;

class FlightController extends Controller
{
    use Flight123MilhasApiTrait;

    public function index(FlightHttpService $flightHttpService)
    {

        $flights = $flightHttpService->getFlights();
        $flightsArrenge = $this->arrangeFlightsByTypeFareAndPrice($flights);
        $flightGroups = $this->makeFlightsGroups($flightsArrenge);
        $flightGroups->flights = $flights;

        return json_encode($flightGroups,JSON_PRETTY_PRINT);
    }
}
