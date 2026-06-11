<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'ticket';

    protected $fillable = [
        'ticket_id',
        'title',
        'description',
        'issuer_id',
        'date',
        'status',
        'priority',
        'assigned_to',
    ];

    public function issuer()
    {
        return $this->belongsTo(User::class, 'issuer_id');
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
