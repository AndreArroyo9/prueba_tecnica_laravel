<?php
/*
 * lando artisan test tests/Feature/ServicioPestTest.php
 */

use App\Models\Servicio;
use Illuminate\Http\UploadedFile as UploadedFile;
use App\Models\User as User;
use App\Models\Creator as Creator;
use Database\Seeders\DatabaseSeeder;

use function Pest\Laravel\{actingAs, assertDatabaseHas, assertDatabaseMissing, get, post, put, patch, delete, seed};

test('Tiene servicios', function () {
    get('/servicios')->assertStatus(200);
});

test('solo muestra servicios públicos', function () {
    $servicios = Servicio::all()->where('status', '=',0);

    foreach ($servicios as $servicio) {
        $this->get('/servicios/' . $servicio->id)->assertForbidden();
    }
});

describe('crear servicio', function () {

    // Antes de cada test carga el DatabaseSeeder y asigna un usuario.
    beforeEach(function () {
        $this->user = User::all()->find(1)->first();
    });

    test('usuario no autenticado', function () {
        post('/servicios', [
            'title' => 'Usuario no autenticado crea servicio test',
            'description' => 'Servicio test',
            'price' => '100',
            'image' => UploadedFile::fake()->image('image.jpg', 500),
            'category' => 'Deportes',
            'status' => '1',
            'creator_id' => $this->user->creator->id,
        ])
            ->assertStatus(302)
            ->assertRedirect('/login');

        assertDatabaseMissing('servicios', [
            'title' => 'Usuario no autenticado crea servicio test',
        ]);
    });

    test('usuario autenticado y creador del servicio', function () {
        actingAs($this->user)->post('/servicios', [
            'title' => 'Usuario autenticado crea servicio test',
            'description' => 'Servicio test',
            'price' => '100',
            'image' => UploadedFile::fake()->image('image.jpg', 500),
            'category' => 'Deportes',
            'status' => '1',
            'creator_id' => $this->user->creator->id,
        ])
            ->assertStatus(302)
            ->assertRedirect('/servicios');

        assertDatabaseHas('servicios', [
            'title' => 'Usuario autenticado crea servicio test',
        ]);

    });


});

describe('editar servicio', function () {

    // Antes de cada test carga el DatabaseSeeder y asigna un usuario y uno de sus servicios.
    beforeEach(function () {
        $this->servicio = Servicio::all()->find(1);
        $this->user = User::all()->find($this->servicio->creator->id);
    });

    test('usuario no autenticado', function () {
        patch('/servicios/' . $this->servicio->id, [
            'title' => 'Usuario no autenticado edita servicio test',
            'description' => 'Editando descripción de servicio test',
            'price' => '10',
            'image' => UploadedFile::fake()->image('image_edited.jpg', 500),
            'category' => 'Deportes',
            'status' => '0'
        ])
            ->assertStatus(302)
            ->assertRedirect('/login');

        assertDatabaseMissing('servicios', [
            'title' => 'Usuario no autenticado edita servicio test',
        ]);
    });

    test('usuario autenticado y creador del servicio', function () {
        actingAs($this->user)->patch('/servicios/' . $this->servicio->id, [
            'title' => 'Usuario autenticado edita servicio test',
            'description' => 'Editando descripción de servicio test',
            'price' => '10',
            'image' => UploadedFile::fake()->image('image_edited.jpg', 500),
            'category' => 'Deportes',
            'status' => '0'
        ])
            ->assertStatus(302)
            ->assertRedirect('/servicios/' . $this->servicio->id);

        assertDatabaseHas('servicios', [
            'title' => 'Usuario autenticado edita servicio test',
        ]);
    });

    test('usuario autenticado y no creador', function () {
        $noCreatorUser = User::all()->where('id', '>', $this->user->id)->first();
        actingAs($noCreatorUser)->patch('/servicios/' . $this->servicio->id, [
            'title' => 'Usuario autenticado y no creador edita servicio test',
            'description' => 'Editando descripción de servicio test',
            'price' => '10',
            'image' => UploadedFile::fake()->image('image_edited.jpg', 500),
            'category' => 'Deportes',
            'status' => '0'
        ]);

        assertDatabaseMissing('servicios', [
            'title' => 'Usuario autenticado y no creador edita servicio test',
        ]);
    });
});

describe('eliminar servicio', function () {
    beforeEach(function () {
        $this->servicio = Servicio::all()->find(1);
        $this->user = User::all()->find($this->servicio->creator->id);
    });

    test('usuario no autenticado', function () {
        delete('/servicios/'.$this->servicio->id)
            ->assertStatus(302)
            ->assertRedirect('/login');

        assertDatabaseHas('servicios', [
            'id' => $this->servicio->id,
        ]);
    });

    test('usuario autenticado y creador', function () {
        actingAs($this->user)->delete('/servicios/'.$this->servicio->id)
            ->assertStatus(302)
            ->assertRedirect('/servicios');

        assertDatabaseMissing('servicios', [
            'id' => $this->servicio->id,
        ]);
    });

    test('usuario autenticado y no creador', function () {
        $noCreatorUser = User::all()->where('id', '>', $this->user->id)->first();
        actingAs($noCreatorUser)->delete('/servicios/'.$this->servicio->id)
            ->assertForbidden();

        assertDatabaseHas('servicios', [
            'id' => $this->servicio->id,
        ]);
    });

});

