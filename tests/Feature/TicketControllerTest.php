<?php

use App\Models\Ticket;
use App\Models\User;

it('stores a ticket through the ticket create route', function () {
    $issuer = User::factory()->create();
    $assignee = User::factory()->create();
    $ticketId = 'T-' . fake()->unique()->numberBetween(1000, 9999);

    $response = $this->actingAs($issuer)->post('/ticket', [
        'ticket_id' => $ticketId,
        'title' => 'Test ticket',
        'description' => 'This ticket should be stored.',
        'issuer_id' => $issuer->id,
        'date' => now()->toDateString(),
        'status' => 'open',
        'priority' => 'medium',
        'assigned_to' => $assignee->id,
    ]);

    $response->assertRedirect(route('dashboard'));
    $this->assertDatabaseHas('ticket', ['ticket_id' => $ticketId]);
});
