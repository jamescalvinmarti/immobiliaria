<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesControllerTest extends TestCase
{
    /** @test */
    public function create_category()
    {
        $response = $this->withoutMiddleware()->post(route('categories.store'), [
            'name' => 'categoriaProva',
        ]);

        $response->assertRedirect(route('categories.index'));

        $this->assertDatabaseHas('categories', [
            'name' => 'categoriaProva',
        ]);
    }
}
