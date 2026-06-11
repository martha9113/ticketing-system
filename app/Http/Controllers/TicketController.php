<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with(['issuer', 'assignedTo'])
            ->latest()
            ->get();

        return view('ticketlist', compact('tickets'));
    }

    public function create()
    {
        return view('ticket.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'date'        => ['required', 'date'],
            'status'      => ['required', 'string', 'in:open,in-progress,resolved'],
            'priority'    => ['required', 'string', 'in:low,medium,high'],
            'assigned_to' => ['nullable', 'integer', 'exists:users,id'],
        ]);

        // Auto-generate ticket ID and set issuer from logged-in user
        $validated['ticket_id'] = 'TCK-' . strtoupper(uniqid());
        $validated['issuer_id'] = auth()->id();

        Ticket::create($validated);

        return redirect()->route('ticketlist.index')->with('success', 'Ticket created successfully.');
    }

    public function update(Request $request, Ticket $ticket)
    {
        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'date'        => ['required', 'date'],
            'status'      => ['required', 'string', 'in:open,in-progress,resolved'],
            'priority'    => ['required', 'string', 'in:low,medium,high'],
        ]);

        $ticket->update($validated);

        return redirect()->route('ticketlist.index')->with('success', 'Ticket updated successfully.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('ticketlist.index')->with('success', 'Ticket deleted.');
    }
}
