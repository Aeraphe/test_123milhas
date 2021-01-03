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
    public function check_flight_123Milhas_api_request()
    {

        $response = $this->get('/api/v1/flight');
        $response->assertStatus(200);
    }
}
