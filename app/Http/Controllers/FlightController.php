<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Http\Milhas123\FlightHttpService;
use App\Helpers\Flight123MilhasApiTrait;

class FlightController extends Controller
{
    /**
     * This triat is collection of helper methods
     * for treat, arrange and group the request flights 
     * data from 123Milhas Api 
     */
    use Flight123MilhasApiTrait;

    /**
     * This Method returns a flights groups arrange by 
     * descendent Price, Fare and Type (outbound,inbound)
     * 
     */
    public function index(FlightHttpService $flightHttpService)
    {

        $flights = $flightHttpService->getFlights();
        $flightsArrenge = $this->arrangeFlightsByTypeFareAndPrice($flights);
        $flightGroups = $this->makeFlightsGroups($flightsArrenge);
        $flightGroups->flights = $flights;
        $response = json_encode($flightGroups,JSON_PRETTY_PRINT);

        return response()->json($response);
    }
}
