<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Http\Milhas123\FlightHttpService;

class FlightController extends Controller
{
    public function index(FlightHttpService $flightHttpService)
    {

        $flights = $flightHttpService->getFlights();


    }
}
