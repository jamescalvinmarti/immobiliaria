<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PropertiesControllerTest extends TestCase
{
    /** @test */
    public function create_property()
    {
        $this->withoutExceptionHandling();

        $response = $this->withoutMiddleware()->post(route('properties.store'), [
            'name' => 'propietatProva',
            'city' => 'ciutatProva',
            'address' => 'addressProva',
            'price' => 100.00,
            'surface' => 100,
            'description' => 'descripcioProva',
            'category' => '1',
            'zone' => '1',
            'status' => 'sale',
            'published' => false,
        ]);

        $response->assertRedirect(route('properties.index'));

        $this->assertDatabaseHas('properties', [
            'name' => 'propietatProva',
        ]);
    }
}
