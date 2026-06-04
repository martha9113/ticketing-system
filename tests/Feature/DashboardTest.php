<?php

use App\Models\User;

it('redirects users to the dashboard after a successful login', function () {
    $user = User::factory()->create();

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $response->assertRedirect('/dashboard');
});

it('redirects the home page to the login page', function () {
    $response = $this->get('/');

    $response->assertRedirect('/login');
});

it('shows the dashboard page for authenticated users', function () {
    $this->actingAs(User::factory()->create());

    $response = $this->get('/dashboard');

    $response->assertOk();
    $response->assertSee('Dashboard');
});
