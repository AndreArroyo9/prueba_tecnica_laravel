<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase; // Migra la base de datos para cada test
    /**
     * Verifica que la ruta '/servicios' devuelve la vista 'servicios.index'
     */
    public function test_register_devuelve_vista(){

        // Carga el formulario de register
        $response = $this->get('/servicios');

        // Aserciones
        $response->assertStatus(200)->assertViewIs('servicios.index');
    }


}
