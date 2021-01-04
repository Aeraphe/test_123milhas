<?php

namespace App\Helpers;


trait Flight123MilhasApiTrait
{

    /**
     * This method recive all flights (outbound,inbound) from 123Milhas Api
     * then separate the data by outbound, inbound by price and fare
     * @return array
     */
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
                //Filter outbound flights
                if ($flight->outbound == 1 && $value->fare == $flight->fare &&  $value->price == $flight->price) {
                    array_push($departure_temp, $flight);
                    $departure[$value->price] = $departure_temp;
                    array_push($flights_filters_keys, $key);
                }
                 //Filter inbound flights
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

 /**
     * This method combine outbound and inbound flights
     * in groups by fare and organize then in descending price
     *
     * @return array Arrenged groups by price in descending order
     */
    private function makeFlightsGroups($flightsData)
    {

        $groups = [];
        $totalGroups = 0;
        $totalUniqueFlights = 0;
        $cheapestPrice = null;
        $cheapestGroupId = null;


        foreach ($flightsData['departure'] as $key => $departure) {
            foreach ($flightsData['arraive'] as $key2 => $arrive) {
                if ($departure[0]->fare == $arrive[0]->fare) {

                    $totalGroups += 1;
                    $flight_group_price = $key + $key2;
                    if ($cheapestPrice === null) {
                        $cheapestPrice = $flight_group_price;
                        $cheapestGroupId = $totalGroups;
                    } elseif ($flight_group_price <= $cheapestPrice) {
                        $cheapestPrice = $flight_group_price;
                        $cheapestGroupId = $totalGroups;
                    }
                    //Count if departure or arive in group has just a unique flight
                    if (count($departure) == 1)  $totalUniqueFlights += 1;
                    if (count($arrive) == 1) $totalUniqueFlights += 1;

                    array_push($groups, (object) array(
                        "uniqueid" => $totalGroups,
                        "totalPrice" => $flight_group_price,
                        "outbound" => $departure,
                        "inbound" => $arrive
                    ));
                };
            }
        }

        //Organize the groups by price in descending order
        for ($i = 0; $i < sizeof($groups); $i++) {
            for ($j = $i + 1; $j < sizeof($groups); $j++) {
                if ($groups[$i]->totalPrice > $groups[$j]->totalPrice) {
                    $temp = $groups[$i];
                    $groups[$i] = $groups[$j];
                    $groups[$j] = $temp;
                }
            }
        }


        return (object) array(
            "flights" => null,
            "groups" => $groups,
            "totalGroups" => $totalGroups,
            "totalFlights" => $totalUniqueFlights, //Is not Clear on Documatation
            "cheapestPrice" => $cheapestPrice,
            "chepestGroup" => $cheapestGroupId
        );
    }



}
