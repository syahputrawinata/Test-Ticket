<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticketType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    // Relasi ke tabel Ticket
    public function tickets()
    {
        return $this->hasMany(Tickets::class);
    }
}
