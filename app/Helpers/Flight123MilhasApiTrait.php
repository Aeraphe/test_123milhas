<?php

namespace App\Helpers;


trait Flight123MilhasApiTrait
{


    private function arrangeFlightsByTypeFareAndPrice($flights)
    {
        $auxFlightsData = $flights;
        $departure = [];
        $arraive = [];

        foreach ($auxFlightsData as $value) {
            $departure_temp = [];
            $arraive_temp = [];
            $flights_filters_keys = [];
            foreach ($flights as $key => $flight) {
                if ($flight->outbound == 1 && $value->fare == $flight->fare &&  $value->price == $flight->price) {
                    array_push($departure_temp, $flight);
                    $departure[$value->price] = $departure_temp;
                    array_push($flights_filters_keys, $key);
                }
                if ($flight->outbound == 0 && $value->fare == $flight->fare &&  $value->price == $flight->price) {
                    array_push($arraive_temp, $flight);
                    $arraive[$value->price] = $arraive_temp;
                    array_push($flights_filters_keys, $key);
                }
            }

            //Delete flights that was filtered from $flights array
            foreach ($flights_filters_keys as $rm) {
                unset($flights[$rm]);
            }
        }

        return array("departure" => $departure, "arraive" => $arraive);
    }
}
