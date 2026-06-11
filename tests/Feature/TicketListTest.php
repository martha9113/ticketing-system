<?php

use App\Models\Ticket;
use App\Models\User;

it('shows a ticket list page with stored ticket details', function () {
    $issuer = User::factory()->create();
    $assignee = User::factory()->create();

    Ticket::create([
        'ticket_id' => 'T-1001',
        'title' => 'Login issue',
        'description' => 'Cannot sign in.',
        'issuer_id' => $issuer->id,
        'date' => '2026-06-10',
        'status' => 'open',
        'priority' => 'high',
        'assigned_to' => $assignee->id,
    ]);

    $response = $this->actingAs($issuer)->get('/ticketlist');

    $response->assertStatus(200);
    $response->assertSee('T-1001');
    $response->assertSee('Login issue');
    $response->assertSee('Cannot sign in.');
});
