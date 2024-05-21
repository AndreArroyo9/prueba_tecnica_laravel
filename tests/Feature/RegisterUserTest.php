<?php

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\post;

it('has register page', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('user can create an account', function () {
    post('/register', [
        'name' => 'John Doe',
        'last_name' => 'Doe',
        'email' => 'john.doe@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ])
        ->assertStatus(302);

    assertDatabaseHas('users', [
        'email' => 'john.doe@example.com'
    ]);
});
