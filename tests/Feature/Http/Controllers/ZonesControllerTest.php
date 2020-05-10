<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ZonesControllerTest extends TestCase
{
    /** @test */
    public function create_zone()
    {
        $response = $this->withoutMiddleware()->post(route('zones.store'), [
            'name' => 'zonaProva',
        ]);

        $response->assertRedirect(route('zones.index'));

        $this->assertDatabaseHas('zones', [
            'name' => 'zonaProva',
        ]);
    }
}
