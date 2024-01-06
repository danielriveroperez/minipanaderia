<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductoTest extends TestCase
{   
    // Test para obtener todos los productos
    public function test_obtener_todos_los_productos(): void
    {
        $response = $this->get('/api/v1/productos');
        
        $response->assertStatus(200);
    }

    // Test para obtener un producto
    public function test_obtener_un_producto(): void
    {
        $response = $this->get('/api/v1/productos/3');

        $response->assertStatus(200);
    }

    // Test para actualizar un producto
    public function test_actualizar_producto(): void
    {
        $response = $this->put('/api/v1/productos/3', [
            'nombre' => 'producto actualizado',
            'precio' => 50.000,
            'descripcion' => 'descripcion actualizado',
            'stock' => 20,
            'cliente_id' => 1,
        ]);

        $response->assertStatus(200);
    }
}
