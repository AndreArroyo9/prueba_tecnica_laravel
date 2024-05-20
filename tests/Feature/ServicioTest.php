<?php

namespace Tests\Feature;

use App\Models\Creator;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ServicioTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_carga_el_formulario_para_crear_servicio(): void
    {
        $response = $this->get('/servicios');

        $response->assertStatus(200)->assertViewIs('servicios.index');
    }

    public function test_usuario_sin_loguear_redirigido_al_login_al_crear_servicio(): void{

        $response = $this->get('/servicios/create');
        $response->assertRedirect('/login');

    }

    public function test_usuario_autorizado_crea_servicio(): void{

        // Crea un usuario
        $user = User::factory()
                    ->has(Creator::factory())
                ->create();

        // Un usuario registrado intenta crear un servicio con datos válidos
        $response = $this->actingAs($user)->post('/servicios', [
            'title' => 'Servicio test',
            'description' => 'Servicio test',
            'price' => '100',
            'image' => UploadedFile::fake()->image('image.jpg', 500),
            'category' => 'Deportes',
            'status' => '1',
            'creator_id' => $user->creator->id,
        ]);

        // Asserts
        $response->assertStatus(302)->assertRedirect('/servicios');

        $this->assertDatabaseHas('servicios', [
            'title' => 'Servicio test'
        ]);
    }

    public function test_usuario_autorizado_edita_servicio(): void{

        // Selecciona un usuario y un servicio que haya creado
        $user = User::all()->find(1)->first();
        $servicio = Servicio::all()->where('creator_id', $user->creator->id)->first();

        // Actualiza un servicio del usuario
        $response = $this->actingAs($user)->patch('/servicios/'.$servicio->id, [
            'title' => 'Editando título de servicio test',
            'description' => 'Editando descripción de servicio test',
            'price' => '10',
            'image' => UploadedFile::fake()->image('image_edited.jpg', 500),
            'category' => 'Deportes',
            'status' => '0'
        ]);

        $response->assertStatus(302)->assertRedirect('/servicios/'.$servicio->id);

        $this->assertDatabaseHas('servicios', [
            'title' => 'Editando título de servicio test'
        ]);

    }
}
