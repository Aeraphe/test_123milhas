<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Flight123MilhasApiTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function has_flight_api_route()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/api/v1/flight');

        $response->assertStatus(200);
    }
}
