<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    } 
    public function test_producto_index()
    {
        $response = $this->get('api/producto');

        $response->assertStatus(200);
    }
    // no permite repetir descripcion unica
    public function test_producto_store()
    {
        $response = $this->post('api/producto', [
            'prod_descripcion' => 'kit escolar',
            'prod_precioc' => 5000,
            'prod_preciov' => 9500,
        ]);

        $response->assertStatus(201);
    }

    public function test_producto_update()
    {
        $response = $this->put('api/producto/7/1', [
            'prod_descripcion' => 'kit',
            'prod_precioc' => 5000,
            'prod_preciov' => 10000,
        ]);

        $response->assertStatus(200);
    }



}
