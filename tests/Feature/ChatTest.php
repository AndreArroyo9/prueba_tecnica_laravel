<?php

use App\Models\Servicio as Servicio;
use App\Models\User;

use function Pest\Laravel\{actingAs, assertDatabaseHas, assertDatabaseMissing, get, post, put, patch, delete, seed};

describe('crear chat', function () {
    beforeEach(function () {
        // Selecciona un servicio
        $this->user = User::all()->find(1)->first();
        $this->servicio = Servicio::all()->where('creator_id', $this->user->creator->id)->first();
    });

    test('usuario no autenticado no puede crear', function () {
        post('servicios/'.$this->servicio->id.'/chat/'.$this->user->id)
            ->assertStatus(302)
            ->assertRedirect('/login');
    });

    test('usuario creador del servicio no puede crear', function () {
        actingAs($this->user)->post('servicios/'.$this->servicio->id.'/chat/'.$this->user->id)
            ->assertForbidden();
    });

    test('usuario autenticado puede crear', function () {
        $newUser = User::factory()->create();
        actingAs($newUser)->post('servicios/'.$this->servicio->id.'/chat/'.$newUser->id)
            ->assertStatus(200);
    });

    test('si ya existe, no se puede crear el mismo', function () {
        $newUser = User::factory()->create();
        actingAs($newUser)->post('servicios/'.$this->servicio->id.'/chat/'.$newUser->id)
            ->assertStatus(200);
        actingAs($newUser)->post('servicios/'.$this->servicio->id.'/chat/'.$newUser->id)
            ->assertForbidden();
    });
});
