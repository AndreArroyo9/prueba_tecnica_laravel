<?php

namespace Tests\Feature;

use App\Models\Creator;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use PHPUnit\Framework\Attributes\Before;
use Tests\TestCase;

class ServicioTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    /*
     * Se ejecuta antes de cada test. De esta forma, se evita repetir código
     * que se usa en la mayoría de los tests.
     */
    public function setUp(): void{
        parent::setUp();
        $this->user = User::all()->find(1)->first();
    }

    public function test_carga_servicios(): void
    {

        $response = $this->get('/servicios');

        $response->assertStatus(200)->assertViewIs('servicios.index');
    }

    public function test_carga_formulario_para_crear_servicio(): void{

        // Carga de formulario como usuario no autenticado para crear servicios
        $response = $this->get('/servicios/create');

        // Assert usuario no autenticado
        $response->assertStatus(302)->assertRedirect('/login');

        // Carga de formulario como usuario autorizado para crear servicios
        $response = $this->actingAs($this->user)->get('/servicios/create');

        // Assert usuario autorizado
        $response->assertStatus(200)->assertViewIs('servicios.create');

    }

    public function test_crear_servicio(): void{

        // Un usuario no autenticado intenta crear un servicio
        $title = 'Usuario no autenticado crea servicio test';
        $response = $this->post('/servicios', [
            'title' => $title,
            'description' => 'Servicio test',
            'price' => '100',
            'image' => UploadedFile::fake()->image('image.jpg', 500),
            'category' => 'Deportes',
            'status' => '1',
            'creator_id' => 1,
        ]);

        // Asserts no autenticado
        $response->assertStatus(302)->assertRedirect('/login');

        $this->assertDatabaseMissing('servicios', [
            'title' => $title
        ]);

//        // Crea un usuario
//        $user = User::factory()
//            ->has(Creator::factory())
//            ->create();

        // Un usuario registrado intenta crear un servicio con datos válidos
        $title = 'Usuario autenticado crea servicio test';

        $response = $this->actingAs($this->user)->post('/servicios', [
            'title' => $title,
            'description' => 'Servicio test',
            'price' => '100',
            'image' => UploadedFile::fake()->image('image.jpg', 500),
            'category' => 'Deportes',
            'status' => '1',
            'creator_id' => $this->user->creator->id,
        ]);

        // Asserts usuario autenticado
        $response->assertStatus(302)->assertRedirect('/servicios');

        $this->assertDatabaseHas('servicios', [
            'title' => $title
        ]);

    }

    public function test_editar_servicio(): void{

        // Selecciona un usuario y un servicio que haya creado
        $servicio = Servicio::all()->where('creator_id', $this->user->creator->id)->first();

        // Actualiza un servicio del usuario
        $title = 'Usuario autenticado edita servicio test';
        $response = $this->actingAs($this->user)
            ->patch('/servicios/'.$servicio->id, [
            'title' => $title,
            'description' => 'Editando descripción de servicio test',
            'price' => '10',
            'image' => UploadedFile::fake()->image('image_edited.jpg', 500),
            'category' => 'Deportes',
            'status' => '0'
        ]);

        // Assert
        $response->assertStatus(302)->assertRedirect('/servicios/'.$servicio->id);

        $this->assertDatabaseHas('servicios', [
            'title' => $title
        ]);

    }

    public function test_elimina_servicio(): void{

        // Eliminar un servicio
        $response = $this->delete('/servicios/1');

        // Asserts
        $response->assertStatus(302)->assertRedirect('/login');

    }



}
