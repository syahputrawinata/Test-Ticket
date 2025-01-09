<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'title',
        'description',
        'assign_at',
        'ticket_type_id',
        'status',
        'project_id',
    ];

        // Relasi ke TicketType
        public function ticketType()
        {
            return $this->belongsTo(TicketType::class);
        }
    
        // Relasi ke Project
        public function projects()
        {
            return $this->belongsTo(Projects::class);
        }
}
